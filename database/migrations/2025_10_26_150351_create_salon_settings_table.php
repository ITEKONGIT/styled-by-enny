<?php
// database/migrations/2025_10_26_150351_create_salon_settings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salon_settings', function (Blueprint $table) {
            $table->id();
            $table->json('working_hours')->nullable(); // Store as JSON for flexibility
            $table->text('cancellation_policy')->nullable();
            $table->integer('cancellation_hours')->default(24); // Hours before appointment
            $table->text('booking_rules')->nullable();
            $table->boolean('email_notifications')->default(true);
            $table->boolean('sms_notifications')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salon_settings');
    }
};