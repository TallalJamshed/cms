<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Lawcase;
use App\Client;
use App\Payment;
use Session;
use Illuminate\Support\Facades\validator;

class PayController extends Controller
{
    public function getAmount($id){
        $payment = Payment::where('fk_case_id','=',$id)->get();
        $amount = Lawcase::where('case_id','=',$id)->select('amount')->first();
        $total = $amount->amount;
        foreach ($payment as $value) {
            $total -= $value->paid_amount;
        }
        return $total;
    }

    public function caseFunctions(Request $id){
        // dd($id);
        if(isset($id->case_id)){
            $case = Lawcase::join('client','client.client_id','=','cases.fk_client_id')->where('case_id','=',$id->case_id)->first();
            // $payment = Payment::where('fk_case_id','=',$id->case_id)->get();
            // $total_dues = $case->amount;
            // foreach ($payment as $value) {
            //     $total_dues -= $value->paid_amount;
            // }
            $amount = $this->getAmount($id->case_id);
            return view('invoice')->with('case',$case)->with('total_dues',$amount);
        }
        if(isset($id->mail_id)){
            
        }
        if(isset($id->pay_id)){
            $case = Lawcase::join('client','client.client_id','=','cases.fk_client_id')->where('case_id','=',$id->pay_id)->first();
            $amount = $this->getAmount($id->pay_id);
            return view('addpayment')->with('case',$case)->with('total_dues',$amount);
            // ->with('invoiceno' , $id->acronym);
        }
    }

    public function payView($para){
        foreach ($para as $key => $value) {
           echo $key;
           echo $value;
        }
        die();
        $case = Lawcase::join('client','client.client_id','=','cases.fk_client_id')->where('case_id','=',$id)->first();
        $amount = $this->getAmount($id);
        // dd($case , $amount);
        return view('addpayment')->with('case',$case)->with('total_dues',$amount);
        // ->with('errors', $errors);
    }

    public function addPayment(Request $request){

        $messages = [
            'fk_case_id.required' => 'Case Id is required',
            'fk_client_id.required' => 'Client Id is required',
            'paid_amount.required' => 'Paid Amount is required',
            'paid_amount.numeric' => 'Paid amount should be numeric'
        ];
         $validator = Validator::make($request->all(), [
            'fk_case_id' => 'required',
            'fk_client_id' => 'required',
            'paid_amount' => 'required|numeric'
         ], $messages);
         if ($validator->fails()) {
            
            $errors = [];
            foreach ($validator->messages()->getMessages() as $field_name => $messages)
            {
                $errors[] = $messages[0];
            }
            $text = serialize($errors);
            $para = array(
                'caseid' => $request->fk_case_id,
                'errors' => $text,
            );
            
            // dd($text);
            Session::flash('message', 'Please do not leave payment fields empty'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route(Session::get('prevroute'));
            // ->route('casefunctions',['id'=>$id]);
            // return redirect()->action('PayController@payView' , $id)->withErrors($validator)->withInput();
        }
        // $validator = Validator::make($input, $rules, $messages);
            $payment = new Payment;
            $payment->fill($request->all());
            $payment->save();
            Session::flash('message', 'Payment is Added'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect()->route(Session::get('prevroute'));
        
    }
}
