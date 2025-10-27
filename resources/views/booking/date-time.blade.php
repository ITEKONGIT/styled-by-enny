@extends('layouts.app')

@section('title', 'Select Date & Time - Styled by Enny')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-pink-50 to-purple-100 py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Select Date & Time</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Choose your preferred appointment slot for {{ $service->name }}
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
                    <div class="w-12 h-12 bg-pink-500 text-white rounded-full flex items-center justify-center mx-auto mb-2 font-semibold">2</div>
                    <p class="text-sm font-medium text-pink-500">Select Date & Time</p>
                </div>
                <div class="flex-1 h-1 bg-gray-300 mx-4"></div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto mb-2 font-semibold">3</div>
                    <p class="text-sm font-medium text-gray-500">Confirm Booking</p>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto">
            <!-- Selected Service Summary -->
            <div class="bg-gray-50 rounded-2xl p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Selected Service</h3>
                        <p class="text-gray-600">{{ $service->name }} - ${{ number_format($service->price, 2) }} ({{ $service->duration }} minutes)</p>
                    </div>
                    <a href="{{ route('booking.service') }}" class="mt-4 md:mt-0 text-pink-500 hover:text-pink-600 font-medium">
                        Change Service
                    </a>
                </div>
            </div>

            <!-- Calendar & Time Slots -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Available Slots -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Available Time Slots</h3>
                    
                    @if($availableSlots->count() > 0)
                    <div class="space-y-4 max-h-96 overflow-y-auto">
                        @foreach($availableSlots->groupBy('date') as $date => $slots)
                        <div class="border border-gray-200 rounded-lg">
                            <div class="bg-pink-50 px-4 py-3 border-b border-gray-200">
                                <h4 class="font-semibold text-gray-800">
                                    {{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}
                                </h4>
                            </div>
                            <div class="p-4 grid grid-cols-2 gap-3">
                                @foreach($slots as $slot)
                                <form method="POST" action="{{ route('booking.confirmation') }}">
                                    @csrf
                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                    <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                    <button type="submit" 
                                            class="w-full text-center py-3 border border-pink-500 text-pink-500 rounded-lg hover:bg-pink-500 hover:text-white transition duration-300 font-medium">
                                        {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                                    </button>
                                </form>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-12 bg-gray-50 rounded-2xl">
                        <i class="fas fa-calendar-times text-gray-400 text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold text-gray-600 mb-2">No Available Slots</h4>
                        <p class="text-gray-500">Please check back later for available time slots.</p>
                    </div>
                    @endif
                </div>

                <!-- Service Details -->
                <div>
                    <div class="bg-white rounded-2xl shadow-soft p-6 sticky top-4">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Service Details</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">{{ $service->name }}</h4>
                                <p class="text-gray-600">{{ $service->description }}</p>
                            </div>
                            
                            <div class="flex justify-between items-center py-3 border-t border-gray-200">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-semibold text-gray-800">{{ $service->duration }} minutes</span>
                            </div>
                            
                            <div class="flex justify-between items-center py-3 border-t border-gray-200">
                                <span class="text-gray-600">Price</span>
                                <span class="text-2xl font-bold text-pink-500">${{ number_format($service->price, 2) }}</span>
                            </div>
                            
                            <div class="pt-4 border-t border-gray-200">
                                <h4 class="font-semibold text-gray-800 mb-3">What's Included</h4>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        Professional styling
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        Quality hair products
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        Consultation included
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection