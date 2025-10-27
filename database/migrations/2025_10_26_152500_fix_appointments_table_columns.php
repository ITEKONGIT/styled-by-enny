<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // Add service_id if missing
            if (!Schema::hasColumn('appointments', 'service_id')) {
                $table->foreignId('service_id')->nullable()->constrained()->onDelete('cascade');
            }
            
            // Add slot_id if missing (might be there from previous migration)
            if (!Schema::hasColumn('appointments', 'slot_id')) {
                $table->foreignId('slot_id')->nullable()->constrained('available_slots')->onDelete('cascade');
            }
            
            // Add customer_id if missing
            if (!Schema::hasColumn('appointments', 'customer_id')) {
                $table->foreignId('customer_id')->nullable()->constrained()->onDelete('cascade');
            }
            
            // Add status if missing
            if (!Schema::hasColumn('appointments', 'status')) {
                $table->string('status')->default('pending');
            }
            
            // Add notes if missing
            if (!Schema::hasColumn('appointments', 'notes')) {
                $table->text('notes')->nullable();
            }
            
            // Add appointment_date if missing
            if (!Schema::hasColumn('appointments', 'appointment_date')) {
                $table->date('appointment_date');
            }
            
            // Add appointment_time if missing
            if (!Schema::hasColumn('appointments', 'appointment_time')) {
                $table->time('appointment_time');
            }
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropForeign(['slot_id']);
            $table->dropForeign(['customer_id']);
            $table->dropColumn(['service_id', 'slot_id', 'customer_id', 'status', 'notes', 'appointment_date', 'appointment_time']);
        });
    }
};