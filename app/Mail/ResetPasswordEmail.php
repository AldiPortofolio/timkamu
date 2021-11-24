<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dataUser;
    public $otpCode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $otpCode)
    {
        $this->dataUser = $data;
        $this->otpCode = $otpCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset Password')
            ->markdown('mails.reset-password');
    }
}
