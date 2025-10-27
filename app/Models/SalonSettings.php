<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'working_hours',
        'cancellation_policy',
        'cancellation_hours',
        'booking_rules',
        'email_notifications',
        'sms_notifications',
        // Add these new fields
        'send_confirmations',
        'send_reminders',
        'send_cancellations',
        'send_payment_receipts',
        'reminder_hours_before',
        'sender_email',
        'sender_name'
    ];

    protected $casts = [
        'working_hours' => 'array',
        'email_notifications' => 'boolean',
        'sms_notifications' => 'boolean',
        // Add these new casts
        'send_confirmations' => 'boolean',
        'send_reminders' => 'boolean',
        'send_cancellations' => 'boolean',
        'send_payment_receipts' => 'boolean'
    ];
}