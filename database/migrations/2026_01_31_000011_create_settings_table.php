<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('vendor_commission_percent', 5, 2)->default(10.00);
            $table->decimal('admin_delivery_cut', 5, 2)->default(10.00);
            $table->text('fcm_server_key')->nullable();
            $table->timestamps();
        });

        // Insert default row
        \DB::table('settings')->insert([
            'vendor_commission_percent' => 10.00,
            'admin_delivery_cut' => 10.00,
            'fcm_server_key' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};