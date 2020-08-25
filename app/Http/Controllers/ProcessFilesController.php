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
        foreach( $request->params as $file){
            $filename =  Storage::disk('public')->put('files/' . $storeFile);
            return $file;
        }
        return $request->params;
    }
}