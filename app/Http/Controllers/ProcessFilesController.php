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

    public function index(Request $request)
    {
        foreach( $request->params as $key => $file) {
            $owner = $file['repository']['owner']['login'];
            $repo = $file['repository']['full_name'];
            $explode = explode('/', $repo);
            $realRepo = $explode[1];
            $path = $file['path'];

            $client = new \GuzzleHttp\Client();
            $credentials = base64_encode('AyeWai:Choutey0206');
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



        }
        //exec('psecio-parse scan -vv C:\wamp64\www\intersession-2020-1-flanders\storage\app\public\files > test69');
         return 'Done';

    }


}
