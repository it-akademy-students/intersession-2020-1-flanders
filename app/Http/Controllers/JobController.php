<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Jobs\SendWelcomeEmail;

class JobController extends Controller
{
    /**
     * Handle Queue Process
     */
    public function processQueue()
    {
        $emailJob = new SendWelcomeEmail();
        dispatch($emailJob)->delay(now()->addMinutes(1));
    }
}
