<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CaseRequest;
use App\Http\Requests\EditCaseRequest;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Lawcase;
use App\Dates;
use App\Client;
use Auth;
use Session;

class CaseController extends Controller
{
    public function addCaseForm(){
        $clientdata = Client::where('fk_lawyers_id','=',Auth::id())->get();
        // dd($clientdata);
        return view('addcase')->with('data' , $clientdata);
    }

    public function showAllCases(){
        $data = Lawcase::where('fk_user_id','=',Auth::id())->where('next_date','!<',date('Y-m-d'))->where('case_status','!=','decided')->paginate(2);
        return view('allcases')->with('allcasesdata',$data);
    }

    public function showTodayCases(){
        $today = date('Y-m-d');
        $data = Lawcase::where('fk_user_id','=',Auth::id())->where('case_status','!=','decided')->where('next_date','=',$today)->paginate(20);
        return view('todaycases')->with('allcasesdata',$data);
    }

    public function showNextCases(){
        $nextday = date('Y-m-d' , strtotime('+1 days'));
        $data = Lawcase::where('fk_user_id','=',Auth::id())->where('case_status','!=','decided')->where('next_date','=',$nextday)->paginate(20);
        return view('nextcases')->with('allcasesdata',$data);
    }

    public function showPendingCases(){
        $data = Lawcase::where('fk_user_id','=',Auth::id())->where('case_status','!=','decided')->where('next_date','<',date('Y-m-d'))->paginate(20);
        return view('pendingcases')->with('allcasesdata',$data);
    }

    public function showDecidedCases(){
        $data = Lawcase::where('fk_user_id','=',Auth::id())->where('case_status','=','decided')->paginate(20);
        return view('decidedcases')->with('allcasesdata',$data);
    }
    
    public function showEditPage($caseid){
        $id = Crypt::decrypt($caseid);
        $data = Lawcase::where('fk_user_id','=',Auth::id())->where('case_id','=',$id)->first();
        return view('editcasepage')->with('casedata',$data);
    }
    
    public function addCaseInDb(CaseRequest $request){
        // dd($request->fk_client_id);
        $cases = new Lawcase;
        // $cases->where('fk_user_id','=',Auth::id());
        $cases->fill($request->all());
        $cases->fk_user_id = Auth::id();
        $cases->save();
        Session::flash('message', 'New Case is added'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->route(Session::get('prevroute'));
    }
    
    public function changeStatus($caseid){
        $id = Crypt::decrypt($caseid);
        $cases = Lawcase::find($id);
        $cases->case_status = 'decided';
        $cases->save();
        // Session::put('message','Case Status is changed to DECIDED. You can access all decided cases in "Decided Cases" button!');
        Session::flash('message', 'Case Status is changed. You can access all decided cases in "Decided Cases" button!'); 
        Session::flash('alert-class', 'alert-warning'); 
        return redirect()->route(Session::get('prevroute'));
        // ->with('message' , 'Case Status is changed to DECIDED. You can access all decided cases in "Decided Cases" button!');
    }
    
    public function updateCaseData(EditCaseRequest $request){
        $cases = new Lawcase;
        $date = new Dates;
        // dd($date);
        $cases = Lawcase::find(Crypt::decrypt($request->case_id));
        if(($request->next != $request->next_date) && ($request->prev_date != null) ){
            $date->fill($request->all());
            $date->fk_case_id = Crypt::decrypt($request->case_id);
            $date->save();
            $cases->previous_date = $request->next;
        }
        $cases->fill($request->all());
        // $cases->previous_date = $request->previous_date;
        $cases->save();
        Session::flash('message', 'Case is updated'); 
        Session::flash('alert-class', 'alert-success'); 
        
        return redirect()->route(Session::get('prevroute'));
    }
    
    public function showCaseDetails($id){   
        $casedetails = Lawcase::find(Crypt::decrypt($id));
        $dates = Dates::where('fk_case_id','=',Crypt::decrypt($id))->orderby('prev_date','desc')->take(5)->get();
        // dd($casedetails);
        return view('casedetails')->with('data',$casedetails)->with('dates',$dates);
    }

    public function deleteCase(Request $request){
        Lawcase::destroy($request->case_id);
        Session::flash('message', 'Your Case has been deleted'); 
        Session::flash('alert-class', 'alert-danger'); 
        return back();

    }

    public function getCaseDetails($id){
        $dates = Dates::where('fk_case_id','=',$id)->orderby('prev_date','desc')->take(5)->pluck('prev_date')->toArray();
        // $client = Client::where('fk_case_id','=',$id)->first();
        $client = Lawcase::join('client','client.client_id','=','cases.fk_client_id')->where('case_id','=',$id)->select('client_name','email','phone_number')->first();
        // print_r($client);
        // die();
        return array($dates , $client);
    }

    public function showBillingDetails($id){
        echo(Crypt::decrypt($id));
    }

    public function sendMailToClient($id){
        echo(Crypt::decrypt($id));
    }

    public function showInvoice(Request $id){
        // echo($id->invoiceid);
        // echo($id->mailid);
        // die();
        $case = Lawcase::where('case_id','=',$id->case_id)->first();
        $client = Client::where('fk_case_id','=',$id->case_id)->first();
        
        return view('invoice')->with('case',$case)->with('client',$client);
    }
}
