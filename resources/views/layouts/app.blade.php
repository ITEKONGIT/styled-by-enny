<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Styled by Enny - Premium Hair Salon')</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/brandimaging.jpeg') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .shadow-soft {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .shadow-hover:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-poppins bg-gray-50 min-h-full" x-data="{ mobileMenuOpen: false }">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2 text-2xl font-bold text-gray-800">
                    <div class="w-10 h-10 bg-pink-400 rounded-full flex items-center justify-center">
                        <i class="fas fa-cut text-white text-lg"></i>
                    </div>
                    <span>Styled by Enny</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}#home" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium">Home</a>
                    <a href="{{ route('home') }}#services" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium">Services</a>
                    <a href="{{ route('booking.index') }}" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium">Book Now</a>
                    <a href="{{ route('home') }}#about" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium">About</a>
                    <a href="{{ route('home') }}#contact" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium">Contact</a>
                    
                    @auth
                        <a href="{{ route('customer.dashboard') }}" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium">My Appointments</a>
                        @if(auth()->user()->is_admin)
                            <a href="/admin" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition duration-300 font-medium">Admin Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium">Login</a>
                    @endauth
                </div>

                <!-- Book Now Button -->
                <a href="{{ route('booking.index') }}" class="hidden md:block bg-pink-500 text-white px-6 py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium shadow-lg hover:shadow-xl">
                    Book Appointment
                </a>

                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-700 hover:text-pink-500">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-4"
                 class="md:hidden mt-4 py-4 bg-white rounded-lg shadow-xl border">
                <div class="flex flex-col space-y-4 px-4">
                    <a href="{{ route('home') }}#home" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium py-2 border-b">Home</a>
                    <a href="{{ route('home') }}#services" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium py-2 border-b">Services</a>
                    <a href="{{ route('booking.index') }}" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium py-2 border-b">Book Now</a>
                    <a href="{{ route('home') }}#about" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium py-2 border-b">About</a>
                    <a href="{{ route('home') }}#contact" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium py-2 border-b">Contact</a>
                    
                    @auth
                        <a href="{{ route('customer.dashboard') }}" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium py-2 border-b">My Appointments</a>
                        @if(auth()->user()->is_admin)
                            <a href="/admin" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-center">Admin Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-pink-500 transition duration-300 font-medium py-2 border-b">Login</a>
                        <a href="{{ route('booking.index') }}" class="bg-pink-500 text-white px-4 py-3 rounded-lg hover:bg-pink-600 transition duration-300 font-medium text-center">Book Appointment</a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Brand Column -->
                <div>
                    <h3 class="text-2xl font-bold mb-4 relative pb-2">
                        Styled by Enny
                        <span class="absolute bottom-0 left-0 w-12 h-1 bg-pink-400"></span>
                    </h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Premium hair salon dedicated to enhancing your natural beauty with expert styling and organic products.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/styled.by.enny" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-pink-500 transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@styledbyenny6" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-pink-500 transition duration-300">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="https://www.facebook.com/assy_enny" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-pink-500 transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-semibold mb-6 relative pb-2">
                        Quick Links
                        <span class="absolute bottom-0 left-0 w-8 h-1 bg-pink-400"></span>
                    </h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}#home" class="text-gray-300 hover:text-pink-400 transition duration-300">Home</a></li>
                        <li><a href="{{ route('home') }}#services" class="text-gray-300 hover:text-pink-400 transition duration-300">Services</a></li>
                        <li><a href="{{ route('booking.index') }}" class="text-gray-300 hover:text-pink-400 transition duration-300">Book Appointment</a></li>
                        <li><a href="{{ route('home') }}#about" class="text-gray-300 hover:text-pink-400 transition duration-300">About Us</a></li>
                        <li><a href="{{ route('home') }}#contact" class="text-gray-300 hover:text-pink-400 transition duration-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-semibold mb-6 relative pb-2">
                        Contact Info
                        <span class="absolute bottom-0 left-0 w-8 h-1 bg-pink-400"></span>
                    </h3>
                    <div class="space-y-4 text-gray-300">
                        <p class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt mt-1 text-pink-400"></i>
                            <span>21 Sunday Farm Estate, Dopemu, Lagos, 102212, Nigeria</span>
                        </p>
                        <p class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-pink-400"></i>
                            <span>info@styledbyenny.com</span>
                        </p>
                        <p class="flex items-center space-x-3">
                            <i class="fas fa-clock text-pink-400"></i>
                            <span>Mon-Fri: 10AM-7PM, Sat: 10AM-5PM, Sun: Closed</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-700 pt-8 text-center">
                <p class="text-gray-400">
                    © 2025 Styled by Enny Salon. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Smooth scrolling for anchor links
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>