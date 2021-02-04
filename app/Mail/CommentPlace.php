<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentPlace extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $commenterName = '',$commenterEmail='',$comment = '';

    public function __construct($commenterName,$commenterEmail,$comment)
    {
        $this->commenterName    = $commenterName;
        $this->commenterEmail   = $commenterEmail;
        $this->comment          = $comment; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('templates.emailSend');
    }
}


