<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class AlertEventFinishEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dataUser;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $message)
    {
        $this->dataUser = $data;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Hasil Games Event')
            ->markdown('mails.event-finish');
    }
}
