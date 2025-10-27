<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('available_slots', function (Blueprint $table) {
            // If you need to add missing columns
            if (!Schema::hasColumn('available_slots', 'max_appointments')) {
                $table->integer('max_appointments')->default(1)->after('end_time');
            }
            if (!Schema::hasColumn('available_slots', 'is_available')) {
                $table->boolean('is_available')->default(true)->after('max_appointments');
            }
        });
    }

    public function down(): void
    {
        Schema::table('available_slots', function (Blueprint $table) {
            $table->dropColumn(['max_appointments', 'is_available']);
        });
    }
};