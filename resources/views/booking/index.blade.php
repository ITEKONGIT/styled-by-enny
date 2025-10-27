@extends('layouts.app')

@section('title', 'Book Appointment - Styled by Enny')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-pink-50 to-purple-100 py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Book Your Appointment</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Easy online booking with real-time availability and instant confirmations.
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
                    <div class="w-12 h-12 bg-pink-500 text-white rounded-full flex items-center justify-center mx-auto mb-2 font-semibold">1</div>
                    <p class="text-sm font-medium text-pink-500">Choose Service</p>
                </div>
                <div class="flex-1 h-1 bg-gray-300 mx-4"></div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto mb-2 font-semibold">2</div>
                    <p class="text-sm font-medium text-gray-500">Select Date & Time</p>
                </div>
                <div class="flex-1 h-1 bg-gray-300 mx-4"></div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto mb-2 font-semibold">3</div>
                    <p class="text-sm font-medium text-gray-500">Confirm Booking</p>
                </div>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Select Your Service</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="bg-white rounded-2xl shadow-soft hover:shadow-hover transition duration-300 overflow-hidden group border-2 border-transparent hover:border-pink-300">
                    @if($service->featured_image)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $service->featured_image) }}" 
                             alt="{{ $service->name }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    @else
                    <div class="h-48 bg-gradient-to-br from-pink-400 to-purple-500 flex items-center justify-center">
                        <i class="fas fa-cut text-white text-4xl"></i>
                    </div>
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $service->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-pink-500">${{ number_format($service->price, 2) }}</span>
                            <span class="text-gray-500">{{ $service->duration }} minutes</span>
                        </div>
                        <a href="{{ route('booking.date-time') }}?service_id={{ $service->id }}" 
                           class="w-full bg-pink-500 text-white py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-center block">
                            Select & Continue
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Booking Benefits -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Why Book With Us</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-check text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Real-time Availability</h3>
                    <p class="text-gray-600">See available time slots and book instantly without waiting.</p>
                </div>

                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bell text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Automatic Reminders</h3>
                    <p class="text-gray-600">Get email and SMS reminders so you never forget your appointment.</p>
                </div>

                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Secure Booking</h3>
                    <p class="text-gray-600">Your information is safe with our secure booking system.</p>
                </div>

                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Flexible Scheduling</h3>
                    <p class="text-gray-600">Book appointments that work with your busy schedule.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection