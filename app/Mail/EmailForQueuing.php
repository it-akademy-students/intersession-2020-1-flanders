<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailForQueuing extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      // $file = $this->view('mails.email2');
      // $files = $request->file($test);
      // $popo = file_get_contents($files);
      // dd($popo);
      return $this->view('mails.email')
<<<<<<< HEAD
      ->attach("".storage_path('/app/public/mail/email2.txt')."")
      ->attach("".storage_path('/app/public/mail/Conseils_Prevention.docx')."");
=======
      ->attach("".storage_path('/app/public/mail/email2.txt')."");
      //->attach("".storage_path('/app/public/mail/Attacks.docx')."");
>>>>>>> f884fb3b2862b78174020983f5d2fbd88e66cf6f
    }
}
