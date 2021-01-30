<?php

namespace App\Http\Controllers;

use App\Models\Appmode;
use Illuminate\Http\Request;

class AppmodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appmodes = Appmode::all();
        // return $appmodes;
        return view('appmodes.index',compact('appmodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = 1;
        $mode = Appmode::find($id);
        return $mode;
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
        // Validation Data
        $request->validate([
            'name' => 'required',
            'rate' => 'required',
        ], [
            'name.requried' => 'Please give a name'
        ]);
        //saving on database
        $appmodes =new Appmode();
        $appmodes->name = $request->name;
        $appmodes->threshold = $request->threshold;
        $appmodes->rate = $request->rate;
        $appmodes->currentAmmount = $request->currentAmmount;
        $appmodes->save();

        session()->flash('success', 'App Modes has been created !!');
        return redirect()->route('appmodes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appmode  $appmode
     * @return \Illuminate\Http\Response
     */
    public function show(Appmode $appmode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appmode  $appmode
     * @return \Illuminate\Http\Response
     */
    public function edit(Appmode $appmode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appmode  $appmode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appmode $appmode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appmode  $appmode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appmode $appmode)
    {
        $appmode->delete();
        session()->flash('success', 'App Modes has been Deleted !!');
        return redirect()->route('appmodes.index');
    }
}
