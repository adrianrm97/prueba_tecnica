<?php

namespace App\Providers;

use App\Interfaces\MailerProvider;

class SmtpProvider implements MailerProvider
{
    public function send($email, $message){
        return false;
    }
}
