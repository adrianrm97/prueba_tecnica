<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Services\NotificationService;
use App\Providers\SesProvider;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendNotificationCommand {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $this->argument('id');
        $user = new User();
        $notificationService = new NotificationService(new SesProvider());
        $message = "Usando el SesProvider desde comando";
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
