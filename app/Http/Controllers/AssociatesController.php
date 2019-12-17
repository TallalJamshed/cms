<?php

namespace App\Http\Controllers;

use App\associates;
use Illuminate\Http\Request;
use Auth;
use Session;

class AssociatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $associates = associates::where('fk_user_id',Auth::user()->user_id)->get();
        return view('addassoc')->with('associates',$associates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = new associates;
        $result->fk_user_id = Auth::user()->user_id;
        $result->fill($request->all());
        $result->save();
        Session::flash('message', 'Associate is Added'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\associates  $associates
     * @return \Illuminate\Http\Response
     */
    public function show(associates $associates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\associates  $associates
     * @return \Illuminate\Http\Response
     */
    public function edit(associates $associates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\associates  $associates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, associates $associates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\associates  $associates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(isset($request->assoc_id)){
            associates::where('assoc_id',$request->assoc_id)->delete();
        }
        Session::flash('message', 'Associate is deleted'); 
        Session::flash('alert-class', 'alert-danger'); 
        return redirect()->back();
    }
}
