<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mitras', function (Blueprint $table) {
            if (!Schema::hasColumn('mitras', 'address')) {
                $table->text('address')->nullable();
            }
            if (!Schema::hasColumn('mitras', 'store_photo')) {
                $table->string('store_photo')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('mitras', function (Blueprint $table) {
            if (Schema::hasColumn('mitras', 'store_photo')) $table->dropColumn('store_photo');
            if (Schema::hasColumn('mitras', 'address')) $table->dropColumn('address');
        });
    }
};