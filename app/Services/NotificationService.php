<?php

namespace App\Services;

use App\Providers\SmtpProvider;
use App\Providers\SesProvider;
use App\Models\User;

class NotificationService
{
    protected $emailProvider;

    public function __construct($provider) {
        $this->emailProvider = $provider;
    }

    public function notify(User $user, $message){
        $result = $this->emailProvider->send($user->email,$message);

        return $result;
    }
}
