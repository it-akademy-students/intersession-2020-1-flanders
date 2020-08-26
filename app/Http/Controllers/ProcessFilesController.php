<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Storage;

class ProcessFilesController extends BaseController
{
    public function index(Request $request){
//https://github.com/it-akademy-students/intersession-2020-1-flanders
  // $filename =  Storage::disk('public')->put('files/fileTest.php' , 'caca');

foreach( $request->params as $key => $file) {
          $owner = $file['repository']['owner']['login'];
          $repo = $file['repository']['full_name'];
          $explode = explode('/', $repo);
          $realRepo = $explode[1];
          $path = $file['path'];
          $client = new \GuzzleHttp\Client();
          $return = $client->get('https://api.github.com/repos/'.$owner.'/'.$realRepo.'/contents/'.$path.'');
          $response = $return->getBody();
          $filename =  Storage::disk('public')->put('files/'.$key , $response);
          // return $return;
      }
      return $request->params;

      //
      // return $request->params;
      //   foreach( $request->params as $file){
      //       // $filename =  Storage::disk('public')->put('files/' . $storeFile);
      //       return $file;
      //   }
        // return $request->params;
    }
}
