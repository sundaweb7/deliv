<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([\Database\Seeders\AdminSeeder::class]);
        $this->call([\Database\Seeders\CustomerPhoneSeeder::class]);
        $this->call([\Database\Seeders\BankSeeder::class]);
        $this->call([\Database\Seeders\CategorySeeder::class]);
        $this->call([\Database\Seeders\SlideSeeder::class]);
        $this->call([\Database\Seeders\ProductImageSeeder::class]);
        $this->call([\Database\Seeders\ProductDummySeeder::class]);
    }
}
