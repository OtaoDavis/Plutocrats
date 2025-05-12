<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            min-height: 100vh;
        }

        #adminContent {
            flex-grow: 1;
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .booking-title-container {
            display: flex;
            align-items: center; /* Vertically align title and indicator */
            cursor: pointer; /* Make the whole container clickable */
        }

        .booking-title {
            max-width: 150px; /* Adjust as needed */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            margin-right: 5px; /* Add some spacing between title and text */
        }

        .expand-indicator {
            font-size: 0.8em;
            color: #6c757d; /* Gray color for the indicator */
        }

        .user-details {
            line-height: 1.5;
        }

        .user-phone {
            font-size: 0.9em;
            color: #6c757d;
        }

        .date-details {
            line-height: 1.3;
        }

        .nights {
            font-size: 0.9em;
            color: #6c757d;
        }

        .booking-details-modal .modal-body p {
            margin-bottom: 0.5rem;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    @include('layouts.sidebar')

    <div id="adminContent">
        <h1>Admin Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }}! This is your admin dashboard.</p>

        <h2>Bookings</h2>

        @if ($bookings->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking #</th>
                        <th>User Details</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Adults</th>
                        <th>Children</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>
                                <div class="user-details">
                                    {{ $booking->user->name }}<br>
                                    {{ $booking->user->email }}<br>
                                    <span class="user-phone">{{ $booking->user->phone ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td data-bs-toggle="modal" data-bs-target="#bookingDetailsModal{{ $booking->id }}">
                                <div class="booking-title-container">
                                    <span class="booking-title">
                                        {{ $booking->title }}
                                    </span>
                                    <span class="expand-indicator">(Click to Expand)</span>
                                </div>
                            </td>
                            <td>Ksh {{ number_format($booking->price) }}/=</td>
                            <td>{{ $booking->adults }}</td>
                            <td>{{ $booking->children }}</td>
                            <td>
                                <div class="date-details">
                                    {{ $booking->check_in_date->format('d-m-Y') }}<br>
                                    <span class="nights">{{ $booking->check_in_date->diffInDays($booking->check_out_date) }} Nights</span>
                                </div>
                            </td>
                            <td>
                                <div class="date-details">
                                    {{ $booking->check_out_date->format('d-m-Y') }}<br>
                                    <span class="nights">{{ $booking->check_in_date->diffInDays($booking->check_out_date) }} Nights</span>
                                </div>
                            </td>
                            <td>{{ $booking->status }}</td>
                        </tr>

                        <div class="modal fade booking-details-modal" id="bookingDetailsModal{{ $booking->id }}" tabindex="-1" aria-labelledby="bookingDetailsModalLabel{{ $booking->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bookingDetailsModalLabel{{ $booking->id }}">Booking #{{ $booking->id }} Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>User Name:</strong> {{ $booking->user->name }}</p>
                                        <p><strong>User Email:</strong> {{ $booking->user->email }}</p>
                                        <p><strong>User Phone:</strong> {{ $booking->user->phone ?? 'N/A' }}</p>
                                        <p><strong>Title:</strong> {{ $booking->title }}</p>
                                        <p><strong>Price:</strong> Ksh {{ number_format($booking->price) }}/=</p>
                                        <p><strong>Adults:</strong> {{ $booking->adults }}</p>
                                        <p><strong>Children:</strong> {{ $booking->children }}</p>
                                        <p><strong>Check-in Date:</strong> {{ $booking->check_in_date->format('d-m-Y') }}</p>
                                        <p><strong class="nights">Nights:</strong> {{ $booking->check_in_date->diffInDays($booking->check_out_date) }}</p>
                                        <p><strong>Check-out Date:</strong> {{ $booking->check_out_date->format('d-m-Y') }}</p>
                                        <p><strong>Status:</strong> {{ $booking->status }}</p>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>

            {{ $bookings->links() }}
        @else
            <p>No bookings found.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>