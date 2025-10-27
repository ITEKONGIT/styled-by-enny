@extends('layouts.app')

@section('title', 'Booking Confirmed - Styled by Enny')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-green-50 to-pink-50 py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Success Icon -->
            <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-8">
                <i class="fas fa-check text-white text-4xl"></i>
            </div>

            <!-- Success Message -->
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Booking Confirmed!</h1>
            <p class="text-xl text-gray-600 mb-8">
                Thank you for booking with Styled by Enny. Your appointment has been successfully scheduled.
            </p>

            <!-- Appointment Details -->
            <div class="bg-white rounded-2xl shadow-soft p-8 mb-8 text-left">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Appointment Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <h3 class="font-semibold text-gray-600 mb-1">Appointment ID</h3>
                            <p class="text-lg font-semibold text-gray-800">#{{ $appointment->id ?? '0001' }}</p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-600 mb-1">Service</h3>
                            <p class="text-lg text-gray-800">{{ $appointment->service->name ?? 'Hair Styling' }}</p>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div>
                            <h3 class="font-semibold text-gray-600 mb-1">Date & Time</h3>
                            <p class="text-lg text-gray-800">
                                {{ \Carbon\Carbon::parse($appointment->appointment_date ?? now())->format('l, F j, Y') }}<br>
                                {{ \Carbon\Carbon::parse($appointment->slot->start_time ?? now())->format('g:i A') }}
                            </p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-600 mb-1">Total Amount</h3>
                            <p class="text-xl font-bold text-pink-500">${{ number_format($appointment->service->price ?? 0, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('customer.dashboard') }}" 
                   class="bg-pink-500 text-white px-8 py-4 rounded-lg hover:bg-pink-600 transition duration-300 font-medium">
                    View My Appointments
                </a>
                <a href="{{ route('home') }}" 
                   class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-lg hover:border-gray-400 transition duration-300 font-medium">
                    Back to Home
                </a>
            </div>

            <!-- Next Steps -->
            <div class="mt-12 bg-blue-50 border border-blue-200 rounded-2xl p-6 text-left">
                <h3 class="text-lg font-semibold text-blue-800 mb-4 flex items-center">
                    <i class="fas fa-bell mr-2"></i>
                    What's Next?
                </h3>
                <ul class="text-blue-700 space-y-2">
                    <li class="flex items-start">
                        <i class="fas fa-envelope mr-2 mt-1"></i>
                        You'll receive a confirmation email shortly
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-sms mr-2 mt-1"></i>
                        Reminder notifications 24 hours before your appointment
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mr-2 mt-1"></i>
                        Location: 21 Sunday Farm Estate, Dopemu, Lagos
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection