<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\EmailForQueuing;
use Mail;
use App\Http\Controllers\ProcessFilesController;
use Session;
use Storage;
class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mailCredentials =  Storage::disk('public')->get('mail/mailCredential.txt');
        // $mail = $mailCredentials->getContent();
        $email = new EmailForQueuing();
        Mail::to(''.$mailCredentials.'')->send($email);
        $analyser = shell_exec('rm -rf '.base_path('storage/app/public/files').'');
        Storage::disk('public')->delete('mail/mailCredential.txt');
    }
}
