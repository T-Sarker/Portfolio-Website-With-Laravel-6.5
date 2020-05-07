<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use DB;

class ProfileController extends Controller
{
    public function saveProfile(){
    	return view('admin.profile.side-profile');
    }


    public function saveProfileDetails(Request $request){

    	$profile = new Profile;
    	$profile->insertProfileDetailsIntoDB($request);

    	return redirect('/admin/profile/add-profile-details')->with("message","Profile Details Inserted");
    }

    public function showManageProfile(){

    	$profile = DB::table('profiles')->orderBy('id','desc')->first();

    	return view('admin.profile.manageProfile',['myprofile'=> $profile]);
    }

    public function editProfile($id,$name){

        return view('admin.profile.edit-profile',[
                    'profile' => Profile::find($id)
            ]);
    }

    public function updateProfile(Request $request){

        $profile = new Profile;

        $profile->updateProfileDetails($request);

        return redirect('/admin/profile/manage-profile-details')->with('message',"Update Done");
    }

}
