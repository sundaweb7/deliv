<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mitra_shippings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mitra_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('mitra_id')->references('id')->on('mitras')->onDelete('cascade');
        });

        Schema::create('mitra_shipping_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mitra_shipping_id');
            $table->string('destination'); // e.g., desa name or code
            $table->integer('cost')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('mitra_shipping_id')->references('id')->on('mitra_shippings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mitra_shipping_rates');
        Schema::dropIfExists('mitra_shippings');
    }
};