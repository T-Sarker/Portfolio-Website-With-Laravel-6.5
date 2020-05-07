<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GalleryMedia;
use App\Galllery;

class GalleryMediaController extends Controller
{
    public function insertMedia(Request $request){

    	$request->validate([
    		'galleryTitle' => 'required',
    		'galleryImage' => 'required'
    	]);

    	$gallery = new GalleryMedia;

    	$gallery->insertGalleryMediaInDB($request);

    	return redirect('/admin/portfolio/add-protfolio-content')->with('message','Success');
    }

    public function manageGallery(){

    	return view('admin.gallery.manageGallery',[
    				'galleries' => GalleryMedia::get()
    	]);
    }

    public function editGalleryMedia($id,$name){

    	return view('admin.gallery.editGalleryMedia',[
    				'gallery' => GalleryMedia::find($id),
    				'heading' => Galllery::all()
    	]);
    }

    public function updateGalleryMedia(Request $request){

    	$gallery = new GalleryMedia;
    	$gallery->updateGalleryMediaIntoDB($request);

    	return redirect('admin/portfolio/manage-protfolio-content')->with('message','Success');
    	
    }

    public function deleteMedia(Request $request){

    	$gallery = new GalleryMedia;
    	$data = $gallery->find($request->id);
    	unlink($data->galleryImage);
    	$data->delete();

    	return redirect('admin/portfolio/manage-protfolio-content')->with('message','Successful');
    }
}
