<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Client extends Model
{
    public function insertClientMessageIntoDB($request){

    	$image = $request->file('clientImage');
    	$imgName = $image->getClientOriginalName();
    	$directory = 'upload-images/client-image/';

    	$image->move($directory,$imgName);

    	DB::table('clients')->insert([
    		'clientName' 	=> $request->clientName,
    		'clientJob'  	=> $request->clientJob,
    		'clientImage'	=> $directory.$imgName,
    		'clientMessage' => $request->clientMessage,
    		'created_at'    => date('Y-m-d'),
    		'updated_at'    => date('Y-m-d')
    	]);
    }


    public function updateClientIntoDB($request){

    	$datas = Client::find($request->id);

    	// var_dump($datas);

    	$image = $request->file('clientImage');
    	if ($image) {
    		
    		$imgName = $image->getClientOriginalName();
    		$directory = 'upload-images/client-image/';

    		unlink($datas->clientImage);
    		$image->move($directory,$imgName);

			$imgPath = $directory.$imgName;
    	}

    	$datas->clientName  = $request->clientName;

    	$datas->clientJob  = $request->clientJob;

    	if (isset($imgPath)) {
    		
    		$datas->clientImage = $imgPath;
    	}

    	$datas->clientMessage = $request->clientMessage;

    	$datas->save();

    }
}
