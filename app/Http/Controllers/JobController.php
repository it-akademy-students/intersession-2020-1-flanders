<?php

namespace App\Http\Controllers;


use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Jobs\SendEmail;
use App\Jobs\AnalyseCode;
use App\Jobs\AnalyseCodePhpStan;

use App\Http\Controllers\Controller;

class JobController extends Controller
{

<<<<<<< HEAD
/**
 *
 *
 * @param Request $request
 * @return \Illuminate\Http\RedirectResponse
 * @throws \Symfony\Component\HttpKernel\Exception\HttpException
 */
public function enqueue()
{

  AnalyseCode::withChain([
    new AnalyseCodePhpStan(),
    new SendEmail()
])->dispatch();

}
=======
    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function enqueue()
    {

    AnalyseCode::withChain([
        new AnalyseCodePhpStan(),
        new SendEmail()
    ])->dispatch();

    }
>>>>>>> f884fb3b2862b78174020983f5d2fbd88e66cf6f

}
