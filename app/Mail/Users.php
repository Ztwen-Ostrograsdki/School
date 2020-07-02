<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Users extends Mailable
{
    use Queueable, SerializesModels;


    public $contacts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $contacts)
    {
       $this->contacts = $contacts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('houndekz@gmail.com')
        ->view('emails.users');
    }
}
