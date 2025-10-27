@extends('layouts.app')

@section('title', 'Login - Styled by Enny')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-pink-50 to-purple-100 py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <a href="{{ route('home') }}" class="inline-block mb-4">
                    <span class="text-2xl font-bold text-pink-500">Styled by Enny</span>
                </a>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome Back</h1>
                <p class="text-gray-600">Sign in to your account to manage your appointments</p>
            </div>

            <!-- Login Form -->
            <div class="bg-white rounded-2xl shadow-soft p-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

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

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <input type="password" 
                               name="password" 
                               id="password"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300"
                               placeholder="Enter your password"
                               required>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-pink-500 focus:ring-pink-500">
                            <span class="ml-2 text-gray-600">Remember me</span>
                        </label>
                        <a href="#" class="text-pink-500 hover:text-pink-600 font-medium">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-pink-500 text-white py-4 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-lg">
                        Sign In
                    </button>
                </form>

                <!-- Divider -->
                <div class="my-8 flex items-center">
                    <div class="flex-1 border-t border-gray-300"></div>
                    <span class="px-4 text-gray-500">or</span>
                    <div class="flex-1 border-t border-gray-300"></div>
                </div>

                <!-- Register Link -->
                <div class="text-center">
                    <p class="text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-pink-500 hover:text-pink-600 font-medium">
                            Create one here
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