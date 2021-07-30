<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('test', function () {

    $path = storage_path() . "/app/list.json";
   
	$json = json_decode(file_get_contents($path), true);

    //print_r($json); die();
	
	for ($i=0; $i < count($json['members']); $i++) {
        $data[$i]['email'] = $json['members'][$i]['email_address'];
        $data[$i]['full_name'] = $json['members'][$i]['full_name'];
        $data[$i]['status'] = $json['members'][$i]['status'];  
    } 
    
   $json_data = json_encode($data);
   file_put_contents(storage_path()."/app/public/test.json", stripslashes($json_data));
    
})->purpose('read and write file');