<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('courier_routes', function (Blueprint $table) {
            $table->decimal('courier_fee', 10, 2)->nullable()->after('pickup_status');
            $table->boolean('courier_paid')->default(false)->after('courier_fee');
        });
    }

    public function down()
    {
        Schema::table('courier_routes', function (Blueprint $table) {
            $table->dropColumn(['courier_fee','courier_paid']);
        });
    }
};