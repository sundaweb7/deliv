<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        $user = DB::table('users')->first();
        if (!$user) return;

        DB::table('notifications')->insert([
            [
                'id' => (string) Str::uuid(),
                'type' => 'App\\Notifications\\GenericNotification',
                'notifiable_type' => 'App\\Models\\User',
                'notifiable_id' => $user->id,
                'data' => json_encode(['title' => 'Test Notifikasi', 'body' => 'Ini notifikasi percobaan']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'type' => 'App\\Notifications\\GenericNotification',
                'notifiable_type' => 'App\\Models\\User',
                'notifiable_id' => $user->id,
                'data' => json_encode(['title' => 'Pesanan Dikonfirmasi', 'body' => 'Pesanan #123 telah dikonfirmasi.']),
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay(),
            ]
        ]);
    }
}
