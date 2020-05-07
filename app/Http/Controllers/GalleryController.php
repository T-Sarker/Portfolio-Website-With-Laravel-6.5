<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galllery;

class GalleryController extends Controller
{
    public function addProtfolioHeading(){

    	return view('admin.gallery.addGallery');
    }

    public function saveGallery(Request $request){

    	$gallery = new Galllery;
    	$gallery->saveGalleryGroupNameDataIntoDB($request);

    	return redirect('/admin/portfolio/add-protfolio-heading')->with('message','Successful');
    }

    public function galleryContent(){

    	return view('admin.gallery.addGalleryContent',[
    				'heading' => Galllery::all()
    	]);
    }
}
