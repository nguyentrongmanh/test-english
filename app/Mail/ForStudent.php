<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForStudent extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $class;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($student, $class)
    {
        $this->student = $student;
        $this->class = $class;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mails.student')
            ->subject('Class registration is successful');
    }
}
