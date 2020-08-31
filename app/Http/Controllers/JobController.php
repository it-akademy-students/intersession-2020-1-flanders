<?php

namespace App\Http\Controllers;


use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Jobs\SendEmail;

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
public function enqueue()
{

    // $emailJob = new SendEmail()->delay(Carbon::now()->addMinutes(1));
    $emailJob = new SendEmail();
    dispatch($emailJob)->delay(now()->addMinutes(2));
}

}
