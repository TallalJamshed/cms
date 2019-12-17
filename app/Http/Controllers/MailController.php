<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class MailController extends Controller
{
    public function index(Request $request){
        if( (!empty($request->to)) && (!empty($request->subject)) && (!empty($request->emailbody)) ){
            dd($request);
        }
        else{
            Session::flash('message', 'Please fill all required fields to send Email'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route(Session::get('prevroute'));
        }
    }
}
