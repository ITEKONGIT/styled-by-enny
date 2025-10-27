<?php

namespace App\Http\Controllers;

use App\Models\AvailableSlot;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $availableSlots = AvailableSlot::where('is_available', true)
            ->where('date', '>=', today())
            ->whereHas('appointments', function($query) {
                $query->havingRaw('count(*) < available_slots.max_appointments');
            }, '<')
            ->orWhereDoesntHave('appointments')
            ->withCount('appointments')
            ->orderBy('date')
            ->orderBy('start_time')
            ->get()
            ->groupBy('date');

        $services = Service::where('is_active', true)->get();

        return view('dashboard', compact('availableSlots', 'services'));
    }

    public function getSlotsForDate($date)
    {
        $slots = AvailableSlot::where('is_available', true)
            ->where('date', $date)
            ->withCount('appointments')
            ->get()
            ->filter(function($slot) {
                return $slot->appointments_count < $slot->max_appointments;
            })
            ->map(function($slot) {
                return [
                    'id' => $slot->id,
                    'start_time' => $slot->start_time->format('g:i A'),
                    'end_time' => $slot->end_time->format('g:i A'),
                    'available_spots' => $slot->max_appointments - $slot->appointments_count
                ];
            });

        return response()->json($slots);
    }
}