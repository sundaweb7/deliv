<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_vendors', function (Blueprint $table) {
            $table->boolean('payout_processed')->default(false)->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('order_vendors', function (Blueprint $table) {
            $table->dropColumn('payout_processed');
        });
    }
};
