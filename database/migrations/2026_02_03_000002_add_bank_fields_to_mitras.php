<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mitras', function (Blueprint $table) {
            $table->unsignedBigInteger('bank_id')->nullable()->after('business_name');
            $table->string('bank_account_name')->nullable()->after('bank_id');
            $table->string('bank_account_number')->nullable()->after('bank_account_name');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('mitras', function (Blueprint $table) {
            $table->dropForeign(['bank_id']);
            $table->dropColumn(['bank_id','bank_account_name','bank_account_number']);
        });
    }
};