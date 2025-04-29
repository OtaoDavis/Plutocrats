<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta name="description" content="Explore the Maasai Mara Safari Packages" />
    <meta name="keywords" content="Maasai Mara, Safari, Tours" />

    <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/locations.css') }}">

    <title>Ol Pejeta Safari Packages</title>
</head>

<body>
    @include('layouts.nav')

    <section class="hero">
        <div class="owl-carousel owl-theme hero-slider">
            <div class="slide">
                <img src="/images/pej-1.webp" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="{{ asset('images/pej-2.webp') }}" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="{{ asset('images/pej-3.webp') }}" alt="Slide 4">
            </div>
        </div>
        <div class="hero-text">
            <h1>Explore Ol Pejeta</h1>
            <p>Venture into Ol Pejeta Conservancy, a unique blend of safari adventure and cutting-edge conservation.
                Nestled
                between the foothills of the Aberdares and Mount Kenya, Ol Pejeta is home to the Big Five and the
                last two
                remaining northern white rhinos on the planet. Experience thrilling game drives, visit the
                chimpanzee sanctuary,
                and witness impactful conservation efforts in one of Kenya’s most remarkable wildlife destinations.
            </p>


        </div>
    </section>


    <!-- Packages Section -->
    <section class="packages">
        <div class="container">
            <h2 class="locations-title text-center">Safari Packages</h2>
            <div class="packages-wrapper">
                <button class="scroll-btn-left" aria-label="Scroll Left">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>

                <div class="packages-scroll">
                    @foreach ([
                    [
                    'title' => 'Hot Air Balloon Safari',
                    'desc' => 'Experience the Mara from above at sunrise.',
                    'image' => 'balloon.jpg',
                    'price' => 150000,
                    'details' => '
                    to be added',
                    ],
                    [
                    'title' => '5-Day Game Drive',
                    'desc' => 'Enjoy thrilling game drives across the Mara.',
                    'image' => 'game_drive.webp',
                    'price' => 180000,
                    'details' => '
                    to be added',
                    ],
                    [
                    'title' => '3-Day Budget Safari',
                    'desc' => 'Affordable and exciting short safari experience.',
                    'image' => 'budget.png',
                    'price' => 90000,
                    'details' => '
                    to be added',
                    ],
                    [
                    'title' => 'Hot Air Balloon Safari',
                    'desc' => 'Experience the Mara from above at sunrise.',
                    'image' => 'balloon.jpg',
                    'price' => 150000,
                    'details' => '
                    to be added',
                    ],
                    [
                    'title' => 'Exclusive Charter Safari',
                    'desc' => 'Private charter flights for a VIP safari.',
                    'image' => 'charter2.webp',
                    'price' => 500000,
                    'details' => '
                    to be added',
                    ],
                    [
                    'title' => 'Big Five Expedition',
                    'desc' => 'Track the legendary Big Five in their natural habitat.',
                    'image' => 'big-five.webp',
                    'price' => 200000,
                    'details' => '
                    to be added',
                    ],
                    [
                    'title' => 'Family Safari',
                    'desc' => 'Tailored packages for a fun family adventure.',
                    'image' => 'hiking.webp',
                    'price' => 160000,
                    'details' => '
                    to be added',
                    ],
                    [
                    'title' => 'Photography Tour',
                    'desc' => 'Perfect for wildlife photographers and nature lovers.',
                    'image' => 'photography.jpg',
                    'price' => 175000,
                    'details' => '
                    to be added',
                    ],
                    [
                    'title' => 'Honeymoon Safari',
                    'desc' => 'Romantic getaway amidst the beauty of the Mara.',
                    'image' => 'romance.jpg',
                    'price' => 220000,
                    'details' => '
                    to be added',
                    ],
                    ] as $package)
                    <div class="package-card" data-bs-toggle="modal" data-bs-target="#bookingModal"
                        data-title="{{ $package['title'] }}" data-desc="{{ $package['desc'] }}"
                        data-image-name="{{ $package['image'] }}" data-price="{{ $package['price'] }}"
                        data-details="{{ $package['details'] }}"
                        style="background-image: url('{{ asset('images/' . $package['image']) }}');">
                        <div class="overlay">
                            <h3>{{ $package['title'] }}</h3>
                            <p>{{ $package['desc'] }}</p>
                            <span class="book-text" role="button">
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

        <!-- Booking Modal -->
        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingModalLabel">Package Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-6">
                            <img id="modalImage" src="" class="img-fluid rounded mb-3" alt="Package Image">
                        </div>
                        <div class="col-md-6">
                            <h4 id="modalTitle"></h4>
                            <p id="modalDesc"></p>
                            <p><strong>Price:</strong> Kshs. <span id="modalPrice"></span></p>
                            <div id="modalDetails"></div>
                            <a id="modalBookBtn" href="#" class="btn btn-primary mt-3 w-100">Proceed to
                                Booking</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Destinations Section -->
    <section class="top-destinations">
        <div class="container">
            <h2 class="locations-title text-center">Top Destinations</h2>
            <div class="row">
                <!-- Left Side: Location Grid -->
                <div class="col-md-6 position-relative">
                    <!-- Left Arrow -->
                    <button class="scroll-btn left" onclick="scrollGrid(-1)">&#10094;</button>

                    <div class="locations-grid-wrapper overflow-hidden">
                        <div class="locations-grid d-flex flex-nowrap" id="locationsGrid">
                            @php
                            $destinations = [
                            [
                            'title' => 'Sweet Waters Camp',
                            'desc' => 'Sweetwaters Camp location within the Ol Pejeta Conservancy
                            enables you to take part in everything from game drives and lion tracking to scenic bird
                            walks along the
                            river. These spacious tents combine the traditional ambiance of a safari camp with the
                            comforts of home.
                            ',
                            'image' => 'sweet_waters.webp',
                            'price' => 500,
                            'currency' => 'USD',
                            ],

                            [
                            'title' => 'The River Camp',
                            'desc' => 'The River Camp is a luxurious safari retreat located within
                            Kenya\'s Ol Pejeta Conservancy, nestled along the serene Ngobit River. The camp offers six
                            double ensuite
                            guest tents and two family suites, accommodating up to 20 guests, ensuring an intimate and
                            exclusive
                            experience. Each tent features private decks with views of the river, as well as indoor and
                            outdoor
                            showers. ',
                            'image' => 'river_camp.webp',
                            'price' => 400,
                            'currency' => 'USD',
                            ],

                            [
                            'title' => 'Ol Pejeta Bush Camp',
                            'desc' => 'With only 8 tents, that are spacious and comfortable canvas
                            tents along the Ewaso Ngiro River, where elephants are frequently seen from camp, you can
                            relax and take
                            in the iconic landscapes and stunning backdrop views of Mount Kenya while observing the
                            rarest African
                            wildlife. Additionally, you can enjoy superb general game viewing and get involved in
                            activities such as
                            canine training or recording lion sightings for the research team.',
                            'image' => 'bush_camp.webp',
                            'price' => 500,
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

                    <!-- Right Arrow -->
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
                                ]) }}" class="btn btn-primary mt-3">
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

        function showDetails(title, desc, image, price, currency) {
            console.log("showDetails called with image:", image, "and currency:", currency);
            const locationImage = document.getElementById('location-image');
            locationImage.style.display = 'block';
            locationImage.style.opacity = 1;
            locationImage.src = image;
            console.log("Image src set to:", locationImage.src);
            document.getElementById('location-title').textContent = title;
            document.getElementById('location-desc').textContent = desc;
            document.getElementById('location-price').innerHTML = `Price ranging from <strong>$ ${price}</strong> per person depending on month of travel`;
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