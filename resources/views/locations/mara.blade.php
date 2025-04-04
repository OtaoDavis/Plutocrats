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

  <title>Maasai Mara Safari Packages</title>
</head>

<body>
  @include('layouts.nav')

  <section class="hero">
    <div class="owl-carousel owl-theme hero-slider">
      <div class="slide">
        <img src="/images/game_drive2.webp" alt="Slide 1">
      </div>
      <div class="slide">
        <img src="{{ asset('images/Maasai-Mara-National-Reserve.webp') }}" alt="Slide 2">
      </div>
      <div class="slide">
        <img src="{{ asset('images/hiking.webp') }}" alt="Slide 3">
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
        <button class="scroll-btn-left">
          <i class="fa-solid fa-arrow-left"></i>
        </button>
        <div class="packages-scroll">
          @foreach ([
          ['title' => '7-Day Luxury Safari', 'desc' => 'A full week of adventure with luxury stays.', 'image' =>
          'kicheche.webp'],
          ['title' => '5-Day Game Drive', 'desc' => 'Enjoy thrilling game drives across the Mara.', 'image' =>
          'game_drive.webp'],
          ['title' => '3-Day Budget Safari', 'desc' => 'Affordable and exciting short safari experience.', 'image' =>
          'budget.png'],
          ['title' => 'Hot Air Balloon Safari', 'desc' => 'Experience the Mara from above at sunrise.', 'image' =>
          'balloon.jpg'],
          ['title' => 'Exclusive Charter Safari', 'desc' => 'Private charter flights for a VIP safari.', 'image' =>
          'charter2.webp'],
          ['title' => 'Big Five Expedition', 'desc' => 'Track the legendary Big Five in their natural habitat.', 'image'
          => 'big-five.webp'],
          ['title' => 'Family Safari', 'desc' => 'Tailored packages for a fun family adventure.', 'image' =>
          'hiking.webp'],
          ['title' => 'Photography Tour', 'desc' => 'Perfect for wildlife photographers and nature lovers.', 'image' =>
          'photography.jpg'],
          ['title' => 'Honeymoon Safari', 'desc' => 'Romantic getaway amidst the beauty of the Mara.', 'image' =>
          'romance.jpg'],
          ] as $package)
          <div class="package-card" style="background-image: url('{{ asset('images/' . $package['image']) }}');">
            <div class="overlay">
              <h3>{{ $package['title'] }}</h3>
              <p>{{ $package['desc'] }}</p>
              <a href="{{ route('booking.page', ['title' => urlencode($package['title']), 'image' => $package['image']]) }}"
                class="book-btn">Book Now</a>
            </div>
          </div>
          @endforeach
        </div>
        <button class="scroll-btn-right">
          <i class="fa-solid fa-arrow-right"></i>
        </button>
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
          <button class="scroll-btn left" onclick="scrollGrid(-1)">&#10094;</button>

          <div class="locations-grid-wrapper">
            <div class="locations-grid">
                @foreach ([
                    ['name' => 'Angama Mara', 'desc' => 'Perched on the edge of the Great Rift Valley, this lodge provides breathtaking vistas of the Maasai Mara.', 'image' => 'angama.webp'],
                    ['name' => 'Mara Bushtops', 'desc' => 'A luxury safari camp offering panoramic views and exceptional service.', 'image' => 'mara_bush.webp'],
                    ['name' => 'Olare Mara', 'desc' => 'A high-end camp located in the Olare Motorogi Conservancy, known for its rich wildlife.', 'image' => 'olare.webp'],
                    ['name' => 'Rekero Camp', 'desc' => 'Situated in the heart of the Maasai Mara, offering authentic safari experiences.', 'image' => 'rekero.webp'],
                ] as $destination)
                <div class="location-card"
                    onclick="showDetails('{{ addslashes($destination['name']) }}', '{{ addslashes($destination['desc']) }}', '{{ asset('images/' . $destination['image']) }}')">
                    <img src="{{ asset('images/' . $destination['image']) }}" alt="{{ $destination['name'] }}">
                    <h3>{{ $destination['name'] }}</h3>
                </div>
                @endforeach
            </div>
        </div>
        

          <!-- Right Arrow -->
          <button class="scroll-btn right" onclick="scrollGrid(1)">&#10095;</button>
        </div>

        <!-- Right Side: Dynamic Detail Display -->
        <div class="col-md-6">
          <div class="location-details">
            <img id="location-image" src="{{ asset('images/angama.webp') }}" alt="Location">
            <h3 id="location-title">Angama Mara</h3>
            <p id="location-desc">Perched on the edge of the Great Rift Valley, this lodge provides breathtaking vistas
              of the Maasai Mara.</p>
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

    function showDetails(name, desc, image) {
      console.log('showDetails called with:', name, desc, image);  // Log the parameters
      document.getElementById("location-title").innerText = name;
      document.getElementById("location-desc").innerText = desc;
      document.getElementById("location-image").src = image;
    }


    // Scroll the locations grid left or right
    function scrollGrid(direction) {
      let container = document.querySelector(".locations-grid-wrapper");
      let scrollAmount = container.offsetWidth;
      container.scrollLeft += direction * scrollAmount;
    }
  </script>

  @include('layouts.footer')

</body>

</html>