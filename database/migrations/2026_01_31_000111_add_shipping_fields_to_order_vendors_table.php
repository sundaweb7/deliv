<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('order_vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('shipping_model_id')->nullable()->after('delivery_type');
            $table->unsignedBigInteger('shipping_rate_id')->nullable()->after('shipping_model_id');
        });
    }

    public function down()
    {
        Schema::table('order_vendors', function (Blueprint $table) {
            $table->dropColumn('shipping_model_id');
            $table->dropColumn('shipping_rate_id');
        });
    }
};