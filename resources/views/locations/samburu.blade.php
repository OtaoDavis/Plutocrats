<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta name="description" content="Discover the wonders of Samburu National Reserve, Kenya" />
    <meta name="keywords" content="Samburu, Safari, Kenya, Wildlife, Culture" />

    <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/locations.css') }}">

    <title>Samburu National Reserve Safaris</title>
</head>

<body>
    @include('layouts.nav')

    <section class="hero">
        <div class="owl-carousel owl-theme hero-slider">
            <div class="slide">
                <img src="/images/samburu_1.webp" alt="Samburu Landscape">
            </div>
            <div class="slide">
                <img src="{{ asset('images/samburu_2.webp') }}" alt="Samburu Elephants">
            </div>
            <div class="slide">
                <img src="{{ asset('images/samburu_3.webp') }}" alt="Samburu Wildlife">
            </div>
        </div>
        <div class="hero-text">
            <h1>Explore Samburu National Reserve</h1>
            <p>
                Embark on an unforgettable journey to Samburu National Reserve, a land of dramatic landscapes and
                unique wildlife. Located north of the equator, Samburu is renowned for its arid beauty, the Ewaso Nyiro
                River snaking through it, and the special five: Grevy's zebra, Somali ostrich, reticulated giraffe,
                Beisa oryx, and the long-necked gerenuk. Discover a rich cultural heritage and thrilling wildlife
                encounters in this captivating Kenyan destination.
            </p>
        </div>
    </section>


    <section class="packages">
        <div class="container">
            <h2 class="locations-title text-center">Samburu Safari Packages</h2>
            <div class="packages-wrapper">
                <button class="scroll-btn-left" aria-label="Scroll Left">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>

                <div class="packages-scroll">
                    @foreach ([
                        [
                            'title' => 'Samburu Highlights Safari (3 Days)',
                            'desc' => 'Experience the best of Samburu in a short getaway.',
                            'image' => 'samburu_highlights.webp',
                            'price' => 150000,
                            'details' => '
                                - Guided game drives to see the Special Five<br>
                                - Accommodation in comfortable lodges/camps<br>
                                - Explore the scenic landscapes of Samburu<br>
                                - Opportunities for cultural visits<br>
                                - All meals included
                            ',
                        ],
                        [
                            'title' => 'Samburu Cultural & Wildlife Expedition (5 Days)',
                            'desc' => 'Immerse yourself in the culture and wildlife of Samburu.',
                            'image' => 'samburu_2.webp',
                            'price' => 220000,
                            'details' => '
                                - Extensive game drives and wildlife viewing<br>
                                - Visits to local Samburu villages<br>
                                - Learn about Samburu traditions and customs<br>
                                - Riverside walks and birdwatching<br>
                                - Stay in eco-friendly accommodations
                            ',
                        ],
                        [
                            'title' => 'Luxury Samburu Adventure (4 Days)',
                            'desc' => 'Indulge in a luxurious safari experience in Samburu.',
                            'image' => 'samburu_lux.webp',
                            'price' => 280000,
                            'details' => '
                                - Stay in high-end safari lodges/camps<br>
                                - Private game drives with experienced guides<br>
                                - Gourmet meals and exceptional service<br>
                                - Sundowner experiences with stunning views<br>
                                - Optional hot air balloon safari
                            ',
                        ],
                        [
                            'title' => 'Samburu Birding Safari (4 Days)',
                            'desc' => 'Discover the diverse avian life of Samburu.',
                            'image' => 'samburu_bird.webp',
                            'price' => 180000,
                            'details' => '
                                - Guided birdwatching tours with expert ornithologists<br>
                                - Explore different habitats within the reserve<br>
                                - Learn to identify Samburu\'s unique bird species<br>
                                - Comfortable accommodation near birding hotspots<br>
                                - Includes bird identification guides
                            ',
                        ],
                        [
                            'title' => 'Family Safari in Samburu (5 Days)',
                            'desc' => 'A fun and educational safari for the whole family.',
                            'image' => 'family_safari.jpg',
                            'price' => 200000,
                            'details' => '
                                - Kid-friendly game drives and activities<br>
                                - Educational nature walks and talks<br>
                                - Family-oriented accommodation<br>
                                - Opportunities to learn about Samburu culture<br>
                                - Includes child-friendly meals
                            ',
                        ],
                        [
                            'title' => 'Samburu Photography Safari (6 Days)',
                            'desc' => 'Capture the stunning beauty of Samburu through your lens.',
                            'image' => 'samburu_photo.webp',
                            'price' => 250000,
                            'details' => '
                                - Guided by a professional wildlife photographer<br>
                                - Focus on capturing the best light and moments<br>
                                - Flexible schedules to maximize photographic opportunities<br>
                                - Workshops on wildlife photography techniques<br>
                                - Accommodation in strategically located camps
                            ',
                        ],
                    ] as $package)

                    <div class="package-card" data-bs-toggle="modal" data-bs-target="#bookingModal"
                        data-title="{{ $package['title'] }}" data-desc="{{ $package['desc'] }}"
                        data-image-name="{{ $package['image'] }}" data-price="{{ $package['price'] }}"
                        data-details="{!! $package['details'] !!}"
                        style="background-image: url('{{ asset('images/' . $package['image']) }}');">
                        <div class="overlay">
                            <h3>{{ $package['title'] }}</h3>
                            <p>{{ $package['desc'] }}</p>
                            <span class="book-text" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                data-title="{{ $package['title'] }}" data-desc="{{ $package['desc'] }}"
                                data-image-name="{{ $package['image'] }}" data-price="{{ $package['price'] }}"
                                data-details="{!! $package['details'] !!}">
                                View Details
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <button class="scroll-btn-right" aria-label="Scroll Right">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingModalLabel">Package Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 id="modalTitle" class="mb-3"></h4>
                        <p><strong>Price:</strong> Kshs. <span id="modalPrice"></span></p>
                        <div id="modalDetails"></div>
                        <a id="modalBookBtn" href="#" class="btn btn-primary mt-3 w-100">Proceed to Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="top-destinations">
        <div class="container">
            <h2 class="locations-title text-center">Explore Samburu's Gems</h2>
            <div class="row">
                <div class="col-md-6 position-relative">
                    <button class="scroll-btn left" onclick="scrollGrid(-1)">&#10094;</button>

                    <div class="locations-grid-wrapper overflow-hidden">
                        <div class="locations-grid d-flex flex-nowrap" id="locationsGrid">
                            @php
                            $destinations = [
                                [
                                    'title' => 'Ewaso Nyiro River',
                                    'desc' => 'The lifeblood of Samburu, attracting diverse wildlife for drinking and bathing.',
                                    'image' => 'ewaso_nyiro.webp',
                                    'price' => 0,
                                    'currency' => 'KES',
                                ],
                                [
                                    'title' => 'Samburu National Reserve',
                                    'desc' => 'The core of wildlife viewing, home to the Special Five and stunning landscapes.',
                                    'image' => 'samburu_1.webp',
                                    'price' => 60,
                                    'currency' => 'USD',
                                ],
                                [
                                    'title' => 'Buffalo Springs NR',
                                    'desc' => 'Known for its oasis-like springs and unique wildlife, adjacent to Samburu.',
                                    'image' => 'buffalo_springs.webp',
                                    'price' => 60,
                                    'currency' => 'USD',
                                ],
                                [
                                    'title' => 'Samburu Cultural Villages',
                                    'desc' => 'An opportunity to immerse yourself in the vibrant culture and traditions of the Samburu people.',
                                    'image' => 'samburu_culture.webp',
                                    'price' => 30,
                                    'currency' => 'USD',
                                ],
                            ];
                            $chunks = array_chunk($destinations, 4); // 2x2 layout = 4 cards per scroll "page"
                            @endphp

                            @foreach ($chunks as $chunk)
                            <div class="grid-page d-flex flex-wrap me-4" style="width: 520px;">
                                @foreach ($chunk as $destination)
                                <div class="location-card m-2 flex-shrink-0" onclick="showDetails(
                                            '{{ $destination['title'] }}',
                                            `{{ addslashes($destination['desc']) }}`,
                                            '{{ asset('images/' . $destination['image']) }}',
                                            '{{ number_format($destination['price']) }}',
                                            '{{ $destination['currency'] }}'
                                        )" style="width: 240px; height: 260px; cursor: pointer;">
                                    <img src="{{ asset('images/' . $destination['image']) }}"
                                        alt="{{ $destination['title'] }}" class="img-fluid rounded mb-2"
                                        style="height: 150px; object-fit: cover;">
                                    <h5 class="text-center mb-1">{{ $destination['title'] }}</h5>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <button class="scroll-btn right" onclick="scrollGrid(1)">&#10095;</button>
                </div>

                <!-- Right Side: Dynamic Detail Display -->
                <div class="col-md-6">
                    <div class="location-details text-center mt-4 mt-md-0">
                        <img id="location-image"
                            src="{{ asset('images/' . ($destinations[0]['image'] ?? 'placeholder.jpg')) }}"
                            alt="{{ $destinations[0]['title'] ?? 'Location' }}" class="img-fluid rounded mb-3"
                            style="height: 250px; object-fit: cover;" />
                        <h3 id="location-title">{{ $destinations[0]['title'] ?? 'Select a Location' }}</h3>
                        <p id="location-desc" class="px-4">{{ $destinations[0]['desc'] ?? 'Details will appear here.' }}
                        </p>
                        <p id="location-price" class="fw-bold mt-2">
                            Price ranging from <strong>${{ number_format($destinations[0]['price'] ?? 0) }}</strong> per
                            person depending on month of travel
                        </p>
                        <a id="bookNowBtn" href="{{ route('booking.destination.form', [
                                    'location' => $destination['title'],
                                    'title' => $destination['title'],
                                    'image' => asset('images/' . $destination['image']),
                                    'price' => $destination['price'],
                                    'desc' => addslashes($destination['desc']),
                                    'currency' => $destination['currency']
                                ]) }}" class="btn btn-primary custom-book-button mt-3">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Guidance Section -->
    <section class="booking-guidance">
        <div class="container">
            <h2 class="locations-title text-center">Booking Guidance</h2>
            <p class="text-center">Planning your Maasai Mara adventure? Follow these steps to secure your dream
                safari.</p>

            <div class="row">
                <div class="col-md-4">
                    <div class="guidance-card">
                        <h3>1. Choose Your Package</h3>
                        <p>Explore our safari packages and select one that suits your budget and preferences.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="guidance-card">
                        <h3>2. Confirm Availability</h3>
                        <p>Contact our team to check availability for your preferred travel dates.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="guidance-card">
                        <h3>3. Make Your Payment</h3>
                        <p>Secure your booking with a deposit or full payment via our available payment options.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="guidance-card">
                        <h3>4. Receive Confirmation</h3>
                        <p>Once payment is received, we will send you a confirmation email with all details.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="guidance-card">
                        <h3>5. Prepare for Your Safari</h3>
                        <p>Pack essentials, check visa and travel requirements, and get ready for an unforgettable
                            experience.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="guidance-card">
                        <h3>6. Enjoy Your Adventure!</h3>
                        <p>Arrive, relax, and immerse yourself in the beauty of Maasai Mara with expert guides.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

       
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

       
    <script>
        $(document).ready(function () {
            $(".hero-slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                nav: false,
                dots: true
            });
        });

        const bookingModal = document.getElementById('bookingModal');
        bookingModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            const title = button.getAttribute('data-title') || '';
            const imageName = button.getAttribute('data-image-name') || '';
            const price = button.getAttribute('data-price') || '';
            const details = button.getAttribute('data-details') || '';

            const imagePath = `/images/${imageName}`;

            bookingModal.querySelector('#modalTitle').textContent = title;
            // bookingModal.querySelector('#modalImage').src = imagePath;
            bookingModal.querySelector('#modalPrice').textContent = price;
            bookingModal.querySelector('#modalDetails').innerHTML = details;

            const encodedTitle = encodeURIComponent(title);
            const encodedPrice = encodeURIComponent(price);
            const bookingUrl = `/booking?title=${encodedTitle}&image=${imageName}&price=${encodedPrice}`;
            bookingModal.querySelector('#modalBookBtn').href = bookingUrl;
        });

        function showDetails(title, desc, image, price, currency) {
            console.log("showDetails called with image:", image, "and currency:", currency);
            const locationImage = document.getElementById('location-image');
            locationImage.style.display = 'block';
            locationImage.style.opacity = 1;
            locationImage.src = image;
            console.log("Image src set to:", locationImage.src);
            document.getElementById('location-title').textContent = title;
            document.getElementById('location-desc').textContent = desc;
            const currencySymbols = {
                KES: 'Kshs',
                USD: '$',
                EUR: '€',
                GBP: '£'
            };
            // Assume `price` is a number and `currency` is a string like 'KES'
            const formattedPrice = new Intl.NumberFormat().format(price);
            const symbol = currencySymbols[currency] || currency; 

            document.getElementById('location-price').innerHTML =
                `Price ranging from <strong>${symbol} ${formattedPrice}</strong> per person depending on month of travel`;
            // You might have a specific element to display currency if needed
            // document.getElementById('currency-display-element').innerText = currency;

            // Update the href of the "Book Now" button
            const bookNowBtn = document.getElementById('bookNowBtn');
            if (bookNowBtn) {
                bookNowBtn.href = `/book-destination?location=${encodeURIComponent(title)}&title=${encodeURIComponent(title)}&image=${encodeURIComponent(image.split('/').pop())}&price=${encodeURIComponent(price)}&desc=${encodeURIComponent(desc)}&currency=${encodeURIComponent(currency)}`;
            }
        }


        document.addEventListener('DOMContentLoaded', () => {
            const firstDestination = @json($destinations[0] ?? null);
            if (firstDestination) {
                showDetails(
                    firstDestination.title,
                    firstDestination.desc,
                    '{{ asset('images / ') }}/' + destination[index].image,
                    firstDestination.price
                );
            }

            // Add event listeners to the small location cards to call showDetails
            const locationCards = document.querySelectorAll('.location-card');
            locationCards.forEach((card, index) => {
                card.addEventListener('click', () => {
                    const destination = @json($destinations);
                    if (destination[index]) {
                        showDetails(
                            destination[index].title,
                            destination[index].desc,
                            '{{ asset('images / ') }}/' + destination[index].image,
                            destination[index].price
                        );
                    }
                });
            });
        });


        function scrollGrid(direction) {
            const grid = document.getElementById('locationsGrid');
            grid.scrollBy({
                left: direction * 540,
                behavior: 'smooth'
            });
        }
    </script>

    @include('layouts.whatsapp')
    @include('layouts.footer')

</body>

</html>