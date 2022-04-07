<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\NotificationService;
use App\Providers\SmtpProvider;

class UserController extends Controller
{
    public function sendNotification(User $user)
    {
        $notificationService = new NotificationService(new SmtpProvider());

        $message = "Usando el SmtpProvider";
        $result = $notificationService->notify($user,$message);

        $response = json_encode([
            'id' => $user->id,
            'email' => $user->email,
            'message' => $message,
            'result' => $result
        ]);

        return $response;
    }
}
