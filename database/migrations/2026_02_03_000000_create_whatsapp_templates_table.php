<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('whatsapp_templates', function (Blueprint $table) {
            $table->id();
            $table->string('key'); // e.g., 'customer' or 'mitra'
            $table->string('locale')->default('id');
            $table->text('body');
            $table->timestamps();
            $table->unique(['key','locale']);
        });

        // seed sensible defaults using existing lang files
        $now = \Carbon\Carbon::now();
        $data = [
            ['key' => 'customer', 'locale' => 'id', 'body' => trans('whatsapp.customer_message', [], 'id'), 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'mitra', 'locale' => 'id', 'body' => trans('whatsapp.mitra_message', [], 'id'), 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'customer', 'locale' => 'en', 'body' => trans('whatsapp.customer_message', [], 'en'), 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'mitra', 'locale' => 'en', 'body' => trans('whatsapp.mitra_message', [], 'en'), 'created_at' => $now, 'updated_at' => $now],
        ];
        \Illuminate\Support\Facades\DB::table('whatsapp_templates')->insert($data);
    }

    public function down()
    {
        Schema::dropIfExists('whatsapp_templates');
    }
};
