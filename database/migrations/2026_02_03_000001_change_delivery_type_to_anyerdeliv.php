<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Add new string column and copy current values to it (map all to anyerdeliv)
        Schema::table('mitras', function (Blueprint $table) {
            if (!Schema::hasColumn('mitras', 'delivery_type_new')) {
                $table->string('delivery_type_new')->default('anyerdeliv');
            }
        });

        DB::table('mitras')->update(['delivery_type_new' => 'anyerdeliv']);

        Schema::table('mitras', function (Blueprint $table) {
            if (Schema::hasColumn('mitras', 'delivery_type')) {
                $table->dropColumn('delivery_type');
            }
        });

        Schema::table('mitras', function (Blueprint $table) {
            $table->renameColumn('delivery_type_new', 'delivery_type');
        });

        // Do the same for order_vendors table
        Schema::table('order_vendors', function (Blueprint $table) {
            if (!Schema::hasColumn('order_vendors', 'delivery_type_new')) {
                $table->string('delivery_type_new')->default('anyerdeliv');
            }
        });

        DB::table('order_vendors')->update(['delivery_type_new' => 'anyerdeliv']);

        Schema::table('order_vendors', function (Blueprint $table) {
            if (Schema::hasColumn('order_vendors', 'delivery_type')) {
                $table->dropColumn('delivery_type');
            }
        });

        Schema::table('order_vendors', function (Blueprint $table) {
            $table->renameColumn('delivery_type_new', 'delivery_type');
        });
    }

    public function down(): void
    {
        // Revert by recreating enum-like column (as string with previous default)
        Schema::table('mitras', function (Blueprint $table) {
            if (!Schema::hasColumn('mitras', 'delivery_type_old')) {
                $table->string('delivery_type_old')->default('anyerdeliv');
            }
        });
        DB::table('mitras')->update(['delivery_type_old' => DB::raw("COALESCE(delivery_type, 'anyerdeliv')")]);
        Schema::table('mitras', function (Blueprint $table) {
            if (Schema::hasColumn('mitras', 'delivery_type')) {
                $table->dropColumn('delivery_type');
            }
        });
        Schema::table('mitras', function (Blueprint $table) {
            $table->renameColumn('delivery_type_old', 'delivery_type');
        });

        Schema::table('order_vendors', function (Blueprint $table) {
            if (!Schema::hasColumn('order_vendors', 'delivery_type_old')) {
                $table->string('delivery_type_old')->default('anyerdeliv');
            }
        });
        DB::table('order_vendors')->update(['delivery_type_old' => DB::raw("COALESCE(delivery_type, 'anyerdeliv')")]);
        Schema::table('order_vendors', function (Blueprint $table) {
            if (Schema::hasColumn('order_vendors', 'delivery_type')) {
                $table->dropColumn('delivery_type');
            }
        });
        Schema::table('order_vendors', function (Blueprint $table) {
            $table->renameColumn('delivery_type_old', 'delivery_type');
        });
    }
};