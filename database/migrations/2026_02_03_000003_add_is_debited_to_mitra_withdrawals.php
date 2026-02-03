<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mitra_withdrawals', function (Blueprint $table) {
            $table->boolean('is_debited')->default(false)->after('processed_at');
        });
    }

    public function down()
    {
        Schema::table('mitra_withdrawals', function (Blueprint $table) {
            $table->dropColumn('is_debited');
        });
    }
};