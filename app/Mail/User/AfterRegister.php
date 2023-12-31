<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AfterRegister extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    /**
     * Create a new message instance.
     *  @return void
     */

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     * @return this
     */

     public function build() {
        return $this->subject('Registration on PWL2')->markdown('email.user.afterRegister', [
            'user' => $this->user
        ]);
     }

    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'After Register',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'emails.user.afterRegister',
    //     );
    // }
}
