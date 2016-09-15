<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Officer;

class OfficersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $officers = Officer::all();
     return view('officer.officer_index')->with('list_officer',$officers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
     return view('officer.officer_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $officers = Officer::create([
            'name' => $request->input_name,
            'address' => $request->input_address
            ]);
        // $add = new Officer();
        // $add->name = $request->input_name;
        // $add->address = $request->input_address;
        // $add->save();

        return redirect('officer-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $officers = Officer::find($id);
       return view('officer.officer_show')->with('list_officer',$officers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $officers = Officer::find($id);
        return view('officer.officer_edit')->with('list_officer',$officers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $officers = Officer::find($id);
        $officers->name = $request->name;
        $officers->address = $request->address;
        $officers->save();
        // $officers->update($request->all());
        return redirect('officer-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $officers = Officer::find($id);
        $officers->delete();
        return redirect('officer-index');
    }
}
