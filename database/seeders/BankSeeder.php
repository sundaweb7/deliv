<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bank;

class BankSeeder extends Seeder
{
    public function run(): void
    {
        Bank::firstOrCreate(['name'=>'BCA'], ['account_name'=>'Deliv','account_number'=>'1234567890','type'=>'bank','is_active'=>true]);
        Bank::firstOrCreate(['name'=>'DANA'], ['account_name'=>'Deliv','account_number'=>'081200000000','type'=>'ewallet','is_active'=>true]);
    }
}
