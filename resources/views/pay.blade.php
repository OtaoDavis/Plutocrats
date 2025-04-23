<div class="container">
    <h2 class="mb-4">Pay for {{ $booking->title }}</h2>
    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
    <p><strong>Price:</strong> KES {{ $booking->price }}</p>

    <iframe src="{{ $iframeSrc }}" width="100%" height="700" frameborder="0" allowfullscreen>
    </iframe>
</div>
