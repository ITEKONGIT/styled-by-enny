@extends('layouts.app')

@section('title', 'My Dashboard - Styled by Enny')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-pink-50 to-purple-100 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Welcome Back, {{ $customer->name }}!</h1>
            <p class="text-xl text-gray-600">Manage your appointments and profile</p>
        </div>
    </div>
</section>

<!-- Dashboard Content -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-pink-50 rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-check text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $appointments->where('status', 'confirmed')->count() }}</h3>
                    <p class="text-gray-600">Upcoming Appointments</p>
                </div>

                <div class="bg-purple-50 rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-history text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $appointments->where('status', 'completed')->count() }}</h3>
                    <p class="text-gray-600">Completed Services</p>
                </div>

                <div class="bg-blue-50 rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">5.0</h3>
                    <p class="text-gray-600">Average Rating</p>
                </div>
            </div>

            <!-- Upcoming Appointments -->
            <div class="bg-white rounded-2xl shadow-soft p-8 mb-12">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Upcoming Appointments</h2>
                    <a href="{{ route('booking.index') }}" 
                       class="bg-pink-500 text-white px-6 py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium">
                        Book New Appointment
                    </a>
                </div>

                @if($appointments->where('status', 'confirmed')->count() > 0)
                <div class="space-y-6">
                    @foreach($appointments->where('status', 'confirmed')->take(3) as $appointment)
                    <div class="border border-gray-200 rounded-2xl p-6 hover:shadow-soft transition duration-300">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                            <div class="mb-4 lg:mb-0">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $appointment->service->name }}</h3>
                                <div class="flex items-center space-x-6 text-gray-600">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2 text-pink-500"></i>
                                        <span>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M j, Y') }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-clock mr-2 text-pink-500"></i>
                                        <span>{{ \Carbon\Carbon::parse($appointment->slot->start_time)->format('g:i A') }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-clock mr-2 text-pink-500"></i>
                                        <span>{{ $appointment->service->duration }} minutes</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                    Confirmed
                                </span>
                                <span class="text-2xl font-bold text-pink-500">
                                    ${{ number_format($appointment->service->price, 2) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($appointments->where('status', 'confirmed')->count() > 3)
                <div class="text-center mt-8">
                    <a href="{{ route('customer.appointments') }}" 
                       class="text-pink-500 hover:text-pink-600 font-medium">
                        View All Appointments <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                @endif

                @else
                <div class="text-center py-12">
                    <i class="fas fa-calendar-plus text-gray-400 text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-600 mb-2">No Upcoming Appointments</h4>
                    <p class="text-gray-500 mb-6">Book your first appointment to get started!</p>
                    <a href="{{ route('booking.index') }}" 
                       class="bg-pink-500 text-white px-8 py-4 rounded-lg hover:bg-pink-600 transition duration-300 font-medium">
                        Book Your First Appointment
                    </a>
                </div>
                @endif
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Profile Card -->
                <div class="bg-gradient-to-br from-pink-500 to-purple-600 rounded-2xl p-8 text-white">
                    <h3 class="text-2xl font-bold mb-4">Your Profile</h3>
                    <p class="mb-6 opacity-90">Update your personal information and preferences</p>
                    <a href="{{ route('customer.profile') }}" 
                       class="inline-flex items-center bg-white text-pink-500 px-6 py-3 rounded-lg hover:bg-gray-100 transition duration-300 font-medium">
                        Edit Profile
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Appointments Card -->
                <div class="bg-gradient-to-br from-purple-500 to-blue-600 rounded-2xl p-8 text-white">
                    <h3 class="text-2xl font-bold mb-4">Appointment History</h3>
                    <p class="mb-6 opacity-90">View your past and upcoming appointments</p>
                    <a href="{{ route('customer.appointments') }}" 
                       class="inline-flex items-center bg-white text-purple-500 px-6 py-3 rounded-lg hover:bg-gray-100 transition duration-300 font-medium">
                        View History
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Loyalty Program Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Loyalty Rewards</h2>
            <p class="text-gray-600 mb-8">Earn points with every appointment and redeem them for exclusive benefits</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-gift text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Earn Points</h3>
                    <p class="text-gray-600">Get 10 points for every dollar spent on services</p>
                </div>

                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-trophy text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Exclusive Rewards</h3>
                    <p class="text-gray-600">Redeem points for discounts and free services</p>
                </div>

                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-crown text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">VIP Treatment</h3>
                    <p class="text-gray-600">Priority booking and special offers for loyal customers</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection