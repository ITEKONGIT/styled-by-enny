<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AvailableSlot;
use Carbon\Carbon;

class AvailableSlotSeeder extends Seeder
{
    public function run()
    {
        $startDate = Carbon::today()->addDays(1); // Start from tomorrow
        
        for ($i = 0; $i < 14; $i++) { // Create slots for next 14 days
            $currentDate = $startDate->copy()->addDays($i);
            
            // Skip Sundays
            if ($currentDate->isSunday()) {
                continue;
            }
            
            // Create morning slots (9 AM - 12 PM)
            for ($hour = 9; $hour < 12; $hour++) {
                AvailableSlot::create([
                    'date' => $currentDate->format('Y-m-d'),
                    'start_time' => $currentDate->copy()->setTime($hour, 0)->format('H:i:s'),
                    'end_time' => $currentDate->copy()->setTime($hour + 1, 0)->format('H:i:s'),
                    'is_available' => true,
                ]);
            }
            
            // Create afternoon slots (1 PM - 5 PM)
            for ($hour = 13; $hour < 17; $hour++) {
                AvailableSlot::create([
                    'date' => $currentDate->format('Y-m-d'),
                    'start_time' => $currentDate->copy()->setTime($hour, 0)->format('H:i:s'),
                    'end_time' => $currentDate->copy()->setTime($hour + 1, 0)->format('H:i:s'),
                    'is_available' => true,
                ]);
            }
        }
    }
}