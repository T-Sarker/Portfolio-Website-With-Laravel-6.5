<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galllery extends Model
{
	protected $fillable = ['groupName'];
	
    public function saveGalleryGroupNameDataIntoDB($request){

    	Galllery::create($request->all());
    }
}
