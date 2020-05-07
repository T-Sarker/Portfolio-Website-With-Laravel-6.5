<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicer;

class ServiceController extends Controller
{
    public function addService(){

    	return view('admin.service.service');
    }

    public function insertService(Request $request){

    	$request->validate([
    				'serviceIcon'    => 'required|max:10',
    				'servicetitle'   => 'required|max:50',
    				'serviceDetails' => 'required|max:150'
    	]);

    	$service = new Servicer;

    	$service->insertServiceData($request);

    	return redirect('admin/service/insert-service')->with('message','Success');
    }

    public function manageService(){

    	return view('admin.service.manageService',[
    				'services' => Servicer::all()
    	]);
    }


    public function editService($id,$name){

    	return view('admin.service.editService',[
    			'service' => Servicer::find($id)
    	]);
    }

    public function updateService(Request $request){

    	$service = new Servicer;
    	$service->updateServiceData($request);

    	return redirect('/admin/service/manage-service')->with('message','Successful');
    }
}
