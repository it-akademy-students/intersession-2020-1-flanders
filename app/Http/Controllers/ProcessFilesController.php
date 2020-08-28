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
          $credentials = base64_encode(env('USERNAME').':'.env('USERPASSWORD'));
          $return = $client->get('https://api.github.com/repos/'.$owner.'/'.$realRepo.'/contents/'.$path.'',
        [
            'headers' => [
                'Authorization' => 'Basic ' . $credentials,
            ],
        ]);
        $response = json_decode($return->getBody(), true);
        $name = $response['name'];
        $content = base64_decode($response['content']);
        $filename =  Storage::disk('public')->put('files/'.$name , $content);

          // $client = new \GuzzleHttp\Client();
          // $return = $client->get('https://api.github.com/repos/'.$owner.'/'.$realRepo.'/contents/'.$path.'');
          //
          // $response = $return->getBody()->getContents();
          // // $decode = base64_decode($response['content']);
          // $name = $response['name'];
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
