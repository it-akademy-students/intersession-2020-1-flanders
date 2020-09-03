<?php

namespace App\Http\Controllers;


use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Jobs\SendEmail;
use App\Jobs\AnalyseCode;

use App\Http\Controllers\Controller;

class JobController extends Controller
{

    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function enqueue(Request $request)
    {

    AnalyseCode::withChain([
        new SendEmail($mail)
    ])->dispatch();

    }

}
