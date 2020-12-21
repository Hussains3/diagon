<?php

namespace App\Http\Controllers;

use App\Models\Testcategory;
use Illuminate\Http\Request;

class TestcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $testcategories  = Testcategory::all();
        return view('testcategories.index', compact('testcategories'));
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
        $request->validate([
            'name' => 'required|max:50',
        ], [
            'name.requried' => 'Please give a name'
        ]);
        //saving on database
        $category =new Testcategory();
        $category->name = $request->name;
        $category->save();

        session()->flash('success', 'Category has been created !!');
        return redirect()->route('testcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testcategory  $testcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Testcategory $testcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testcategory  $testcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Testcategory $testcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testcategory  $testcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testcategory $testcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testcategory  $testcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testcategory $testcategory)
    {
        //
    }
}
