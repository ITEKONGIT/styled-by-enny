<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'is_available',
        'max_appointments'
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_available' => 'boolean',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'slot_id');
    }

    public function getBookedCountAttribute()
    {
        return $this->appointments()->count();
    }

    public function getAvailableSpotsAttribute()
    {
        return $this->max_appointments - $this->booked_count;
    }
}