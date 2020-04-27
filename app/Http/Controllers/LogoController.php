<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;

class LogoController extends Controller
{
    public function addLogo () {

    	return view('admin.logo.add-logo');
    }


    public function saveLogo(Request $request){

    		$request->validate([
    				'logoImage' => 'required',
    				'imageName' => 'required|max:191'
    		]);

    		$addLogo = Logo::saveLogoImageIntoDB($request);

    		
    		return redirect('/admin/logo/add-logo')->with('message',"Successfull");
    		

    }
}
