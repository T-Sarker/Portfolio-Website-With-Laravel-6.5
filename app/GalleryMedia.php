<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryMedia extends Model
{
    protected $fillable =['galleryTitle','galleryHeading','galleryLink','galleryImage'];

    public function insertGalleryMediaInDB($request){

    	$galleryMedia = new GalleryMedia;

    	$image = $request->file('galleryImage');
    	$imgName = $image->getClientOriginalName();
    	$directory = 'upload-images/gallery-images/';

    	$image->move($directory,$imgName);

    	$galleryMedia->galleryTitle  =  $request->galleryTitle;
    	$galleryMedia->galleryHeading  =  $request->galleryHeading;

    	if($request->galleryLink){
    		$galleryMedia->galleryLink  =  $request->galleryLink;
    	}else{
	    		$galleryMedia->galleryLink  =  0;
    	}
    	$galleryMedia->galleryImage  =  $directory.$imgName;

    	$galleryMedia->save();
    }


    public function updateGalleryMediaIntoDB($request){

    	$gallery = new GalleryMedia;

    	$media = $gallery->find($request->id);

    	$image = $request->file('galleryImage');

    	if($image){

    		unlink($media->galleryImage);

    		$imgName = $image->getClientOriginalName();
    		$directory = 'upload-images/gallery-images/';

    		$image->move($directory,$imgName);

    		$imgPath = $directory.$imgName;
    	}

    	$media->galleryTitle  =  $request->galleryTitle;
        
    	if ($imgPath) {
    		$media->galleryImage  =  $imgPath;
    	}
    	$media->galleryHeading  =  $request->galleryHeading;
    	$media->galleryLink  =  $request->galleryLink;

    	$media->save();


    }
}
