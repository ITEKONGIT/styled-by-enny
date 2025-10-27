<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne; // Add this

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'notes'
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    // Add this relationship
    public function preference(): HasOne
    {
        return $this->hasOne(CustomerPreference::class);
    }
}