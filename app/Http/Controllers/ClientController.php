<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Client;
use App\Lawcase;
use Auth;
use Session;

class ClientController extends Controller
{
    public function showClientForm(){
        $clients = Client::where('fk_lawyers_id',Auth::user()->user_id)->get();
        return view('addclient')->with('clients',$clients);
    }

    public function addClientInDb(ClientRequest $request){
        $client = new Client;
        $client->fill($request->all());
        $client->fk_lawyers_id = Auth::id();
        $client->save();
        Session::flash('message', 'A new client is added'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    public function getClientDetails($id){
        // $dates = Dates::where('fk_case_id','=',$id)->orderby('prev_date','desc')->take(5)->pluck('prev_date')->toArray();
        // $client = Client::where('fk_case_id','=',$id)->first();
        // echo($id);
        $client = Lawcase::join('client','client.client_id','=','cases.fk_client_id')->where('case_id','=',$id)->select('client_name','email','case_status','case_title')->first();
        // print_r($client);
        // die();
        return array($client);
    }

    public function destroy(Request $request)
    {
        if(isset($request->client_id)){
            Client::where('client_id',$request->client_id)->delete();
        }
        Session::flash('message', 'Client is deleted'); 
        Session::flash('alert-class', 'alert-danger'); 
        return redirect()->back();
    }




    // public function destroy2(Client $client)
    // {
    //     $client->delete();
    //     Session::flash('message', 'Client is deleted'); 
    //     Session::flash('alert-class', 'alert-danger'); 
    //     return redirect()->back();
    // }
}
