<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $i = 0;
        $doctors = Doctor::all();
        return view('doctors.index',compact('doctors','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required|max:11',
        ], [
            'name.requried' => 'Please give a name'
        ]);
        //saving on database
        $doctor =new Doctor();
        $doctor->name = $request->name;
        $doctor->degree = $request->degree;
        $doctor->designation = $profile_image_url;
        $doctor->institution  = $signeture_url;
        $doctor->commission = $request->dob;
        $doctor->phone = $request->phone;
        $doctor->balance = $request->balance;
        $doctor->save();

        session()->flash('success', 'Doctor has been created !!');
        return redirect()->route('doctors.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $id)
    {
        //
        $doctor = Doctor::find($id);
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $i)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $i)
    {
        //
    }
}
