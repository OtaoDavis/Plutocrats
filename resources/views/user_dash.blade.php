<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/udash.css') }}">
</head>

<body>

    @include('layouts.navbar')

    <div class="container mt-5 main-content">
        <div class="row">
            <!-- Main Content Area: Left Section (Bookings and History) -->
            <div class="col-md-8">
                <!-- My Bookings Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">My Bookings</h5>

                        {{-- Display success or error message --}}
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if($bookings && $bookings->isEmpty())
                        <p>No bookings yet. Start planning your next adventure!</p>
                        @elseif($bookings && !$bookings->isEmpty())
                        <div class="row">
                            @foreach ($bookings as $booking)
                            <div class="col-md-4 mb-4">
                                <div class="destination-item">
                                    <!-- Here, we use a dynamic route and booking information -->
                                    <a class="media-thumb" href="{{ route('booking.details', $booking->id) }}">
                                        <img src="images/{{ $booking->location }}.webp" alt="{{ $booking->location }}"
                                            class="img-fluid">
                                        <div class="media-text">
                                            <h3>{{ $booking->location }}</h3>
                                            <span class="location">{{ $booking->location }}</span>
                                            <p>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M, Y') }} -
                                                {{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M, Y') }}
                                            </p>
                                            <span class="status {{ strtolower($booking->status) }}">
                                                {{ ucfirst($booking->status ?? 'Pending') }}
                                            </span>
                                            <span class="explore-text">View Details</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @else
                        <p>No bookings yet. Start planning your next adventure!</p>
                        @endif

                    </div>
                </div>

                <!-- History Section -->
                <div class="card history-section">
                    <div class="card-body">
                        <h5 class="card-title">History</h5>

                        @if($bookings->isEmpty())
                        <p>No history available. Start planning your next adventure!</p>
                        @else
                        @foreach($bookings as $booking)
                        <div class="history-item">
                            <p>
                                @if($booking->status == 'confirmed')
                                <strong>Booking confirmed</strong> for {{ $booking->location }} - {{
                                \Carbon\Carbon::parse($booking->check_in_date)->format('d M, Y') }}
                                @elseif($booking->status == 'canceled')
                                <strong>Booking canceled</strong> for {{ $booking->location }} - {{
                                \Carbon\Carbon::parse($booking->check_in_date)->format('d M, Y') }}
                                @else
                                <strong>Booking status:</strong> {{ ucfirst($booking->status ?? 'Pending') }}
                                @endif
                                - <small class="text-muted">{{ $booking->created_at->format('d M, Y') }}</small>
                            </p>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

            </div>

            <!-- Right Section: Profile Card -->
            <div class="col-md-4">
                <p><strong>Welcome Back</strong> {{ auth()->user()->name }}</p>
                <!-- Profile Info Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Profile Information</h5>
                        <div class="d-flex justify-content-center mb-3">
                            <i class="fas fa-user-circle" style="font-size: 100px;"></i>
                        </div>                        

                        <!-- Displaying Profile Information (Example) -->
                        <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        <p><strong>Joined:</strong> {{ auth()->user()->created_at->format('d M, Y') }}</p>

                        <a href="#" class="btn btn-primary w-100">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

</body>

</html>