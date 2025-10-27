@extends('layouts.app')

@section('title', 'Our Services - Styled by Enny')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-pink-50 to-purple-100 py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Our Services</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Explore our complete range of professional hair services and find the perfect style for you.
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        @if($categories->count() > 0)
            <!-- Services by Category -->
            @foreach($categories as $category)
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">{{ $category->name }}</h2>
                @if($category->description)
                <p class="text-gray-600 text-center max-w-2xl mx-auto mb-12">{{ $category->description }}</p>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($category->services as $service)
                    <div class="bg-white rounded-2xl shadow-soft hover:shadow-hover transition duration-300 overflow-hidden group">
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
                            <a href="{{ route('booking.service') }}?service_id={{ $service->id }}" 
                               class="w-full bg-pink-500 text-white py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-center block">
                                Book This Service
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        @else
            <!-- All Services Grid (if no categories) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="bg-white rounded-2xl shadow-soft hover:shadow-hover transition duration-300 overflow-hidden group">
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
                        <a href="{{ route('booking.service') }}?service_id={{ $service->id }}" 
                           class="w-full bg-pink-500 text-white py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-center block">
                            Book This Service
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Booking CTA -->
<section class="py-20 bg-gradient-to-r from-pink-500 to-purple-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Book Your Service?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Choose your preferred service and time slot for a seamless booking experience.
        </p>
        <a href="{{ route('booking.index') }}" 
           class="bg-white text-pink-500 px-8 py-4 rounded-lg hover:bg-gray-100 transition duration-300 font-medium text-lg shadow-lg hover:shadow-xl">
            Start Booking Process
        </a>
    </div>
</section>
@endsection