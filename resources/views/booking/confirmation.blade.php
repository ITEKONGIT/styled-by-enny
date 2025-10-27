@extends('layouts.app')

@section('title', 'Confirm Booking - Styled by Enny')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-pink-50 to-purple-100 py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Confirm Your Booking</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Review your appointment details before confirming.
        </p>
    </div>
</section>

<!-- Booking Steps -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <!-- Steps Indicator -->
        <div class="max-w-4xl mx-auto mb-16">
            <div class="flex justify-between items-center">
                <div class="text-center">
                    <div class="w-12 h-12 bg-green-500 text-white rounded-full flex items-center justify-center mx-auto mb-2 font-semibold">
                        <i class="fas fa-check"></i>
                    </div>
                    <p class="text-sm font-medium text-green-500">Choose Service</p>
                </div>
                <div class="flex-1 h-1 bg-green-500 mx-4"></div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-green-500 text-white rounded-full flex items-center justify-center mx-auto mb-2 font-semibold">
                        <i class="fas fa-check"></i>
                    </div>
                    <p class="text-sm font-medium text-green-500">Select Date & Time</p>
                </div>
                <div class="flex-1 h-1 bg-pink-500 mx-4"></div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-pink-500 text-white rounded-full flex items-center justify-center mx-auto mb-2 font-semibold">3</div>
                    <p class="text-sm font-medium text-pink-500">Confirm Booking</p>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-soft p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Appointment Summary</h2>

                <!-- Appointment Details -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- Service Details -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Service Details</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Service</span>
                                <span class="font-semibold text-gray-800">{{ $service->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-semibold text-gray-800">{{ $service->duration }} minutes</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Price</span>
                                <span class="text-xl font-bold text-pink-500">${{ number_format($service->price, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Appointment Time -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Appointment Time</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Date</span>
                                <span class="font-semibold text-gray-800">
                                    {{ \Carbon\Carbon::parse($slot->date)->format('l, F j, Y') }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Time</span>
                                <span class="font-semibold text-gray-800">
                                    {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Location</span>
                                <span class="font-semibold text-gray-800 text-right">
                                    21 Sunday Farm Estate<br>Dopemu, Lagos
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total & Action -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="flex justify-between items-center mb-8">
                        <span class="text-2xl font-bold text-gray-800">Total Amount</span>
                        <span class="text-3xl font-bold text-pink-500">${{ number_format($service->price, 2) }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('booking.date-time') }}?service_id={{ $service->id }}" 
                           class="flex-1 border-2 border-gray-300 text-gray-700 py-4 rounded-lg hover:border-gray-400 transition duration-300 font-medium text-center">
                            Back to Time Selection
                        </a>
                        
                        @auth
                        <form method="POST" action="{{ route('booking.store') }}" class="flex-1">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                            <button type="submit" 
                                    class="w-full bg-pink-500 text-white py-4 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-lg">
                                Confirm Booking
                            </button>
                        </form>
                        @else
                        <div class="flex-1">
                            <a href="{{ route('login') }}?redirect=booking" 
                               class="w-full bg-pink-500 text-white py-4 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-lg text-center block">
                                Login to Confirm Booking
                            </a>
                            <p class="text-sm text-gray-600 mt-2 text-center">
                                Don't have an account? 
                                <a href="{{ route('register') }}" class="text-pink-500 hover:text-pink-600 font-medium">
                                    Register here
                                </a>
                            </p>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Important Information -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-2xl p-6">
                <h3 class="text-lg font-semibold text-blue-800 mb-3 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    Important Information
                </h3>
                <ul class="text-blue-700 space-y-2">
                    <li class="flex items-start">
                        <i class="fas fa-clock mr-2 mt-1"></i>
                        Please arrive 10-15 minutes before your appointment time
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-ban mr-2 mt-1"></i>
                        Cancellations must be made at least 24 hours in advance
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-phone mr-2 mt-1"></i>
                        Contact us at +234 XXX XXX XXXX for any changes
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection