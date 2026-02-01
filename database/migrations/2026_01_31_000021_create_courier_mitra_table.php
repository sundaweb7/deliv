<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courier_mitra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_id')->constrained()->cascadeOnDelete();
            $table->foreignId('mitra_courier_id')->constrained('mitra_couriers')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['mitra_id','mitra_courier_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('courier_mitra');
    }
};