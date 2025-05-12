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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/locations.css') }}">

    <title>Amboseli Safari Packages</title>
</head>

<body>
    @include('layouts.nav')

    <section class="hero">
        <div class="owl-carousel owl-theme hero-slider">
            <div class="slide">
                <img src="/images/amboseli_1.webp" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="{{ asset('images/amboseli_2.webp') }}" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="{{ asset('images/amboseli_4.webp') }}" alt="Slide 4">
            </div>
            <div class="slide">
                <img src="{{ asset('images/amboseli_5.webp') }}" alt="Slide 5">
            </div>

        </div>
        <div class="hero-text">
            <h1>Explore Amboseli</h1>
            <p>Discover the majestic beauty of Amboseli, where vast open plains meet the iconic backdrop of Mount
                Kilimanjaro.
                Experience close encounters with elephants and other wildlife in one of Kenya’s most scenic national
                parks.</p>

        </div>
    </section>


    <!-- Packages Section -->
    <section class="packages">
        <div class="container">
            <h2 class="locations-title text-center">Safari Packages</h2>
            <div class="packages-wrapper">
                <button class="scroll-btn-left">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>

                <div class="packages-scroll">
                    @foreach ([
                    [
                    'location' => 'Amboseli',
                    'title' => '4-Day Kilimanjaro View Safari',
                    'desc' => 'Unmatched views of Mt. Kilimanjaro with game drives in elephant territory.',
                    'image' => 'kicheche.webp',
                    'price' => 88000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Overview:</strong> Explore Amboseli’s breathtaking landscapes and wildlife, with a
                        spectacular view of Mount Kilimanjaro. This safari includes full-day game drives and visits to
                        the Amboseli National Park.</p>
                    <p><strong>Includes:</strong> Accommodation, meals, park entry, two daily game drives, and Mount
                        Kilimanjaro photo opportunities.</p>',
                    ],
                    [
                    'location' => 'Amboseli',
                    'title' => '3-Day Amboseli Plains Drive',
                    'desc' => 'Explore the wild side of Amboseli with thrilling game drives.',
                    'image' => 'game_drive.webp',
                    'price' => 65000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Highlights:</strong> A 3-day safari exploring Amboseli’s vast plains and wetlands, home
                        to elephant herds and diverse bird species. Includes 4x4 game drives and cultural visits.</p>
                    <p><strong>Includes:</strong> Accommodation, meals, park entry, two game drives per day, and a
                        cultural experience.</p>',
                    ],
                    [
                    'location' => 'Amboseli',
                    'title' => '2-Night Budget Amboseli Trip',
                    'desc' => 'Affordable and exciting short getaway with daily game drives.',
                    'image' => 'budget.png',
                    'price' => 40000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Highlights:</strong> Affordable yet thrilling safari for budget-conscious travelers.
                        Includes basic tented camps and game drives with the chance to spot lions, elephants, and other
                        wildlife.</p>
                    <p><strong>Includes:</strong> Accommodation, meals, park entry, and two daily game drives.</p>',
                    ],
                    [
                    'location' => 'Amboseli',
                    'title' => 'Hot Air Balloon Safari',
                    'desc' => 'Experience Amboseli from above during sunrise with a balloon ride.',
                    'image' => 'balloon.jpg',
                    'price' => 120000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Experience:</strong> 1-hour flight at dawn followed by a champagne breakfast in the bush.
                        Enjoy spectacular aerial views of the elephants and the majestic Mount Kilimanjaro.</p>
                    <p><strong>Includes:</strong> Balloon flight, breakfast, transport to the launch site, and a game
                        drive afterward.</p>',
                    ],
                    [
                    'location' => 'Amboseli',
                    'title' => 'Private Fly-in Safari Package',
                    'desc' => 'Charter flight to Amboseli with all-inclusive luxury safari.',
                    'image' => 'charter2.webp',
                    'price' => 310000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>For VIPs:</strong> Includes charter flights to Amboseli, luxury accommodation,
                        personalized game drives, a private chef, and exclusive experiences tailored to your
                        preferences.</p>
                    <p><strong>Includes:</strong> Private flights, all meals, accommodation, and a private guide for
                        your safari.</p>',
                    ],
                    [
                    'location' => 'Amboseli',
                    'title' => 'Elephant Corridor Expedition',
                    'desc' => 'Track massive elephant herds across Amboseli’s iconic corridors.',
                    'image' => 'big-five.webp',
                    'price' => 97000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Itinerary:</strong> A 4-day expedition focused on the famous elephant herds of Amboseli.
                        Includes game drives, nature walks, and educational talks about elephant conservation.</p>
                    <p><strong>Includes:</strong> Accommodation, meals, park entry, and daily game drives focused on
                        elephant sightings.</p>',
                    ],
                    [
                    'location' => 'Amboseli',
                    'title' => 'Family Safari',
                    'desc' => 'A family-friendly adventure with safe, fun activities.',
                    'image' => 'hiking.webp',
                    'price' => 86000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Perfect for all ages:</strong> Family-friendly accommodations and activities such as
                        nature walks, storytelling by the campfire, and fun games for kids.</p>
                    <p><strong>Includes:</strong> Accommodation, meals, two daily game drives, and family-focused
                        activities.</p>',
                    ],
                    [
                    'location' => 'Amboseli',
                    'title' => 'Photography Safari',
                    'desc' => 'Capture the beauty of Amboseli with a professional photographer guiding you.',
                    'image' => 'photography.jpg',
                    'price' => 99000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>For photography lovers:</strong> Enjoy dawn and dusk game drives in prime photo
                        locations. Professional photographer available to assist with tips and techniques.</p>
                    <p><strong>Includes:</strong> Accommodation, meals, park entry, and two daily game drives with
                        photography assistance.</p>',
                    ],
                    [
                    'location' => 'Amboseli',
                    'title' => 'Romantic Amboseli Escape',
                    'desc' => 'A luxury couples’ retreat with breathtaking views and personalized services.',
                    'image' => 'romance.jpg',
                    'price' => 125000,
                    'currency' => 'KES',
                    'details' => '
                    <p><strong>Romantic Touches:</strong> Exclusive experiences such as private bush dinners, sunset
                        game drives, and couples’ spa treatments. Perfect for honeymooners or a special getaway.</p>
                    <p><strong>Includes:</strong> All meals, luxury accommodation, private game drives, and spa
                        treatments.</p>',
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

                <button class="scroll-btn-right">
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
                            'title' => 'Tawi Lodge',
                            'desc' => 'With only 13 cottages set on either side of the main lodge building,
                            all cottages have a spectacular view of Mt. Kilimanjaro. Tawi Lodge is located on a private
                            conservancy of
                            3,000 acres, just five minutes from Kimana Gate, the eastern entrance to Amboseli National
                            Park, at the
                            foot of Mount Kilimanjaro (5,895m) – the world’s largest free-standing mountain.',
                            'image' => 'tawi_lodge.webp',
                            'price' => 330,
                            'currency' => 'USD',
                            ],

                            [
                            'title' => 'Tulia Camp',
                            'desc' => 'Named after the Swahili word for ‘peaceful’, the Tulia Amboseli Camp
                            depicts just this in its classic and cozy design and tranquil setting. Tulia Camp is located
                            just outside
                            Amboseli National Park and comprises 20 classic, large tents all offering amazing views of
                            Mt.
                            Kilimanjaro.
                            A waterhole lies in front of the lodge offering entertainment to guests either dining in the
                            intimate
                            canvas-walled and reeded roof restaurant, or relaxing in the lounge. With great sunset
                            views, sundowners
                            around the campfire is a popular activity for guests enjoying their stay at Tulia Amboseli
                            Camp
                            the Swahili word for ‘peaceful’, the Tulia Amboseli Camp
                            depicts just this in its classic and cozy design and tranquil setting...',
                            'image' => 'tulia_camp.webp',
                            'price' => 0,
                            'currency' => 'USD',
                            ],

                            [
                            'title' => 'ELEWANA TORTILIS',
                            'desc' => 'Tortilis Camp was one of the first eco-lodges of its size, and
                            is very proudly 100% solar. Guests can rest assured they are leaving a minimal footprint
                            during their
                            stay.
                            Located in a private conservancy bordering the national park, game drives, walks, sundowners
                            and bush
                            meals take place both inside the national park and in the conservancy, where guests enjoy
                            exclusivity.
                            The tents are all spacious, with king or twin beds and elegant en suite bathrooms. There is
                            a main lounge,
                            bar and dining area, all exquisitely built with natural materials and thatched roofs. The
                            Private House
                            and Family Tent are located slightly separate to the main camp, upon the hill where they
                            share a pool.
                            ',
                            'image' => 'elewana.webp',
                            'price' => 330,
                            'currency' => 'USD',
                            ],

                            [
                            'title' => 'Rekero Camp',
                            'desc' => 'Intimate safari experience by the Talek River.',
                            'image' => 'rekero.webp',
                            'price' => 400,
                            'currency' => 'USD',
                            ],

                            [
                            'title' => 'Ol Tukai Lodge',
                            'desc' => 'Situated in the heart of Amboseli National Park, Ol Tukai Lodge offers stunning
                            views of Mount
                            Kilimanjaro and is considered one of the best spots in the world to watch elephants in their
                            natural
                            habitat. The lodge features elegant chalet-style rooms, fine dining, a pool, and
                            nature-inspired wellness
                            experiences.',
                            'image' => 'oltukai.webp',
                            'price' => 00,
                            'currency' => 'USD',
                            ],

                            [
                            'title' => 'Kibo Safari Camp',
                            'desc' => 'Kibo Safari Camp is a tented camp located at the foot of Mt. Kilimanjaro, just
                            outside the
                            Amboseli National Park gate. Each tent is self-contained with a rustic yet comfortable feel,
                            offering a
                            perfect blend of adventure and relaxation. Guests enjoy bush dinners, Maasai dance, and game
                            drives with
                            expert guides.',
                            'image' => 'kibo.webp',
                            'price' => 00,
                            'currency' => 'USD',
                            ],

                            [
                            'title' => 'Angama Amboseli',
                            'desc' => 'Located in the private Kimana Sanctuary, Angama Amboseli offers a luxurious and
                            intimate safari
                            experience. With uninterrupted views of Kilimanjaro and rich wildlife sightings, this newly
                            opened camp
                            provides modern elegance, personalized service, and a strong conservation focus. Ideal for
                            honeymooners
                            and luxury travelers.',
                            'image' => 'angama_ambo.webp',
                            'price' => 00,
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