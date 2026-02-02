<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('whatsapp_logs')) return;
        Schema::create('whatsapp_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->nullable()->index();
            $table->string('target')->index();
            $table->text('message')->nullable();
            $table->string('provider')->nullable();
            $table->boolean('success')->default(false)->index();
            $table->integer('attempts')->default(0);
            $table->text('response')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('whatsapp_logs');
    }
};