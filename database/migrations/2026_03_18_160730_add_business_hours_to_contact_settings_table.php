<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->string('weekday_hours')->nullable()->default('9:00 AM - 6:00 PM')->after('socials_json');
            $table->string('weekend_hours')->nullable()->default('Closed')->after('weekday_hours');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->dropColumn(['weekday_hours', 'weekend_hours']);
        });
    }
};
