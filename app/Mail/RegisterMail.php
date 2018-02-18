<?php

namespace App\Mail;

use App\Models\User;

class RegisterMail extends BaseMail
{

    /**
     * RegisterMail constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('company.no-reply'))
            ->subject(__('general.sign_up'))
            ->view('mails.register')
            ->text('mails.register-plain');
    }
}