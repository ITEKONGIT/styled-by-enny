@extends('layouts.app')

@section('title', 'Styled by Enny - Premium Hair Salon')

@section('content')
<!-- Hero Section -->
<section id="home" class="bg-gradient-to-br from-pink-50 to-purple-100 py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6 animate-fade-in">
                Transform Your Hair, <span class="text-pink-500">Elevate Your Style</span>
            </h1>
            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                Experience premium hair care with our expert stylists. From classic braids to vibrant styles, 
                we bring your vision to life using organic products.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#services" class="bg-pink-500 text-white px-8 py-4 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-lg shadow-lg hover:shadow-xl">
                    Our Services
                </a>
                <a href="{{ route('booking.index') }}" class="border-2 border-pink-500 text-pink-500 px-8 py-4 rounded-lg hover:bg-pink-500 hover:text-white transition duration-300 font-medium text-lg">
                    Book Now
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview Section -->
<section id="services" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Services</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Discover our range of professional hair services designed to enhance your natural beauty
            </p>
        </div>

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
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $service->description }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-pink-500">${{ number_format($service->price, 2) }}</span>
                        <span class="text-gray-500">{{ $service->duration }} minutes</span>
                    </div>
                    <a href="{{ route('booking.service') }}?service_id={{ $service->id }}" 
                       class="mt-4 w-full bg-pink-500 text-white py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-center block">
                        Book Now
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="text-pink-500 hover:text-pink-600 font-medium text-lg">
                View All Services <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section id="about" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Why Choose Styled by Enny</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Experience the difference with our premium hair care services
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-gem text-pink-500 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Premium Quality</h3>
                <p class="text-gray-600">We use only the highest quality organic products for healthy, beautiful hair.</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-pink-500 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Flexible Scheduling</h3>
                <p class="text-gray-600">Book appointments that fit your schedule with our easy online booking system.</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-pink-500 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Expert Stylists</h3>
                <p class="text-gray-600">Our experienced stylists are dedicated to bringing your hair vision to life.</p>
            </div>
        </div>
    </div>
</section>

<!-- Booking CTA Section -->
<section class="py-20 bg-gradient-to-r from-pink-500 to-purple-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Transform Your Look?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your appointment today and experience premium hair styling with Styled by Enny.
        </p>
        <a href="{{ route('booking.index') }}" 
           class="bg-white text-pink-500 px-8 py-4 rounded-lg hover:bg-gray-100 transition duration-300 font-medium text-lg shadow-lg hover:shadow-xl">
            Book Your Appointment
        </a>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Get In Touch</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                We'd love to hear from you. Visit our salon or reach out to schedule your appointment.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
            <!-- Contact Info -->
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Visit Our Salon</h3>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <i class="fas fa-map-marker-alt text-pink-500 mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800">Address</h4>
                            <p class="text-gray-600">21 Sunday Farm Estate, Dopemu, Lagos, 102212, Nigeria</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <i class="fas fa-envelope text-pink-500"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800">Email</h4>
                            <p class="text-gray-600">info@styledbyenny.com</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <i class="fas fa-clock text-pink-500"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800">Working Hours</h4>
                            <p class="text-gray-600">Mon-Fri: 10AM-7PM, Sat: 10AM-5PM, Sun: Closed</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <h4 class="font-semibold text-gray-800 mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/styled.by.enny" class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center hover:bg-pink-500 transition duration-300">
                            <i class="fab fa-instagram text-gray-600 hover:text-white"></i>
                        </a>
                        <a href="https://www.tiktok.com/@styledbyenny6" class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center hover:bg-pink-500 transition duration-300">
                            <i class="fab fa-tiktok text-gray-600 hover:text-white"></i>
                        </a>
                        <a href="https://www.facebook.com/assy_enny" class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center hover:bg-pink-500 transition duration-300">
                            <i class="fab fa-facebook-f text-gray-600 hover:text-white"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Map Placeholder -->
            <div class="bg-gray-200 rounded-2xl flex items-center justify-center h-64 lg:h-auto">
                <div class="text-center text-gray-500">
                    <i class="fas fa-map text-4xl mb-4"></i>
                    <p>Map Location</p>
                    <p class="text-sm mt-2">21 Sunday Farm Estate, Dopemu, Lagos</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection