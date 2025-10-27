<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'subject',
        'content',
        'variables',
        'is_active',
        'trigger_event'
    ];

    protected $casts = [
        'variables' => 'array',
        'is_active' => 'boolean'
    ];

    // Available trigger events
    const TRIGGER_APPOINTMENT_BOOKED = 'appointment_booked';
    const TRIGGER_APPOINTMENT_CONFIRMED = 'appointment_confirmed';
    const TRIGGER_APPOINTMENT_CANCELLED = 'appointment_cancelled';
    const TRIGGER_PAYMENT_RECEIVED = 'payment_received';
    const TRIGGER_APPOINTMENT_REMINDER = 'appointment_reminder';

    public static function getTriggerEvents()
    {
        return [
            self::TRIGGER_APPOINTMENT_BOOKED => 'Appointment Booked',
            self::TRIGGER_APPOINTMENT_CONFIRMED => 'Appointment Confirmed',
            self::TRIGGER_APPOINTMENT_CANCELLED => 'Appointment Cancelled',
            self::TRIGGER_PAYMENT_RECEIVED => 'Payment Received',
            self::TRIGGER_APPOINTMENT_REMINDER => 'Appointment Reminder',
        ];
    }
}