<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('salon_settings', function (Blueprint $table) {
            $table->boolean('send_confirmations')->default(true);
            $table->boolean('send_reminders')->default(true);
            $table->boolean('send_cancellations')->default(true);
            $table->boolean('send_payment_receipts')->default(true);
            $table->integer('reminder_hours_before')->default(24);
            $table->string('sender_email')->nullable();
            $table->string('sender_name')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('salon_settings', function (Blueprint $table) {
            $table->dropColumn([
                'send_confirmations',
                'send_reminders',
                'send_cancellations',
                'send_payment_receipts',
                'reminder_hours_before',
                'sender_email',
                'sender_name'
            ]);
        });
    }
};