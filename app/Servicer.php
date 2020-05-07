<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Servicer extends Model
{

	protected $fillable = ['serviceIcon','servicetitle','serviceDetails'];

    public function insertServiceData($request){

    	Servicer::create($request->all());
    }

    public function updateServiceData($request){

    	$service = new Servicer;

    	$result = DB::table('servicers')
    				->where('id',$request->id)
    				->update([
    					'serviceIcon' => $request->serviceIcon,
    					'serviceTitle' => $request->servicetitle,
    					'serviceDetails' => $request->serviceDetails
    				]);
    }
}
