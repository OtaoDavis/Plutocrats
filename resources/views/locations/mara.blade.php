<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="BDC Tech">
    <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">
    <meta name="description" content="Explore the Maasai Mara Safari Packages">
    <meta name="keywords" content="Maasai Mara, Safari, Tours">

    <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/locations.css') }}">

    <title>Maasai Mara Safari Packages</title>
</head>

<body>
    @include('layouts.nav')

    <!-- Hero Section -->
    <section class="hero">
        <div class="owl-carousel owl-theme hero-slider">
            <div class="slide"><img src="/images/game_drive2.webp" alt="Game Drive Experience" loading="lazy">
            </div>
            <div class="slide"><img src="{{ asset('images/Maasai-Mara-National-Reserve.webp') }}"
                    alt="Maasai Mara Reserve" loading="lazy"></div>
            <div class="slide"><img src="{{ asset('images/hiking.webp') }}" alt="Hiking Adventure" loading="lazy">
            </div>
        </div>
        <div class="hero-text">
            <h1>Explore the Maasai Mara</h1>
            <p>Experience the adventure of a lifetime in the heart of the African savannah.</p>
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
                    'location' => 'Maasai Mara',
                    'title' => '4 NIGHTS/5 DAYS SAFARIS – NAIROBI & MARA COMBO',
                    'desc' => 'A full week of adventure with luxury stays.',
                    'image' => 'kicheche.webp',
                    'price' => 5,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Day 1: Nairobi</strong><br>
                        Accommodation: Karen Blixen Cottages or Radisson Blu or Crowne Plaza.<br>
                        Meals: Dinner, Breakfast</p>
                    <p><strong>Days 2-5: Masai Mara Game Reserve Safari</strong><br>
                        Transportation: Road or flight, based on preference.<br>
                        Accommodation: Olengoti Safari Camp.<br>
                        Meals: Lunch, Dinner, Breakfast.<br>
                        Experiences: Game drives, Hot Air Balloon Safari, Cultural visits, Nature Walks.<br>
                        Rate: From Kshs. 2,500 per person sharing, depending on month of travel.</p>
                    <p><strong>Cost Includes:</strong><br>
                        • Transport in a customized safari van/4×4 land cruiser for game viewing.<br>
                        • Airport pick-up and drop-off.<br>
                        • Accommodation as per the itinerary.<br>
                        • All meals while on safari.<br>
                        • Services of our professional and knowledgeable driver-guide.<br>
                        • All park entrance fees.<br>
                        • All game drives.<br>
                        • Statutory taxes.<br>
                        • Balloon safari.<br>
                        • Maasai Village visit.</p>
                    <p><strong>Not Included:</strong><br>
                        • Personal insurance.<br>
                        • Items of personal nature.<br>
                        • Alcoholic & soft drinks.<br>
                        • Visa fees.<br>
                        • Tips.</p>
                    ',
                    ],
                    [
                    'location' => 'Maasai Mara',
                    'title' => '5-Day Game Drive Adventure',
                    'desc' => 'Explore the wild side of the Mara with thrilling daily game drives.',
                    'image' => 'game_drive.webp',
                    'price' => 98000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Overview:</strong> Experience the Mara’s rich wildlife over 5 days. Ideal for adventurers
                        seeking full immersion in nature.</p>
                    <p><strong>Includes:</strong> Accommodation, meals, park entry, and two daily game drives.</p>
                    ',
                    ],
                    [
                    'location' => 'Maasai Mara',
                    'title' => '3-Day Budget Safari',
                    'desc' => 'Exciting short getaway that won’t break the bank.',
                    'image' => 'budget.png',
                    'price' => 42000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Highlights:</strong> Affordable shared transport and basic tented camps with essential
                        amenities.<br>
                        Includes all meals and two game drives.</p>
                    ',
                    ],
                    [
                    'location' => 'Maasai Mara',
                    'title' => 'Hot Air Balloon Safari',
                    'desc' => 'Watch the sunrise over the Mara from a hot air balloon.',
                    'image' => 'balloon.jpg',
                    'price' => 58000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Experience:</strong> 1-hour flight at dawn followed by a champagne breakfast in the
                        bush.<br>
                        Includes transport from camp to launch site and back.</p>
                    ',
                    ],
                    [
                    'location' => 'Maasai Mara',
                    'title' => 'Exclusive Charter Safari',
                    'desc' => 'Private charter flights, top-tier guides, and luxury camps.',
                    'image' => 'charter2.webp',
                    'price' => 350000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>For VIPs:</strong> Includes charter flights, private game drives, personal chef, and
                        five-star accommodation.</p>
                    ',
                    ],
                    [
                    'location' => 'Maasai Mara',
                    'title' => 'Big Five Expedition',
                    'desc' => 'Track lions, elephants, buffalo, rhinos, and leopards in action.',
                    'image' => 'big-five.webp',
                    'price' => 110000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Itinerary:</strong> 4-day guided experience focusing on the Big Five sightings. Includes
                        night drives and expert-led tracking tours.</p>
                    ',
                    ],
                    [
                    'location' => 'Maasai Mara',
                    'title' => 'Family Safari',
                    'desc' => 'A family-friendly adventure with safe, fun activities.',
                    'image' => 'hiking.webp',
                    'price' => 88000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Perfect for all ages:</strong> Activities include nature walks, storytelling by the
                        campfire, and junior ranger programs. Family tents available.</p>
                    ',
                    ],
                    [
                    'location' => 'Maasai Mara',
                    'title' => 'Photography Tour',
                    'desc' => 'Guided by a professional photographer to capture the perfect shot.',
                    'image' => 'photography.jpg',
                    'price' => 120000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>For photography lovers:</strong> Dawn and dusk game drives with positioning optimized for
                        lighting. Instruction sessions available.</p>
                    ',
                    ],
                    [
                    'location' => 'Maasai Mara',
                    'title' => 'Honeymoon Safari',
                    'desc' => 'Celebrate love with luxury, privacy, and breathtaking views.',
                    'image' => 'romance.jpg',
                    'price' => 135000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Romantic touches:</strong> Private bush dinners, rose petal turndowns, couples’ spa
                        treatments, and sunset game drives.</p>
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

        <!-- Booking Modal -->
        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingModalLabel">Package Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <img id="modalImage" src="" class="img-fluid rounded mb-3 w-50" alt="Package Image"> -->
                        <h4 id="modalTitle" class="mb-3"></h4>
                        <p><strong>Price:</strong> Kshs. <span id="modalPrice"></span></p>
                        <div id="modalDetails"></div>
                        <a id="modalBookBtn" href="#" class="btn btn-primary mt-3 w-100">Proceed to Booking</a>
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
                            'title' => 'Angama Mara',
                            'desc' => 'Perched on the edge of the Great Rift Valley, this lodge provides
                            breathtaking vistas of the Maasai Mara.',
                            'image' => 'angama.webp',
                            'price' => 00,
                            'currency' => 'KES'
                            ],

                            [
                            'title' => 'Mara Bushtops',
                            'desc' => 'A luxury safari camp offering panoramic views and exceptional
                            service',
                            'image' => 'mara_bush.webp',
                            'price' => 0,
                            'currency' => 'KES'
                            ],

                            [
                            'title' => 'Olare Mara',
                            'desc' => 'A high-end camp located in the Olare Motorogi Conservancy, known for
                            its rich wildlife.',
                            'image' => 'olare.webp',
                            'price' => 00,
                            'currency' => 'KES'
                            ],

                            [
                            'title' => 'Rekero Camp',
                            'desc' => 'Situated in the heart of the Maasai Mara, offering authentic safari
                            experiences.',
                            'image' => 'rekero.webp',
                            'price' => 00,
                            'currency' => 'KES'
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
                        @php
                        $currencySymbols = [
                        'KES' => 'Kshs',
                        'USD' => '$',
                        'EUR' => '€',
                        'GBP' => '£',
                        ];

                        $currency = $destinations[0]['currency'] ?? 'KES'; // Default to KES
                        $symbol = $currencySymbols[$currency] ?? $currency; // Fallback to code if symbol not found
                        @endphp

                        <p id="location-price" class="fw-bold mt-2">
                            Price ranging from <strong>{{ $symbol }} {{ number_format($destinations[0]['price'] ?? 0)
                                }}</strong> per
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
                @foreach ([
                'Choose Your Package' => 'Explore our safari packages and select one that suits your budget and
                preferences.',
                'Confirm Availability' => 'Contact our team to check availability for your preferred travel dates.',
                'Make Your Payment' => 'Secure your booking with a deposit or full payment via our available payment
                options.',
                'Receive Confirmation' => 'Once payment is received, we will send you a confirmation email with all
                details.',
                'Prepare for Your Safari' => 'Pack essentials, check visa and travel requirements, and get ready for an
                unforgettable experience.',
                'Enjoy Your Adventure!' => 'Arrive, relax, and immerse yourself in the beauty of Maasai Mara with expert
                guides.',
                ] as $title => $text)
                <div class="col-md-4">
                    <div class="guidance-card">
                        <h3>{{ $loop->iteration }}. {{ $title }}</h3>
                        <p>{{ $text }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Scripts -->
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
            const formattedPrice = new Intl.NumberFormat().format(price);
            const symbol = currencySymbols[currency] || currency; 
            document.getElementById('location-price').innerHTML =
                `Price ranging from <strong>${symbol} ${formattedPrice}</strong> per person depending on month of travel`;

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