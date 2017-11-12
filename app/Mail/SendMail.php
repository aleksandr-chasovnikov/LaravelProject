<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    protected $userEmail;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param string $userEmail
     * @param string $message
     */
    public function __construct(string $userEmail, string $message)
    {
        $this->userEmail = $userEmail;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contact')
            ->with([
                'email' => $this->userEmail,
                'message' => $this->message,
            ]);
    }
}
