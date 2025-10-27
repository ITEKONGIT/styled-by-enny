@extends('layouts.app')

@section('title', 'Register - Styled by Enny')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-pink-50 to-purple-100 py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <a href="{{ route('home') }}" class="inline-block mb-4">
                    <span class="text-2xl font-bold text-pink-500">Styled by Enny</span>
                </a>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Create Account</h1>
                <p class="text-gray-600">Join us to book appointments and manage your bookings</p>
            </div>

            <!-- Registration Form -->
            <div class="bg-white rounded-2xl shadow-soft p-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input type="text" 
                               name="name" 
                               id="name"
                               value="{{ old('name') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300"
                               placeholder="Enter your full name"
                               required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                        <input type="email" 
                               name="email" 
                               id="email"
                               value="{{ old('email') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300"
                               placeholder="Enter your email"
                               required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="mb-6">
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                        <input type="tel" 
                               name="phone" 
                               id="phone"
                               value="{{ old('phone') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300"
                               placeholder="Enter your phone number"
                               required>
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <input type="password" 
                               name="password" 
                               id="password"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300"
                               placeholder="Create a password"
                               required>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                        <input type="password" 
                               name="password_confirmation" 
                               id="password_confirmation"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300"
                               placeholder="Confirm your password"
                               required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-pink-500 text-white py-4 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-lg mb-6">
                        Create Account
                    </button>
                </form>

                <!-- Divider -->
                <div class="my-8 flex items-center">
                    <div class="flex-1 border-t border-gray-300"></div>
                    <span class="px-4 text-gray-500">or</span>
                    <div class="flex-1 border-t border-gray-300"></div>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <p class="text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-pink-500 hover:text-pink-600 font-medium">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-800 transition duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to home
                </a>
            </div>
        </div>
    </div>
</section>
@endsection