<?php

namespace App\Mail;

use App\Models\User;

class PasswordResetMail extends BaseMail
{
    /**
     * PasswordResetMail constructor.
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
            ->subject(__('general.reset_pwd'))
            ->view('mails.reset_pwd')
            ->text('mails.reset_pwd-plain');
    }
}
