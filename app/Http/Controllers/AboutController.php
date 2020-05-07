<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function addAbout(){

    	return view('admin.about.about');
    }

    public function insertAbout(Request $request){

    	$request->validate([
    			'aboutTitle' => 'required|max:50',
    			'aboutImage' => 'required',
    			'aboutDetails' => 'required'
    	]);

    	$about = new About;

    	$about->saveAboutDataIntoDB($request);

    	return redirect('/admin/about/add-about')->with('message',"About successful");
    }


    public function manageAbout(){

    	return view('admin.about.manageAbouts',[
    			'about' => About::orderBy('id','DESC')->first()	
    		]);
    }


    public function editAbout($id,$name){

    	return view('admin/about/editAbout',[
    				"about" => About::find($id)
    	]);
    }

    public function deleteAbout(Request $request){

    	$about = About::deleteAboutData($request);

    	return redirect('/admin/about/manage-about')->with('message','About Deleted');
    }

    public function updateAbout(Request $request){

    	$about = new About;
    	$about->updateAboutData($request);

    	return redirect('/admin/about/manage-about')->with('message','Successful');
    }
}
