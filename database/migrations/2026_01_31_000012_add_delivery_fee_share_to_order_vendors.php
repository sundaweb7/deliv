<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_vendors', function (Blueprint $table) {
            if (!Schema::hasColumn('order_vendors', 'delivery_fee_share')) {
                $table->decimal('delivery_fee_share', 12, 2)->default(0)->after('subtotal_food');
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_vendors', function (Blueprint $table) {
            if (Schema::hasColumn('order_vendors', 'delivery_fee_share')) {
                $table->dropColumn('delivery_fee_share');
            }
        });
    }
};