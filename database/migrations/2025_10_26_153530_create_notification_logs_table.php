<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notification_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notification_template_id')->nullable()->constrained()->onDelete('set null');
            $table->string('type'); // email, sms
            $table->string('recipient');
            $table->string('subject')->nullable();
            $table->text('content');
            $table->string('status'); // sent, failed, pending
            $table->text('error_message')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->morphs('notifiable'); // Polymorphic relationship to appointment, payment, etc.
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_logs');
    }
};