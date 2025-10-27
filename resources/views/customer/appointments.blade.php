@extends('layouts.app')

@section('title', 'My Appointments - Styled by Enny')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-pink-50 to-purple-100 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">My Appointments</h1>
            <p class="text-xl text-gray-600">View and manage your appointment history</p>
        </div>
    </div>
</section>

<!-- Appointments Content -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Tabs -->
            <div class="flex space-x-1 bg-gray-100 rounded-2xl p-2 mb-8">
                <button onclick="showTab('upcoming')" 
                        class="flex-1 py-3 px-6 rounded-xl font-medium transition duration-300 tab-button active"
                        data-tab="upcoming">
                    Upcoming
                </button>
                <button onclick="showTab('past')" 
                        class="flex-1 py-3 px-6 rounded-xl font-medium transition duration-300 tab-button"
                        data-tab="past">
                    Past Appointments
                </button>
                <button onclick="showTab('cancelled')" 
                        class="flex-1 py-3 px-6 rounded-xl font-medium transition duration-300 tab-button"
                        data-tab="cancelled">
                    Cancelled
                </button>
            </div>

            <!-- Upcoming Appointments Tab -->
            <div id="upcoming-tab" class="tab-content">
                @if($appointments->where('status', 'confirmed')->count() > 0)
                <div class="space-y-6">
                    @foreach($appointments->where('status', 'confirmed') as $appointment)
                    <div class="border border-gray-200 rounded-2xl p-6 hover:shadow-soft transition duration-300">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                            <div class="mb-4 lg:mb-0">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $appointment->service->name }}</h3>
                                <div class="flex flex-wrap items-center gap-4 text-gray-600">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2 text-pink-500"></i>
                                        <span>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('l, F j, Y') }}</span>
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
                                <button class="text-red-500 hover:text-red-600 transition duration-300" 
                                        onclick="cancelAppointment({{ $appointment->id }})">
                                    <i class="fas fa-times-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12">
                    <i class="fas fa-calendar-plus text-gray-400 text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-600 mb-2">No Upcoming Appointments</h4>
                    <p class="text-gray-500 mb-6">Book your next appointment to get started!</p>
                    <a href="{{ route('booking.index') }}" 
                       class="bg-pink-500 text-white px-8 py-4 rounded-lg hover:bg-pink-600 transition duration-300 font-medium">
                        Book New Appointment
                    </a>
                </div>
                @endif
            </div>

            <!-- Past Appointments Tab -->
            <div id="past-tab" class="tab-content hidden">
                @if($appointments->where('status', 'completed')->count() > 0)
                <div class="space-y-6">
                    @foreach($appointments->where('status', 'completed') as $appointment)
                    <div class="border border-gray-200 rounded-2xl p-6 hover:shadow-soft transition duration-300">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                            <div class="mb-4 lg:mb-0">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $appointment->service->name }}</h3>
                                <div class="flex flex-wrap items-center gap-4 text-gray-600">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2 text-pink-500"></i>
                                        <span>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M j, Y') }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-clock mr-2 text-pink-500"></i>
                                        <span>{{ \Carbon\Carbon::parse($appointment->slot->start_time)->format('g:i A') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                    Completed
                                </span>
                                <span class="text-2xl font-bold text-pink-500">
                                    ${{ number_format($appointment->service->price, 2) }}
                                </span>
                                <button class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition duration-300 text-sm font-medium">
                                    Book Again
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12">
                    <i class="fas fa-history text-gray-400 text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-600 mb-2">No Past Appointments</h4>
                    <p class="text-gray-500">Your completed appointments will appear here</p>
                </div>
                @endif
            </div>

            <!-- Cancelled Appointments Tab -->
            <div id="cancelled-tab" class="tab-content hidden">
                @if($appointments->where('status', 'cancelled')->count() > 0)
                <div class="space-y-6">
                    @foreach($appointments->where('status', 'cancelled') as $appointment)
                    <div class="border border-gray-200 rounded-2xl p-6 hover:shadow-soft transition duration-300">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                            <div class="mb-4 lg:mb-0">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $appointment->service->name }}</h3>
                                <div class="flex flex-wrap items-center gap-4 text-gray-600">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2 text-pink-500"></i>
                                        <span>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M j, Y') }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-clock mr-2 text-pink-500"></i>
                                        <span>{{ \Carbon\Carbon::parse($appointment->slot->start_time)->format('g:i A') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">
                                    Cancelled
                                </span>
                                <span class="text-2xl font-bold text-gray-400 line-through">
                                    ${{ number_format($appointment->service->price, 2) }}
                                </span>
                                <a href="{{ route('booking.service') }}?service_id={{ $appointment->service->id }}" 
                                   class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition duration-300 text-sm font-medium">
                                    Rebook
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12">
                    <i class="fas fa-ban text-gray-400 text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-600 mb-2">No Cancelled Appointments</h4>
                    <p class="text-gray-500">Your cancelled appointments will appear here</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
function showTab(tabName) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });
    
    // Remove active class from all buttons
    document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('active', 'bg-white', 'text-pink-500', 'shadow-soft');
        button.classList.add('text-gray-600');
    });
    
    // Show selected tab content
    document.getElementById(tabName + '-tab').classList.remove('hidden');
    
    // Add active class to clicked button
    event.target.classList.add('active', 'bg-white', 'text-pink-500', 'shadow-soft');
    event.target.classList.remove('text-gray-600');
}

function cancelAppointment(appointmentId) {
    if (confirm('Are you sure you want to cancel this appointment?')) {
        // Here you would typically make an API call to cancel the appointment
        alert('Appointment cancellation feature will be implemented soon!');
    }
}
</script>

<style>
.tab-button.active {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}
</style>
@endsection