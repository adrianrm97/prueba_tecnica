<?php

namespace App\Providers;

use App\Interfaces\MailerProvider;

class SesProvider implements MailerProvider
{
    public function send($email, $message){
        return true;
    }
}
