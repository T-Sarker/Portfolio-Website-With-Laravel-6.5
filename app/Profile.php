<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	protected $fillable = ['profileName','profileCv','profileImage','profileSkill','profileEmail','myLocation','ProfileAge','dateOfBirth','profilePhone','profileCountry'];

    public function insertProfileDetailsIntoDB($request){

    	

    	//get the files from the form to the instance
    	$cvFile = $request->file('profileCv');
    	$imageFile = $request ->file('profileImage');

    	//getting the files name
    	$cvName = $cvFile->getClientOriginalName();
		$imageName = $imageFile->getClientOriginalName();

		//file save directory
    	$directory = "upload-images/profile-file";

    	$cvFile->move($directory,$cvName);
    	$imageFile->move($directory,$imageName);

    	$profile = new Profile;

    	$profile->profileName 		= $request->profileName;
    	$profile->profileCv 		= $directory.'/'.$cvName;
    	$profile->profileImage  	= $directory.'/'.$imageName;
    	$profile->profileSkill  	= $request->profileSkill;
    	$profile->profileEmail  	= $request->profileEmail;
    	$profile->profileAddress 	= $request->myLocation;
    	$profile->ProfileAge 		= $request->ProfileAge;
    	$profile->dateOfBirth 		= $request->dateOfBirth;
    	$profile->profilePhone 		= $request->profilePhone;
    	$profile->profileCountry 	= $request->profileCountry;

    	$profile->save();

    }
}
