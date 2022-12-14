<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormDoneEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $formType;

    public function __construct($formType)
    {
        $this->formType = $formType;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.forward-form-approved-notification')
                    ->subject('Forms Approval Complete');
    }
}
