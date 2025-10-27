@extends('layouts.app')

@section('title', 'My Profile - Styled by Enny')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-pink-50 to-purple-100 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">My Profile</h1>
            <p class="text-xl text-gray-600">Manage your personal information and preferences</p>
        </div>
    </div>
</section>

<!-- Profile Content -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-2xl p-6 sticky top-4">
                        <div class="text-center mb-6">
                            <div class="w-24 h-24 bg-gradient-to-br from-pink-400 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-user text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $customer->name }}</h3>
                            <p class="text-gray-600">{{ $customer->email }}</p>
                        </div>
                        
                        <nav class="space-y-2">
                            <a href="#personal-info" 
                               class="flex items-center space-x-3 p-3 rounded-lg bg-white text-pink-500 font-medium shadow-soft">
                                <i class="fas fa-user-circle"></i>
                                <span>Personal Info</span>
                            </a>
                            <a href="#preferences" 
                               class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-white hover:text-pink-500 transition duration-300">
                                <i class="fas fa-cog"></i>
                                <span>Preferences</span>
                            </a>
                            <a href="#notifications" 
                               class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-white hover:text-pink-500 transition duration-300">
                                <i class="fas fa-bell"></i>
                                <span>Notifications</span>
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Personal Information -->
                    <div id="personal-info" class="bg-white rounded-2xl shadow-soft p-8 mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Personal Information</h2>
                        
                        <form>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Full Name</label>
                                    <input type="text" 
                                           value="{{ $customer->name }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300"
                                           readonly>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Email Address</label>
                                    <input type="email" 
                                           value="{{ $customer->email }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300"
                                           readonly>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Phone Number</label>
                                    <input type="tel" 
                                           value="{{ $customer->phone }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300"
                                           readonly>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Member Since</label>
                                    <input type="text" 
                                           value="{{ $customer->created_at->format('M j, Y') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300"
                                           readonly>
                                </div>
                            </div>
                            
                            <button type="button" 
                                    class="bg-pink-500 text-white px-6 py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium">
                                Edit Information
                            </button>
                        </form>
                    </div>

                    <!-- Preferences -->
                    <div id="preferences" class="bg-white rounded-2xl shadow-soft p-8 mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Service Preferences</h2>
                        
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Preferred Communication</h3>
                                <div class="space-y-3">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-300 text-pink-500 focus:ring-pink-500" checked>
                                        <span class="ml-3 text-gray-700">Email notifications</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-300 text-pink-500 focus:ring-pink-500" checked>
                                        <span class="ml-3 text-gray-700">SMS reminders</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-300 text-pink-500 focus:ring-pink-500">
                                        <span class="ml-3 text-gray-700">Promotional offers</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Appointment Preferences</h3>
                                <div class="space-y-3">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-300 text-pink-500 focus:ring-pink-500" checked>
                                        <span class="ml-3 text-gray-700">Automatic appointment confirmations</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-300 text-pink-500 focus:ring-pink-500" checked>
                                        <span class="ml-3 text-gray-700">24-hour reminder notifications</span>
                                    </label>
                                </div>
                            </div>
                            
                            <button type="button" 
                                    class="bg-pink-500 text-white px-6 py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium">
                                Save Preferences
                            </button>
                        </div>
                    </div>

                    <!-- Loyalty Status -->
                    <div class="bg-gradient-to-br from-pink-500 to-purple-600 rounded-2xl p-8 text-white">
                        <h2 class="text-2xl font-bold mb-4">Loyalty Status</h2>
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <p class="text-pink-100">Current Tier</p>
                                <p class="text-2xl font-bold">Gold Member</p>
                            </div>
                            <div class="text-right">
                                <p class="text-pink-100">Loyalty Points</p>
                                <p class="text-2xl font-bold">1,250</p>
                            </div>
                        </div>
                        
                        <div class="bg-white bg-opacity-20 rounded-lg p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-pink-100">Next Tier: Platinum</span>
                                <span class="text-pink-100">750 points to go</span>
                            </div>
                            <div class="w-full bg-white bg-opacity-30 rounded-full h-2">
                                <div class="bg-white h-2 rounded-full" style="width: 62%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection