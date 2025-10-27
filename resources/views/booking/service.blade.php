@extends('layouts.app')

@section('title', 'Select Service - Styled by Enny')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-pink-50 to-purple-100 py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Select Your Service</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Choose from our premium hair services to get started.
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
                <div class="flex-1 h-1 bg-gray-300 mx-4"></div>
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

        <!-- Services Grid -->
        <div class="max-w-6xl mx-auto">
            @if(request('service_id'))
            <div class="mb-8 p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-info-circle text-green-500 mr-3"></i>
                    <p class="text-green-800">Service selected! Now choose your preferred date and time.</p>
                </div>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="bg-white rounded-2xl shadow-soft hover:shadow-hover transition duration-300 overflow-hidden group border-2 {{ request('service_id') == $service->id ? 'border-pink-500' : 'border-transparent hover:border-pink-300' }}">
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
                        
                        @if(request('service_id') == $service->id)
                        <div class="flex space-x-3">
                            <a href="{{ route('booking.date-time') }}?service_id={{ $service->id }}" 
                               class="flex-1 bg-pink-500 text-white py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-center">
                                Continue with This Service
                            </a>
                        </div>
                        @else
                        <a href="{{ route('booking.date-time') }}?service_id={{ $service->id }}" 
                           class="w-full bg-pink-500 text-white py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-center block">
                            Select Service
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            @if(request('service_id'))
            <div class="text-center mt-12">
                <a href="{{ route('booking.date-time') }}?service_id={{ request('service_id') }}" 
                   class="bg-pink-500 text-white px-8 py-4 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-lg">
                    Proceed to Date & Time Selection <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection