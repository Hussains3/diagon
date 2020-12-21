<?php

namespace App\Http\Controllers;

use App\Models\Goption;
use Illuminate\Http\Request;

class GoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Goption  $goption
     * @return \Illuminate\Http\Response
     */
    public function show(Goption $goption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goption  $goption
     * @return \Illuminate\Http\Response
     */
    public function edit(Goption $goption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goption  $goption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goption $goption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goption  $goption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goption $goption)
    {
        //
    }
}
