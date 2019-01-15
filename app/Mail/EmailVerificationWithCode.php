<?php

namespace App\Mail;

use App\User;
use App\EmailVerification;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerificationWithCode extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $code;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( User $user, $code, $email )
    {
        $this->user  = $user;
        $this->code  = $code;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->from( 'no-reply@acidfinance.com', 'Acid Finance' )
                ->replyTo( 'no-reply@acidfinance.com' )
                ->subject( 'Email Verification' )
                ->view( 'mail.verification.verify' );
    }
}
