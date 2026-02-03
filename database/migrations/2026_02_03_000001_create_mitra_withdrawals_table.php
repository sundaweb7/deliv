<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mitra_withdrawals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mitra_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount', 15, 2);
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->text('note')->nullable();
            $table->unsignedBigInteger('processed_by')->nullable(); // admin user id
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();

            $table->foreign('mitra_id')->references('id')->on('mitras')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mitra_withdrawals');
    }
};