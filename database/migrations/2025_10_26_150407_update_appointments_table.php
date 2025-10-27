<?php
// database/migrations/2025_10_26_150407_update_appointments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // Add customer relationship
            if (!Schema::hasColumn('appointments', 'customer_id')) {
                $table->foreignId('customer_id')->nullable()->constrained()->onDelete('cascade');
            }
            
            // Add status field
            if (!Schema::hasColumn('appointments', 'status')) {
                $table->string('status')->default('pending'); // pending, confirmed, completed, cancelled, no-show
            }
            
            // Add notes field
            if (!Schema::hasColumn('appointments', 'notes')) {
                $table->text('notes')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropColumn(['customer_id', 'status', 'notes']);
        });
    }
};