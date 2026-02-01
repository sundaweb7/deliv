<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (\Illuminate\Support\Facades\DB::getDriverName() === 'sqlite') {
                $table->string('payment_method')->nullable()->after('order_type');
            } else {
                $table->enum('payment_method', ['wallet','bank_transfer','cod'])->nullable()->after('order_type');
            }
            $table->enum('payment_status', ['pending','paid','failed'])->default('pending')->after('status');
            $table->foreignId('bank_id')->nullable()->constrained('banks')->onDelete('set null')->after('payment_status');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['bank_id']);
            $table->dropColumn(['payment_method','payment_status','bank_id']);
        });
    }
};
