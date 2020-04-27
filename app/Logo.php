<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = ['image','imageName'];

    public static function saveLogoImageIntoDB($request){

    	$image = $request->file('logoImage');
    	$imgName = $image->getClientOriginalName();
    	$directory = 'upload-images/logo-image';

    	// var_dump($image);
    	$logo = new Logo();

    	$hasData = $logo->count();



		if ($hasData != 0) {
			$logoData = Logo::first();
			unlink($logoData->image);
			$delete = $logoData->delete();


		}

    	
    	
    	$image->move($directory,$imgName);

    	$logo->image = $directory.'/'.$imgName;
    	$logo->imageName = $request->imageName;

    	$logo->save();
    }
}