<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Only add column if settings table already exists
        if (Schema::hasTable('settings')) {
            Schema::table('settings', function (Blueprint $table) {
                if (!Schema::hasColumn('settings', 'fcm_server_key')) {
                    $table->text('fcm_server_key')->nullable()->after('admin_delivery_cut');
                }
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('settings')) return;
        Schema::table('settings', function (Blueprint $table) {
            if (Schema::hasColumn('settings', 'fcm_server_key')) {
                $table->dropColumn('fcm_server_key');
            }
        });
    }
};