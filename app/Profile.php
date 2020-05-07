<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	protected $fillable = ['profileName','profileCv','profileImage','profileSkill','profileEmail','myLocation','ProfileAge','dateOfBirth','profilePhone','profileCountry'];

    private function uploadFiles($myFiles){

        $fileName = $myFiles->getClientOriginalName();
        $directory = "upload-images/profile-file/";

        $myFiles->move($directory,$fileName);

        return $directory.$fileName;

    }

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

    public function updateProfileDetails($request){

        $profile = new Profile;
        $datas = $profile->find($request->profileId);

        $pCv = $request->file('profileCv');
        $pImage = $request->file('profileImage');

        if ($pCv && !$pImage) {
            
            unlink($datas->profileCv);
            $cvPath = $this->uploadFiles($pCv);

        }elseif (!$pCv && $pImage) {

            unlink($datas->profileImage);
            $imgPath = $this->uploadFiles($pImage);

        }elseif ($pCv && $pImage) {
            
            unlink($datas->profileImage);
            $imgPath = $this->uploadFiles($pImage);

            unlink($datas->profileCv);
            $cvPath = $this->uploadFiles($pCv);
        }
        if (isset($cvPath)) {
            print_r($cvPath);
        }
        if (isset($imgPath)) {
            
            print_r($imgPath);
        }

        
        $datas->profileName       = $request->profileName;
        if(isset($cvPath)){
            $datas->profileCv     = $cvPath;
        }
        if(isset($imgPath)){
            $datas->profileImage     = $imgPath;
        }
        
        $datas->profileSkill      = $request->profileSkill;
        $datas->profileEmail      = $request->profileEmail;
        $datas->profileAddress    = $request->myLocation;
        $datas->ProfileAge        = $request->ProfileAge;
        $datas->dateOfBirth       = $request->dateOfBirth;
        $datas->profilePhone      = $request->profilePhone;
        $datas->profileCountry    = $request->profileCountry;

        $datas->save();
    }
}
