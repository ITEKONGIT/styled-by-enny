<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class NotificationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_template_id',
        'type',
        'recipient',
        'subject',
        'content',
        'status',
        'error_message',
        'sent_at',
        'notifiable_type',
        'notifiable_id'
    ];

    protected $casts = [
        'sent_at' => 'datetime'
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(NotificationTemplate::class, 'notification_template_id');
    }

    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }
}