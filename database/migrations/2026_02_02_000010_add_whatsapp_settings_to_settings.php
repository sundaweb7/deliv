<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('settings')) return;

        Schema::table('settings', function (Blueprint $table) {
            if (!Schema::hasColumn('settings', 'wa_provider')) {
                $table->string('wa_provider')->nullable()->after('fcm_server_key');
            }
            if (!Schema::hasColumn('settings', 'wa_api_key')) {
                $table->text('wa_api_key')->nullable()->after('wa_provider');
            }
            if (!Schema::hasColumn('settings', 'wa_device_id')) {
                $table->string('wa_device_id')->nullable()->after('wa_api_key');
            }
            if (!Schema::hasColumn('settings', 'wa_api_url')) {
                $table->string('wa_api_url')->nullable()->after('wa_device_id');
            }
            if (!Schema::hasColumn('settings', 'wa_enabled')) {
                $table->boolean('wa_enabled')->default(true)->after('wa_api_url');
            }
            if (!Schema::hasColumn('settings', 'wa_send_to_mitra')) {
                $table->boolean('wa_send_to_mitra')->default(true)->after('wa_enabled');
            }
            if (!Schema::hasColumn('settings', 'wa_send_to_customer')) {
                $table->boolean('wa_send_to_customer')->default(true)->after('wa_send_to_mitra');
            }
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('settings')) return;

        Schema::table('settings', function (Blueprint $table) {
            if (Schema::hasColumn('settings', 'wa_send_to_customer')) $table->dropColumn('wa_send_to_customer');
            if (Schema::hasColumn('settings', 'wa_send_to_mitra')) $table->dropColumn('wa_send_to_mitra');
            if (Schema::hasColumn('settings', 'wa_enabled')) $table->dropColumn('wa_enabled');
            if (Schema::hasColumn('settings', 'wa_api_url')) $table->dropColumn('wa_api_url');
            if (Schema::hasColumn('settings', 'wa_device_id')) $table->dropColumn('wa_device_id');
            if (Schema::hasColumn('settings', 'wa_api_key')) $table->dropColumn('wa_api_key');
            if (Schema::hasColumn('settings', 'wa_provider')) $table->dropColumn('wa_provider');
        });
    }
};