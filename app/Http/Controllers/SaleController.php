<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Patient;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
        
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
        $patients = Patient::all();

        return view('sales.create',compact('patients','inv','today'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'invoice' => 'required',
            'shipping_address' => 'sometimes',
            'track_number' => 'sometimes',
            'customer_id' => 'required',
            'date' => 'required',
            'subtotal' => 'required',
            'total_qty' => 'required',
            'vat' => 'sometimes',
            'discount' => 'sometimes',
            'netTotal' => 'required',
            'word' => 'required',
            'paid' => 'sometimes',
            'due' => 'sometimes',
            'product_model_id' => 'sometimes',
            'orderQuantity' => 'sometimes',
            'price' => 'sometimes',
            'totalPrice' => 'sometimes'
        ]);

        $saleStatus = 'Due';

        if ($request->due == 0){
            $saleStatus = 'Complete';
        }

        $buy = 0;

        for ($i=0; $i <count($request->price) ; $i++) {
            $products = ProductModel::where('id',$request->product_model_id[$i])->first();
            $punitPrice = $products->unitPrice * $request->orderQuantity[$i];
            $buy = $buy + $punitPrice;
        }


        $sale = new Sale();
        $sale->invoice = $request->invoice;
        $sale->shipping_address = $request->shipping_address;
        $sale->customer_id = $request->customer_id;
        $sale->user_id = Auth::user()->id;
        $sale->store = session()->get('template');
        $sale->date = $request->date;
        $sale->subtotal = $request->subtotal;
        $sale->total_qty = $request->total_qty;
        $sale->vat = $request->vat;
        $sale->discount = $request->discount;
        $sale->netTotal = $request->netTotal;
        $sale->word = $request->word;
        $sale->buy = $buy;
        $sale->paid = $request->paid;
        $sale->due = $request->due;
        $sale->status = $saleStatus;
        $sale->save();

        $customer = customer::where('id',$request->customer_id)->first();
        $customer_buy = $customer->buy + $request->netTotal;
        $customer_pay = $customer->pay + $request->paid;
        $customer_due = $customer->due + $request->due;

        $customer_up = customer::find($request->customer_id);
        $customer_up->buy = $customer_buy;
        $customer_up->pay = $customer_pay;
        $customer_up->due = $customer_due;
        $customer_up->save();

        $payment = new SalePayment();
        $payment->invoice = $request->invoice;
        $payment->date = $request->date;
        $payment->sale_id = $sale->id;
        $payment->customer_id = $request->customer_id;
        $payment->user_id = Auth::user()->id;
        $payment->amount = $request->paid;
        $payment->save();

        for ($i=0; $i <count($request->price) ; $i++) {
            $saleItem = new SaleItem();
            $saleItem->invoice = $request->invoice;
            $saleItem->sale_id = $sale->id;
            if ($request->track_number) {
                # code...
            $saleItem->track_number = $request->track_number[$i];

            }
            $saleItem->product_model_id = $request->product_model_id[$i];

            $product_info = ProductModel::where('id',$request->product_model_id[$i])->first();
            $product_name = $product_info->product_model_name;

            $saleItem->product_name = $product_name;
            $saleItem->orderQuantity = $request->orderQuantity[$i];

            $stock_up = ProductModel::find($request->product_model_id[$i]);
            $stock_up->quantity = $stock_up->quantity - $request->orderQuantity[$i];
            $stock_up->save();

            $saleItem->price = $request->price[$i];
            $saleItem->totalPrice = $request->totalPrice[$i];
            $saleItem->save();
        }

        flash('New Sales Add Success.')->success();
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
        $template = Session::get('template');
        $sale = Sale::where('id',$sale->id)->with('sale_items')->with('sale_payments')->with('customer')->first();
        $total_due = customer::where('id',$sale->customer_id)->first();
        $total_due = $total_due->due;
        return view('sales.show',compact('sale','template','total_due'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $template = Session::get('template');
        $customers = customer::pluck('name','id');
        $sale = Sale::where('id',$sale->id)->with('sale_items')->with('sale_payments')->first();
        return view('sales.edit',compact('sale','customers','template'));
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
        $this->validate($request, [
            'invoice' => 'required',
            'shipping_address' => 'sometimes',
            'customer_id' => 'required',
            'date' => 'required',
            'subtotal' => 'required',
            'vat' => 'sometimes',
            'discount' => 'sometimes',
            'netTotal' => 'required',
            'paid' => 'sometimes',
            'due' => 'sometimes',
            'product_model_id' => 'sometimes',
            'orderQuantity' => 'sometimes',
            'price' => 'sometimes',
            'totalPrice' => 'sometimes'
        ]);

        $saleStatus = 'Due';

        if ($request->due == 0){
            $saleStatus = 'Complete';
        }

        $sale = Sales::find($sales->id);
        $sale->invoice = $request->invoice;
        $sale->customer_id = $request->customer_id;
        $sale->user_id = Auth::user()->id;
        $sale->date = $request->date;
        $sale->subtotal = $request->subtotal;
        $sale->total_qty = $request->total_qty;
        $sale->vat = $request->vat;
        $sale->discount = $request->discount;
        $sale->netTotal = $request->netTotal;
        $sale->word = $request->word;
        $sale->paid = $request->paid;
        $sale->due = $request->due;
        $sale->status = $saleStatus;
        $sale->save();

        for ($i=0; $i <count($request->price) ; $i++) {
            $saleItem = new SaleItem();
            $saleItem->invoice = $request->invoice;
            $saleItem->sale_id = $sale->id;
            $saleItem->product_model_id = $request->product_model_id[$i];
            $saleItem->orderQuantity = $request->orderQuantity[$i];
            $saleItem->price = $request->price[$i];
            $saleItem->totalPrice = $request->totalPrice[$i];
            $saleItem->save();
        }

        flash('New Sales Add Success.')->success();

        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        flash('Sale Delete Success')->success();
        return redirect()->route('sales.index');
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
        
        $products = ProductModel::where(`LOWER(`.$fieldName.`)`, 'LIKE', "$name%")->get();

        return $products;
    }


    public function addNewRow()
    {
        $products = ProductModel::where('store',session()->get('template'))->pluck('product_model_name','id');
        return view('sales.addNewRow',compact('products'));
    }

    public function single_sell_item(Request $request) {
        $id = $request->id;
        $product = ProductModel::where('id',$id)->first();
        return $product;

    }
}