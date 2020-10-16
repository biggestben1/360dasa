<?php

namespace App\Mail;

use App\User;
use App\Contactedb;
use App\Survey;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contactedb;
    public $Survey;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contactedb $contactedb,Survey $Survey,User $user)
    {
        $this->contactedb=$contactedb;
        $this->Survey=$Survey;
        $this->user=$user;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contact@the360surveys.com')->subject(" We'd love to hear from you! ")
            ->view('emails.mymail');
    }
}
