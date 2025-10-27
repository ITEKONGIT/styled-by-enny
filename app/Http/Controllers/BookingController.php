<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\AvailableSlot;
use App\Models\Appointment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->get();
        return view('booking.index', compact('services'));
    }

    public function selectService()
    {
        $services = Service::where('is_active', true)->get();
        return view('booking.service', compact('services'));
    }

    public function selectDateTime(Request $request)
    {
        $service = Service::findOrFail($request->service_id);
        $availableSlots = AvailableSlot::where('is_available', true)
            ->where('date', '>=', today())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('booking.date-time', compact('service', 'availableSlots'));
    }

    public function confirmation(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'slot_id' => 'required|exists:available_slots,id',
        ]);

        $service = Service::findOrFail($request->service_id);
        $slot = AvailableSlot::findOrFail($request->slot_id);

        return view('booking.confirmation', compact('service', 'slot'));
    }

    public function store(Request $request)
    {
        // This will be implemented later with full booking logic
        return redirect()->route('booking.success', ['appointment' => 1]); // Temporary
    }

    public function success(Appointment $appointment)
    {
        return view('booking.success', compact('appointment'));
    }
}