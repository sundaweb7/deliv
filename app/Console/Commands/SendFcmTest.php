<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FcmV1Service;

class SendFcmTest extends Command
{
    protected $signature = 'fcm:send-test {token} {--title=Test} {--body="Hello from backend"}';

    protected $description = 'Send a test FCM v1 message to a registration token using Service Account JSON configured in .env';

    public function handle()
    {
        $token = $this->argument('token');
        $title = $this->option('title');
        $body = $this->option('body');

        try {
            $svc = app(FcmV1Service::class);
            $ok = $svc->sendToToken($token, $title, $body);
            if ($ok) {
                $this->info('Message sent successfully');
                return Command::SUCCESS;
            }
            $this->error('Message send failed');
            return Command::FAILURE;
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
