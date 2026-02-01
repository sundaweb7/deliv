<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mitras', function (Blueprint $table) {
            $table->string('business_name')->nullable()->after('user_id');
            $table->string('wa_number')->nullable()->after('business_name');
            $table->string('address_desa')->nullable()->after('wa_number');
            $table->string('address_kecamatan')->nullable()->after('address_desa');
            $table->string('address_regency')->nullable()->after('address_kecamatan');
            $table->string('address_province')->nullable()->after('address_regency');
            $table->string('profile_photo')->nullable()->after('address_province');
        });
    }

    public function down(): void
    {
        Schema::table('mitras', function (Blueprint $table) {
            $table->dropColumn(['business_name','wa_number','address_desa','address_kecamatan','address_regency','address_province','profile_photo']);
        });
    }
};