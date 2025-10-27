<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('available_slots', function (Blueprint $table) {
            // Add missing columns
            if (!Schema::hasColumn('available_slots', 'date')) {
                $table->date('date')->after('id');
            }
            if (!Schema::hasColumn('available_slots', 'start_time')) {
                $table->time('start_time')->after('date');
            }
            if (!Schema::hasColumn('available_slots', 'end_time')) {
                $table->time('end_time')->after('start_time');
            }
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
            $table->dropColumn(['date', 'start_time', 'end_time', 'max_appointments', 'is_available']);
        });
    }
};