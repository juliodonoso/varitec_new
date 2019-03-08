<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailVaritec extends Mailable
{
    use Queueable, SerializesModels;

    public $distressCall;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DistressCall $distressCall)
    {
        $this->distressCall = $distressCall;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('puyol.22@gmail.com')
                    ->view('mails.mailVaritec');

    }
}
