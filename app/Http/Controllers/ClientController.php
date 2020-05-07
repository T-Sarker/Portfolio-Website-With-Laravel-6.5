<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function addClient(){

    	return view('admin.client.addClient');
    }

    public function insertClientMessage(Request $request){

    	$request->validate([
    		'clientName' 	=> 'required|max:100',
    		'clientJob'  	=> 'required|max:60',
    		'clientImage'	=> 'required',
    		'clientMessage' => 'required|max:300'
    	]);

    	$client = new Client;

    	$client->insertClientMessageIntoDB($request);

    	return redirect('admin/client/add-client')->with('message','Successful');
    } 


    public function manageClient(){
    	return view('admin.client.manageClient',[
    			'clients' => Client::all()
    	]);
    }

    public function editClient($id,$name){

    	return view('admin.client.editClient',[
    		'clients' => Client::find($id)
    	]);
    }


    public function updateClient(Request $request){

    	$client = new Client;
    	$client->updateClientIntoDB($request);

    	return redirect('admin/client/manage-client')->with('message',"Successful");
    } 
}
