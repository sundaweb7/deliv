<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

class CustomerPhoneSeeder extends Seeder
{
    public function run(): void
    {
        $phone = '081255555555';
        $user = User::where('phone', $phone)->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Phone Customer',
                'email' => null,
                'phone' => $phone,
                'password' => Hash::make('password'),
                'role' => 'customer'
            ]);
            Wallet::create(['user_id' => $user->id, 'balance' => 50000]);
        }
    }
}