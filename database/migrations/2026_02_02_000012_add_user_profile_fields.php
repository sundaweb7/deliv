<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('users')) return;
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'wa_number')) $table->string('wa_number')->nullable()->after('phone');
            if (!Schema::hasColumn('users', 'address')) $table->text('address')->nullable()->after('wa_number');
            if (!Schema::hasColumn('users', 'profile_photo')) $table->string('profile_photo')->nullable()->after('address');
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('users')) return;
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'profile_photo')) $table->dropColumn('profile_photo');
            if (Schema::hasColumn('users', 'address')) $table->dropColumn('address');
            if (Schema::hasColumn('users', 'wa_number')) $table->dropColumn('wa_number');
        });
    }
};