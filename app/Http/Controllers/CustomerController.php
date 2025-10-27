<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $customer = Customer::where('email', auth()->user()->email)->firstOrFail();
        $appointments = Appointment::with(['service', 'slot'])
            ->where('customer_id', $customer->id)
            ->orderBy('appointment_date', 'desc')
            ->get();

        return view('customer.dashboard', compact('customer', 'appointments'));
    }

    public function appointments()
    {
        $customer = Customer::where('email', auth()->user()->email)->firstOrFail();
        $appointments = Appointment::with(['service', 'slot', 'payment'])
            ->where('customer_id', $customer->id)
            ->orderBy('appointment_date', 'desc')
            ->get();

        return view('customer.appointments', compact('customer', 'appointments'));
    }

    public function profile()
    {
        $customer = Customer::where('email', auth()->user()->email)->firstOrFail();
        return view('customer.profile', compact('customer'));
    }
}