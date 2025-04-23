<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
  <meta name="description" content="Explore the Maasai Mara Safari Packages" />
  <meta name="keywords" content="Maasai Mara, Safari, Tours" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


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
      <p>Discover the majestic beauty of Amboseli, where vast open plains meet the iconic backdrop of Mount Kilimanjaro.
        Experience close encounters with elephants and other wildlife in one of Kenya’s most scenic national parks.</p>

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
          ['title' => '7-Day Luxury Safari', 'desc' => 'A full week of adventure with luxury stays.', 'image' =>
          'kicheche.webp', 'price' => 250000],
          ['title' => '5-Day Game Drive', 'desc' => 'Enjoy thrilling game drives across the Mara.', 'image' =>
          'game_drive.webp', 'price' => 180000],
          ['title' => '3-Day Budget Safari', 'desc' => 'Affordable and exciting short safari experience.', 'image' =>
          'budget.png', 'price' => 90000],
          ['title' => 'Hot Air Balloon Safari', 'desc' => 'Experience the Mara from above at sunrise.', 'image' =>
          'balloon.jpg', 'price' => 150000],
          ['title' => 'Exclusive Charter Safari', 'desc' => 'Private charter flights for a VIP safari.', 'image' =>
          'charter2.webp', 'price' => 500000],
          ['title' => 'Big Five Expedition', 'desc' => 'Track the legendary Big Five in their natural habitat.', 'image'
          => 'big-five.webp', 'price' => 200000],
          ['title' => 'Family Safari', 'desc' => 'Tailored packages for a fun family adventure.', 'image' =>
          'hiking.webp', 'price' => 160000],
          ['title' => 'Photography Tour', 'desc' => 'Perfect for wildlife photographers and nature lovers.', 'image' =>
          'photography.jpg', 'price' => 175000],
          ['title' => 'Honeymoon Safari', 'desc' => 'Romantic getaway amidst the beauty of the Mara.', 'image' =>
          'romance.jpg', 'price' => 220000]
          ] as $package)
          <div class="package-card" data-bs-toggle="modal" data-bs-target="#bookingModal"
            data-title="{{ $package['title'] }}" data-desc="{{ $package['desc'] }}"
            data-image-name="{{ $package['image'] }}" data-price="{{ $package['price'] }}"
            style="background-image: url('{{ asset('images/' . $package['image']) }}');">
            <div class="overlay">
              <h3>{{ $package['title'] }}</h3>
              <p>{{ $package['desc'] }}</p>
              <span class="book-text" data-bs-toggle="modal" data-bs-target="#bookingModal"
                data-title="{{ $package['title'] }}" data-desc="{{ $package['desc'] }}"
                data-image-name="{{ $package['image'] }}" data-price="{{ $package['price'] }}">
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
          <div class="modal-body row">
            <div class="col-md-6">
              <img id="modalImage" src="" class="img-fluid rounded mb-3" alt="Package Image">
            </div>
            <div class="col-md-6">
              <h4 id="modalTitle"></h4>
              <p id="modalDesc"></p>
              <p><strong>Price:</strong> Kshs. <span id="modalPrice"></span></p>
              <a id="modalBookBtn" href="#" class="btn btn-primary mt-3 w-100">Proceed to Booking</a>
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
              ['name' => 'Tawi Lodge', 'desc' => 'With only 13 cottages set on either side of the main lodge building,
              all cottages have a spectacular view of Mt. Kilimanjaro. Tawi Lodge is located on a private conservancy of
              3,000 acres, just five minutes from Kimana Gate, the eastern entrance to Amboseli National Park, at the
              foot of Mount Kilimanjaro (5,895m) – the world’s largest free-standing mountain.', 'image' =>
              'tawi_lodge.webp', 'price' => 330],

              ['name' => 'Tulia Camp', 'desc' => 'Named after the Swahili word for ‘peaceful’, the Tulia Amboseli Camp
              depicts just this in its classic and cozy design and tranquil setting. Tulia Camp is located just outside
              Amboseli National Park and comprises 20 classic, large tents all offering amazing views of Mt.
              Kilimanjaro.
              A waterhole lies in front of the lodge offering entertainment to guests either dining in the intimate
              canvas-walled and reeded roof restaurant, or relaxing in the lounge. With great sunset views, sundowners
              around the campfire is a popular activity for guests enjoying their stay at Tulia Amboseli Camp
              the Swahili word for ‘peaceful’, the Tulia Amboseli Camp
              depicts just this in its classic and cozy design and tranquil setting...', 'image' => 'tulia_camp.webp',
              'price' => 0],

              ['name' => 'ELEWANA TORTILIS', 'desc' => 'Tortilis Camp was one of the first eco-lodges of its size, and
              is very proudly 100% solar. Guests can rest assured they are leaving a minimal footprint during their
              stay.
              Located in a private conservancy bordering the national park, game drives, walks, sundowners and bush
              meals take place both inside the national park and in the conservancy, where guests enjoy exclusivity.
              The tents are all spacious, with king or twin beds and elegant en suite bathrooms. There is a main lounge,
              bar and dining area, all exquisitely built with natural materials and thatched roofs. The Private House
              and Family Tent are located slightly separate to the main camp, upon the hill where they share a pool.
              ', 'image' => 'elewana.webp', 'price' => 330],

              ['name' => 'Rekero Camp', 'desc' => 'Intimate safari experience by the Talek River.', 'image' =>
              'rekero.webp', 'price' => 400]
              ];
              $chunks = array_chunk($destinations, 4); // 2x2 layout = 4 cards per scroll "page"
              @endphp

              @foreach ($chunks as $chunk)
              <div class="grid-page d-flex flex-wrap me-4" style="width: 520px;">
                @foreach ($chunk as $destination)
                <div class="location-card m-2 flex-shrink-0" onclick="showDetails(
                      '{{ $destination['name'] }}',
                      `{{ addslashes($destination['desc']) }}`,
                      '{{ asset('images/' . $destination['image']) }}',
                      '{{ number_format($destination['price']) }}'
                    )" style="width: 240px; height: 260px; cursor: pointer;">
                  <img src="{{ asset('images/' . $destination['image']) }}" alt="{{ $destination['name'] }}"
                    class="img-fluid rounded mb-2" style="height: 150px; object-fit: cover;">
                  <h5 class="text-center mb-1">{{ $destination['name'] }}</h5>
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
            <img id="location-image" src="{{ asset('images/tawi_lodge.webp') }}" alt="Location"
              class="img-fluid rounded mb-3" style="height: 250px; object-fit: cover;" />
            <h3 id="location-title">Tawi Lodge</h3>
            <p id="location-desc" class="px-4">With only 13 cottages set on either side of the main lodge building, all
              cottages have
              a spectacular view of Mt. Kilimanjaro. Tawi Lodge is located on a private conservancy of 3,000 acres, just
              five minutes from Kimana Gate, the eastern entrance to Amboseli National Park, at the foot of Mount
              Kilimanjaro (5,895m) – the worlds’ largest free-standing mountain. Staying at Tawi, you get the best of
              both worlds, a private conservancy and swift access to the one of Kenya’s most unique national parks. </p>
            <p id="location-price" class="fw-bold mt-2">
              Price ranging from <strong>$330</strong> per person depending on month of travel
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>






  <!-- Booking Guidance Section -->
  <section class="booking-guidance">
    <div class="container">
      <h2 class="locations-title text-center">Booking Guidance</h2>
      <p class="text-center">Planning your Maasai Mara adventure? Follow these steps to secure your dream safari.</p>

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
            <p>Pack essentials, check visa and travel requirements, and get ready for an unforgettable experience.</p>
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
      console.log("Owl Carousel initializing...");
      $(".hero-slider").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        nav: false,
        dots: true
      });
    });

    function showDetails(name, desc, image, price) {
      document.getElementById('location-title').textContent = name;
      document.getElementById('location-desc').textContent = desc;
      document.getElementById('location-image').src = image;
      document.getElementById('location-price').innerHTML = `Price ranging from <strong>$${price}</strong> per person depending on month of travel`;
    }

    function scrollGrid(direction) {
      const grid = document.getElementById('locationsGrid');
      grid.scrollBy({
        left: direction * 540,
        behavior: 'smooth'
      });
    }
  </script>

  @include('layouts.footer')

</body>

</html>