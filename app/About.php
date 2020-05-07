<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\About;
use DB;

class About extends Model
{
    public function saveAboutDataIntoDB($request){

    	$image = $request->file('aboutImage');
    	$imgName = $image->getClientOriginalName();
    	$directory = 'upload-images/about-image/';
    	$imageUp = $image->move($directory,$imgName);


    	$about = DB::table('abouts')->insert([

			'aboutTitle'     => $request->aboutTitle,
			'aboutImage'     => $directory.$imgName,
			'aboutDetails'   => $request->aboutDetails,
			"created_at" 	 =>  date('Y-m-d H:i:s'),
            "updated_at" 	 => date('Y-m-d H:i:s'),					
		]);

    }

    public static function deleteAboutData($request){

    	$about = About::find($request->id);

    	$image = $about->aboutImage;
    	unlink($image);
    	$about->delete();
    }


    public function updateAboutData($request){

    	$data = About::find($request->aboutId);
    	$image = $request->file('aboutImage');

    	if ($image) {
    		
    		unlink($data->aboutImage);
    		$imageName = $image->getClientOriginalName();
    		$directory = 'upload-images/about-image/';
    		$image->move($directory,$imageName);
    	}

    	$data->aboutTitle    	 =   $request->aboutTitle;
    	if ($image) {

    		$data->aboutImage    =   $directory.$imageName;
    	}

    	$data->aboutDetails      =   $request->aboutDetails;

    	$data->save();
    }
}
