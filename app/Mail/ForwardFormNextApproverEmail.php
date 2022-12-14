<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForwardFormNextApproverEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $formType;
    public $nextApprover;
    public $formTitle;

    public function __construct($formType, $nextApprover, $formTitle)
    {
        $this->formType = $formType;
        $this->nextApprover = $nextApprover;
        $this->formTitle = $formTitle;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.forward-form-next-approver-notification')
                    ->subject('Forms Approval Pending');
    }
}
