<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Driver;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::firstOrCreate([
            'email' => 'admin@deliv.test'
        ], [
            'name' => 'Admin',
            'phone' => '081200000000',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        Wallet::firstOrCreate(['user_id' => $admin->id], ['balance' => 0]);

        // Sample Mitra
        $mitraUser = User::firstOrCreate([
            'email' => 'mitra1@deliv.test'
        ], [
            'name' => 'Mitra 1',
            'phone' => '081211111111',
            'password' => Hash::make('password'),
            'role' => 'mitra'
        ]);

        $mitra = Mitra::firstOrCreate(['user_id' => $mitraUser->id], ['delivery_type' => 'app_driver', 'lat' => -6.200000, 'lng' => 106.816666]);
        Wallet::firstOrCreate(['user_id' => $mitraUser->id], ['balance' => 0]);

        Product::firstOrCreate(['mitra_id' => $mitra->id, 'name' => 'Nasi Goreng'], ['price' => 20000, 'stock' => 20]);
        Product::firstOrCreate(['mitra_id' => $mitra->id, 'name' => 'Indomie Goreng'], ['price' => 8000, 'stock' => 50]);

        // Sample Driver
        $driverUser = User::firstOrCreate([
            'email' => 'driver1@deliv.test'
        ], [
            'name' => 'Driver 1',
            'phone' => '081233333333',
            'password' => Hash::make('password'),
            'role' => 'driver'
        ]);

        Driver::firstOrCreate(['user_id' => $driverUser->id], ['is_online' => false]);
        Wallet::firstOrCreate(['user_id' => $driverUser->id], ['balance' => 0]);

        // Sample Customer
        $customer = User::firstOrCreate([
            'email' => 'customer@deliv.test'
        ], [
            'name' => 'Customer',
            'phone' => '081244444444',
            'password' => Hash::make('password'),
            'role' => 'customer'
        ]);
        Wallet::firstOrCreate(['user_id' => $customer->id], ['balance' => 100000]);
    }
}
