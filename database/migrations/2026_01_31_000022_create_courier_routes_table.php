<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courier_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_courier_id')->constrained('mitra_couriers')->cascadeOnDelete();
            $table->foreignId('order_vendor_id')->constrained()->cascadeOnDelete();
            $table->integer('pickup_sequence')->default(0);
            $table->enum('pickup_status', ['queued', 'pending', 'accepted', 'on_delivery', 'delivered'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courier_routes');
    }
};