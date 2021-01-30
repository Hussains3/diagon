<?php

namespace App\Http\Controllers;

use App\Models\Appmode;
use App\Models\Broker;
use App\Models\Doctor;
use App\Models\Goption;
use App\Models\Sale;
use App\Models\Patient;
use App\Models\SaleItem;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 0;
        $sales = Sale::with('broker')->with('doctor')->with('patient')->get();
        // $brokers = Broker::all();
        // $doctors = Doctor::all();
        // $tests = Test::all();
        // $patients = Patient::all();

        // return $sales;
        return view('sales.index', compact('sales','i'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $inv = 'DGN'.$today . $rand;
        $patients = Patient::all()->pluck('name','id');
        $doctors = Doctor::all()->pluck('name','id');
        $brokers = Broker::all()->pluck('name','id');

        // return $patients;

        $tests = Test::all();

        return view('sales.create',compact('patients','inv','today','tests','doctors','brokers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $gOption = Goption::first()->appMode;
        $appModeRate = Appmode::where('id',$gOption)->first()->rate;
        // return $appModeRate;


        $this->validate($request, [
            'invoice' => 'required',
            'patients_id' => 'required',
            'doctor_id' => 'sometimes',
            'broker_id' => 'sometimes',
            'sample_date' => 'required',
            'deli_date' => 'required',
            'subtotal' => 'required',
            'total_qty' => 'required',
            'vat' => 'sometimes',
            'discount' => 'sometimes',
            'netTotal' => 'required',
            'word' => 'required',
            'paid' => 'sometimes',
            'due' => 'sometimes',
            'test_id' => 'sometimes',
            'orderQuantity' => 'sometimes',
            'price' => 'sometimes',
            'totalPrice' => 'sometimes'
        ]);

        $brokerComission = Broker::where('id',$request->broker_id)->get();
        $bComission = $brokerComission[0]->commission;
        $rDiscount = $request->discount;
        $netTotal = $request->netTotal;
        $comissionAble = 0;



        if ($gOption == 1) {
            // 'S-mode'
            if ($rDiscount >= 30) {
                $brorerCommissionAmount = 0;
                $doctorComissionAmount = 0;
            } elseif ( $rDiscount > 0 && $rDiscount <= 29) {
                $comissionAble = $netTotal * ((30 - $rDiscount)/100);
            }


            if (!empty($request->doctor_id) && !empty($request->broker_id)) {
                // Doctor and broker both have
                $brorerCommissionAmount = $comissionAble * ($bComission/100);
                $doctorComissionAmount = $comissionAble * ((30 - $bComission)/100);
            } elseif (empty($request->doctor_id) && empty($request->broker_id)) {
                // Doctor and broker both are absent
                $brorerCommissionAmount = 0;
                $doctorComissionAmount = 0;
            } elseif (!empty($request->doctor_id) && empty($request->broker_id)) {
                // Only Doctor
                $brorerCommissionAmount = 0;
                $doctorComissionAmount = $comissionAble * (30/100) ;
            } elseif (empty($request->doctor_id) && !empty($request->broker_id)) {
                // Only Boctor
                $brorerCommissionAmount = $comissionAble * (30/100);
                $doctorComissionAmount = 0 ;
            }


            $saleStatus = 'Paid';
            if ($request->due > 0){
                $saleStatus = 'Due';
            }
            // return $saleStatus;
            $sale = new Sale();
            $sale->invoice = $request->invoice;
            $sale->patient_id  = $request->patients_id;
            $sale->doctor_id  = $request->doctor_id;
            $sale->user_id  = Auth::user()->id;
            $sale->broker_id  = $request->broker_id;
            $sale->subtotal = $request->subtotal;//subtotal
            $sale->vat = $request->vat;
            $sale->discount = $request->discount_amount;
            $sale->netTotal = $request->netTotal;
            $sale->word = $request->word;
            $sale->paid = $request->paid;
            $sale->due = $request->due;
            $sale->total_qty = $request->total_qty;
            $sale->total_cost = $request->totalCost;
            $sale->status = $saleStatus;
            $sale->status = $request->note;
            $sale->save();

            //updating appmode balance
            $mode = Appmode::where('id',$gOption)->first();
            $modeBalanceCom = $request->netTotal * ($appModeRate/100);
            $modeAmmount = $mode->currentAmmount;
            $modeThreshold = $mode->threshold;
            if ($modeAmmount < $modeThreshold) {
                $mode_up = Appmode::find($gOption);
                $mode_up->currentAmmount = $modeAmmount + $modeBalanceCom;
            }

            //updating patient
            $patient = Patient::where('id',$request->patients_id)->first();
            $patient_buy = $patient->buy  + $request->netTotal;
            $patient_pay = $patient->pay + $request->paid;
            $patient_due = $patient->due + $request->due;
            $patient_up = Patient::find($request->patients_id);
            $patient_up->buy = $patient_buy;
            $patient_up->pay = $patient_pay;
            $patient_up->due = $patient_due;
            $patient_up->save();
            //updating Broker
            if (!empty($request->broker_id)) {
                $broker = Broker::where('id',$request->broker_id)->first();
                $broker_balance = $broker->balance  + $brorerCommissionAmount;
                $broker_up = Broker::find($request->broker_id);
                $broker_up->balance = $broker_balance;
                $broker_up->save();
            }
            //updating Doctor
            if (!empty($request->doctor_id)) {
                $doctor = Doctor::where('id',$request->doctor_id)->first();
                $doctor_balance = $doctor->balance  + $doctorComissionAmount;

                $doctor_up = Doctor::find($request->doctor_id);
                $doctor_up->balance = $doctor_balance;
                $broker_up->save();
            }
            //Creating sale item tor each examination
            for ($i=0; $i < count($request->price) ; $i++) {
                $saleItem = new SaleItem();
                $saleItem->invoice = $request->invoice;
                $saleItem->sale_id = $sale->id;
                $saleItem->test_id = $request->test_id[$i];
                $saleItem->patient_id = $request->patients_id;
                $saleItem->note = 'A medical test';
                $saleItem->sample_date = $request->sample_date[$i];
                $saleItem->deli_date = $request->deli_date[$i];
                $saleItem->status = 'Collecting Sample';
                $test_info = Test::where('id',$request->test_id[$i])->first();
                $test_name = $test_info->name;
                $saleItem->test_name = $test_name;
                $saleItem->cost = $request->cost[$i];
                $saleItem->price = $request->totalPrice[$i];
                $saleItem->testDiscount = $request->testDiscount[$i];
                $saleItem->save();
            }

        } elseif ($gOption == 2){
            // return 'D-mode';
            if ($rDiscount >= 30) {
                $brorerCommissionAmount = 0;
                $doctorComissionAmount = 0;
            } elseif ( $rDiscount > 0 && $rDiscount <= 29) {
                $comissionAble = $netTotal * ((30 - $rDiscount)/100);
            }


            if (!empty($request->doctor_id) && !empty($request->broker_id)) {
                // Doctor and broker both have
                $brorerCommissionAmount = $comissionAble * ($bComission/100);
                $doctorComissionAmount = $comissionAble * ((30 - $bComission)/100);
            } elseif (empty($request->doctor_id) && empty($request->broker_id)) {
                // Doctor and broker both are absent
                $brorerCommissionAmount = 0;
                $doctorComissionAmount = 0;
            } elseif (!empty($request->doctor_id) && empty($request->broker_id)) {
                // Only Doctor
                $brorerCommissionAmount = 0;
                $doctorComissionAmount = $comissionAble * (30/100) ;
            } elseif (empty($request->doctor_id) && !empty($request->broker_id)) {
                // Only Boctor
                $brorerCommissionAmount = $comissionAble * (30/100);
                $doctorComissionAmount = 0 ;
            }


            $saleStatus = 'Paid';
            if ($request->due > 0){
                $saleStatus = 'Due';
            }
            // return $saleStatus;
            $sale = new Sale();
            $sale->invoice = $request->invoice;
            $sale->patient_id  = $request->patients_id;
            $sale->doctor_id  = $request->doctor_id;
            $sale->user_id  = Auth::user()->id;
            $sale->broker_id  = $request->broker_id;
            $sale->subtotal = $request->subtotal;//subtotal
            $sale->vat = $request->vat;
            $sale->discount = $request->discount_amount;
            $sale->netTotal = $request->netTotal;
            $sale->word = $request->word;
            $sale->paid = $request->paid;
            $sale->due = $request->due;
            $sale->total_qty = $request->total_qty;
            $sale->total_cost = $request->totalCost;
            $sale->status = $saleStatus;
            $sale->status = $request->note;
            $sale->save();

            //updating appmode balance
            $mode = Appmode::where('id',$gOption)->first();
            $modeBalanceCom = $doctorComissionAmount * ($appModeRate/100);
            $modeAmmount = $mode->currentAmmount;
            $modeThreshold = $mode->threshold;
            if ($modeAmmount < $modeThreshold) {
                $mode_up = Appmode::find($gOption);
                $mode_up->currentAmmount = $modeAmmount + $modeBalanceCom;
            }

            //updating patient
            $patient = Patient::where('id',$request->patients_id)->first();
            $patient_buy = $patient->buy  + $request->netTotal;
            $patient_pay = $patient->pay + $request->paid;
            $patient_due = $patient->due + $request->due;
            $patient_up = Patient::find($request->patients_id);
            $patient_up->buy = $patient_buy;
            $patient_up->pay = $patient_pay;
            $patient_up->due = $patient_due;
            $patient_up->save();
            //updating Broker
            if (!empty($request->broker_id)) {
                $broker = Broker::where('id',$request->broker_id)->first();
                $broker_balance = $broker->balance  + $brorerCommissionAmount;
                $broker_up = Broker::find($request->broker_id);
                $broker_up->balance = $broker_balance;
                $broker_up->save();
            }
            //updating Doctor
            if (!empty($request->doctor_id)) {
                $doctor = Doctor::where('id',$request->doctor_id)->first();
                $doctor_balance = $doctor->balance  + $doctorComissionAmount;

                $doctor_up = Doctor::find($request->doctor_id);
                $doctor_up->balance = $doctor_balance;
                $broker_up->save();
            }
            //Creating sale item tor each examination
            for ($i=0; $i < count($request->price) ; $i++) {
                $saleItem = new SaleItem();
                $saleItem->invoice = $request->invoice;
                $saleItem->test_id = $request->test_id[$i];
                $saleItem->patient_id = $request->patients_id;
                $saleItem->note = 'A medical test';
                $saleItem->sample_date = $request->sample_date[$i];
                $saleItem->deli_date = $request->deli_date[$i];
                $saleItem->status = 'Collecting Sample';
                $test_info = Test::where('id',$request->test_id[$i])->first();
                $test_name = $test_info->name;
                $saleItem->test_name = $test_name;
                $saleItem->cost = $request->cost[$i];
                $saleItem->price = $request->totalPrice[$i];
                $saleItem->testDiscount = $request->testDiscount[$i];
                $saleItem->save();
            }
        } elseif ($gOption == 3){
            // return 'N-mode';
            if ($rDiscount >= 30) {
                $brorerCommissionAmount = 0;
                $doctorComissionAmount = 0;
            } elseif ( $rDiscount > 0 && $rDiscount <= 29) {
                $comissionAble = $netTotal * ((30 - $rDiscount)/100);
            }


            if (!empty($request->doctor_id) && !empty($request->broker_id)) {
                // Doctor and broker both have
                $brorerCommissionAmount = $comissionAble * ($bComission/100);
                $doctorComissionAmount = $comissionAble * ((30 - $bComission)/100);
            } elseif (empty($request->doctor_id) && empty($request->broker_id)) {
                // Doctor and broker both are absent
                $brorerCommissionAmount = 0;
                $doctorComissionAmount = 0;
            } elseif (!empty($request->doctor_id) && empty($request->broker_id)) {
                // Only Doctor
                $brorerCommissionAmount = 0;
                $doctorComissionAmount = $comissionAble * (30/100) ;
            } elseif (empty($request->doctor_id) && !empty($request->broker_id)) {
                // Only Boctor
                $brorerCommissionAmount = $comissionAble * (30/100);
                $doctorComissionAmount = 0 ;
            }


            $saleStatus = 'Paid';
            if ($request->due > 0){
                $saleStatus = 'Due';
            }
            // return $saleStatus;
            $sale = new Sale();
            $sale->invoice = $request->invoice;
            $sale->patient_id  = $request->patients_id;
            $sale->doctor_id  = $request->doctor_id;
            $sale->user_id  = Auth::user()->id;
            $sale->broker_id  = $request->broker_id;
            $sale->subtotal = $request->subtotal;//subtotal
            $sale->vat = $request->vat;
            $sale->discount = $request->discount_amount;
            $sale->netTotal = $request->netTotal;
            $sale->word = $request->word;
            $sale->paid = $request->paid;
            $sale->due = $request->due;
            $sale->total_qty = $request->total_qty;
            $sale->total_cost = $request->totalCost;
            $sale->status = $saleStatus;
            $sale->status = $request->note;
            $sale->save();

            //updating appmode balance
            // $mode = Appmode::where('id',$gOption)->first();
            // $modeBalanceCom = $request->netTotal * ($appModeRate/100);
            // $modeAmmount = $mode->currentAmmount;
            // $modeThreshold = $mode->threshold;
            // if ($modeAmmount < $modeThreshold) {
            //     $mode_up = Appmode::find($gOption);
            //     $mode_up->currentAmmount = $modeAmmount + $modeBalanceCom;
            // }

            //updating patient
            $patient = Patient::where('id',$request->patients_id)->first();
            $patient_buy = $patient->buy  + $request->netTotal;
            $patient_pay = $patient->pay + $request->paid;
            $patient_due = $patient->due + $request->due;
            $patient_up = Patient::find($request->patients_id);
            $patient_up->buy = $patient_buy;
            $patient_up->pay = $patient_pay;
            $patient_up->due = $patient_due;
            $patient_up->save();
            //updating Broker
            if (!empty($request->broker_id)) {
                $broker = Broker::where('id',$request->broker_id)->first();
                $broker_balance = $broker->balance  + $brorerCommissionAmount;
                $broker_up = Broker::find($request->broker_id);
                $broker_up->balance = $broker_balance;
                $broker_up->save();
            }
            //updating Doctor
            if (!empty($request->doctor_id)) {
                $doctor = Doctor::where('id',$request->doctor_id)->first();
                $doctor_balance = $doctor->balance  + $doctorComissionAmount;

                $doctor_up = Doctor::find($request->doctor_id);
                $doctor_up->balance = $doctor_balance;
                $broker_up->save();
            }
            //Creating sale item tor each examination
            for ($i=0; $i < count($request->price) ; $i++) {
                $saleItem = new SaleItem();
                $saleItem->invoice = $request->invoice;
                $saleItem->test_id = $request->test_id[$i];
                $saleItem->patient_id = $request->patients_id;
                $saleItem->note = 'A medical test';
                $saleItem->sample_date = $request->sample_date[$i];
                $saleItem->deli_date = $request->deli_date[$i];
                $saleItem->status = 'Collecting Sample';
                $test_info = Test::where('id',$request->test_id[$i])->first();
                $test_name = $test_info->name;
                $saleItem->test_name = $test_name;
                $saleItem->cost = $request->cost[$i];
                $saleItem->price = $request->totalPrice[$i];
                $saleItem->testDiscount = $request->testDiscount[$i];
                $saleItem->save();
            }
        }




        session()->flash('success', 'Done a new sell !!');

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        // return $sale;
        $i = 0;
        $sale = Sale::with(['sale_items','patient'])->where('id',$sale->id)->first();
        $patient = Patient::where('id',$sale->patient_id)->first();
        // return $sale;
        $doctor = Doctor::where('id',$sale->doctor_id)->get('name');
        $broker = Broker::where('id',$sale->broker_id)->get('name');
        $tests = Test::all();

        $total_due = $patient->due;

        return view('sales.show',compact('sale','total_due','patient','doctor','tests','broker','i'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    /**
     * GetProducts
     */
    public function getProducts(Request $request)
    {
        $name = $request->get('name');
        $fieldName =  $request->get('fieldName');

        $name = strtolower(trim($name));
        if (empty($fieldName)) {
            $fieldName = 'product_model_name';
        }

        $products = Test::where(`LOWER(`.$fieldName.`)`, 'LIKE', "$name%")->get();

        return $products;
    }


    public function addNewRow()
    {
        $tests = Test::all()->pluck('name','id');
        return view('sales.addNewRow',compact('tests'));
    }

    public function single_sell_item(Request $request) {
        $id = $request->id;
        $test = Test::where('id',$id)->first();
        return $test;

    }
}
