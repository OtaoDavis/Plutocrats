<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/udash.css') }}">
        <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap 5 JS Bundle (with Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>

        @include('layouts.navbar')

        <div class="container mt-5 main-content">
            <div class="row">
                <!-- Left Section -->
                <div class="col-md-8">
                    <!-- My Bookings Section -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">My Bookings</h5>

                            {{-- Display success or error message --}}
                            @if (session('success'))
                                <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
                            @elseif(session('error'))
                                <div id="error-alert" class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            @if ($bookings && $bookings->isEmpty())
                                <p>No bookings yet. Start planning your next adventure!</p>
                            @elseif($bookings && !$bookings->isEmpty())
                                <div class="row">
                                    @foreach ($bookings as $booking)
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="card h-100 shadow-sm position-relative">
                                                <a href="{{ route('booking.details', $booking->id) }}">
                                                    <img src="images/{{ $booking->location }}.webp" class="card-img-top"
                                                        alt="{{ $booking->location }}">
                                                </a>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $booking->title }}</h5>
                                                    <p class="card-text">
                                                        {{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M, Y') }}
                                                        –
                                                        {{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M, Y') }}
                                                    </p>
                                                    <span
                                                        class="badge bg-{{ strtolower($booking->status) == 'confirmed' ? 'success' : (strtolower($booking->status) == 'canceled' ? 'danger' : 'secondary') }}">
                                                        {{ ucfirst($booking->status ?? 'Pending') }}
                                                    </span>
                                                </div>

                                                <div class="card-footer text-center bg-white border-top-0">
                                                    <button class="btn btn-outline-primary btn-sm view-details-btn"
                                                        data-bs-toggle="modal" data-bs-target="#bookingDetailsModal"
                                                        data-location="{{ $booking->location }}"
                                                        data-price="{{ $booking->price }}"
                                                        data-checkin="{{ $booking->check_in_date }}"
                                                        data-checkout="{{ $booking->check_out_date }}"
                                                        data-adults="{{ $booking->adults }}"
                                                        data-children="{{ $booking->children }}"
                                                        data-status="{{ $booking->status }}">
                                                        View Details
                                                    </button>
                                                </div>

                                                <!-- Delete Icon -->
                                                <form action="{{ route('booking.delete', $booking->id) }}"
                                                    method="POST"
                                                    style="position: absolute; bottom: 10px; right: 10px;"
                                                    onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        title="Delete booking">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>

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
                            @if ($bookings->isEmpty())
                                <p>No history available. Start planning your next adventure!</p>
                            @else
                                @foreach ($bookings as $booking)
                                    <div class="history-item">
                                        <p>
                                            @if ($booking->status == 'confirmed')
                                                <strong>Booking confirmed</strong> for {{ $booking->location }} -
                                                {{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M, Y') }}
                                            @elseif($booking->status == 'canceled')
                                                <strong>Booking canceled</strong> for {{ $booking->location }} -
                                                {{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M, Y') }}
                                            @else
                                                <strong>Booking status:</strong>
                                                {{ ucfirst($booking->status ?? 'Pending') }}
                                            @endif
                                            - <small
                                                class="text-muted">{{ $booking->created_at->format('d M, Y') }}</small>
                                        </p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="col-md-4">
                    <p><strong>Welcome Back</strong> {{ auth()->user()->name }}</p>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Profile Information</h5>
                            <div class="d-flex justify-content-center mb-3">
                                <i class="fas fa-user-circle" style="font-size: 100px;"></i>
                            </div>
                            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                            <p><strong>Joined:</strong> {{ auth()->user()->created_at->format('d M, Y') }}</p>
                            <a href="#" class="btn btn-primary w-100">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Details Modal -->
        <div class="modal fade" id="bookingDetailsModal" tabindex="-1" aria-labelledby="bookingDetailsLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="bookingDetailsLabel" style="color: #b48f20;">Booking Details</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong style="color:#b48f20;">Location:</strong> <span id="modal-location"></span></p>
                        <p><strong style="color:#b48f20;">Price:</strong> KES <span id="modal-price"></span></p>
                        <p><strong style="color:#b48f20;">Check-In:</strong> <span id="modal-checkin"></span></p>
                        <p><strong style="color:#b48f20;">Check-Out:</strong> <span id="modal-checkout"></span></p>
                        <p><strong style="color:#b48f20;">Adults:</strong> <span id="modal-adults"></span></p>
                        <p><strong style="color:#b48f20;">Children:</strong> <span id="modal-children"></span></p>
                        <p><strong style="color:#b48f20;">Status:</strong> <span id="modal-status"></span></p>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        @include('layouts.footer')

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const viewButtons = document.querySelectorAll(".view-details-btn");

                viewButtons.forEach(button => {
                    button.addEventListener("click", function() {
                        // Format date as dd/mm/yyyy
                        function formatDate(dateString) {
                            const date = new Date(dateString);
                            const day = String(date.getDate()).padStart(2, '0');
                            const month = String(date.getMonth() + 1).padStart(2, '0');
                            const year = date.getFullYear();
                            return `${day}/${month}/${year}`;
                        }

                        // Format price with commas
                        function formatPrice(price) {
                            return new Intl.NumberFormat('en-US').format(price);
                        }

                        document.getElementById("modal-location").textContent = this.dataset.location;
                        document.getElementById("modal-price").textContent = "Ksh " + formatPrice(this
                            .dataset.price);
                        document.getElementById("modal-checkin").textContent = formatDate(this.dataset
                            .checkin);
                        document.getElementById("modal-checkout").textContent = formatDate(this.dataset
                            .checkout);
                        document.getElementById("modal-adults").textContent = this.dataset.adults;
                        document.getElementById("modal-children").textContent = this.dataset.children;
                        document.getElementById("modal-status").textContent = this.dataset.status;
                    });
                });
            });

            setTimeout(() => {
                const successAlert = document.getElementById('success-alert');
                const errorAlert = document.getElementById('error-alert');

                if (successAlert) {
                    successAlert.style.transition = 'opacity 0.5s ease';
                    successAlert.style.opacity = '0';
                    setTimeout(() => successAlert.remove(), 500);
                }

                if (errorAlert) {
                    errorAlert.style.transition = 'opacity 0.5s ease';
                    errorAlert.style.opacity = '0';
                    setTimeout(() => errorAlert.remove(), 500);
                }
            }, 3000);
        </script>




    </body>

</html>
