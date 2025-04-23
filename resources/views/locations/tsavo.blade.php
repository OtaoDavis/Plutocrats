<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="BDC Tech">
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
  <meta name="description" content="Explore the Tsavo Safari Packages" />
  <meta name="keywords" content="Tsavo, Safari, Tours" />
  <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/locations.css') }}">

  <title>Tsavo Safari Packages</title>
</head>

<body>
  @include('layouts.nav')

  <section class="hero">
    <div class="owl-carousel owl-theme hero-slider">
      <div class="slide">
        <img src="{{ asset('images/tw-2.webp') }}" alt="Slide 1">
      </div>
      <div class="slide">
        <img src="{{ asset('images/ts-2.webp') }}" alt="Slide 2">
      </div>
      <div class="slide">
        <img src="{{ asset('images/ts-3.webp') }}" alt="Slide 3">
      </div>

    </div>
    <div class="hero-text">
      <h1>Explore Tsavo</h1>
      <p>Embark on an unforgettable safari experience in the vast wilderness of Tsavo, home to diverse wildlife and
        breathtaking landscapes.</p>
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
          'title' => 'FINCH HATTONS & MAHALI MZURI - 7 NIGHTS FLYING SAFARI - TSAVO WEST & MARA COMBINATION',
          'desc' => 'A full week of adventure with luxury stays.',
          'image' => 'mz-1.webp',
          'price' => 1,
          'details' => '
          <p><strong>The ultimate "Out of Africa" safari experience</strong><br>
            Combining two iconic safari camps and two of Kenya\'s most famous game parks. Explore the stunning views of
            Mt. Kilimanjaro and the rolling Chyulu Hills of Kenya\'s largest National Park, Tsavo. Finch Hattons is
            designed in the style of luxury safaris of a bygone era. Fly onto the vast open savannas of the
            world-renowned Maasai Mara National Reserve to the luxury of Sir Richard Branson\'s Kenyan camp, Mahali
            Mzuri, nestled in a valley of the private Olare Motorogi Conservancy which offers the ultimate retreat for
            the last leg of your journey.</p>

          <ul>
            <li>3 Nights at Finch Hattons, Tsavo West National Park</li>
            <li>4 Nights at Mahali Mzuri, Olare Motorogi Conservancy, Maasai Mara</li>
            <li>The above rates are quoted per person, based on a 7-night stay with a minimum of 2 pax per booking.
              Rates for single occupancy and children are available on request.</li>
            <li>Child policy – we welcome children over the age of 6 years.</li>
          </ul>

          <p><strong>RATES INCLUDE:</strong></p>
          <ul>
            <li>Full board accommodation</li>
            <li>Tsavo Park and Motorogi Conservancy fees</li>
            <li>All meals and drinks (excluding premium wines and spirits)</li>
            <li>All transfers to and from camp from the nearest airstrip</li>
            <li>All domestic flights</li>
            <li>Complimentary wireless internet available throughout camp</li>
            <li>Laundry services (excluding dry cleaning)</li>
            <li>All game drives in 4x4 safari vehicle with the assistance of English-speaking driver guides</li>
            <li>Use of spa facilities (excluding treatments)</li>
            <li>Scheduled activities such as sundowners & bush breakfasts</li>
            <li>Kids activities at Finch Hattons and Mahali Mzuri</li>
            <li>All taxes and local levies</li>
          </ul>',
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
              'name' => 'Finch Hattons',
              'desc' => 'Located in Tsavo West National Park, Finch Hattons offers a luxury safari experience inspired
              by the golden era of African safaris. The camp features elegant tented suites, a spa, gourmet dining, and
              stunning views of the Chyulu Hills and Mt. Kilimanjaro. Enjoy guided game drives, nature walks, and
              exclusive bush experiences.',
              'image' => 'fh-2.webp',
              'price' => 00
              ],
              [
              'name' => 'Kilaguni Safari Lodge',
              'desc' => 'Nestled in Tsavo West National Park, Kilaguni Serena is famed for its panoramic views and
              waterhole that attracts wildlife throughout the day. The lodge offers game drives, volcanic landscapes,
              Shetani lava flows, and spectacular sundowners.',
              'image' => 'kilaguni.webp',
              'price' => 00
              ],
              [
              'name' => 'Severin Safari Camp',
              'desc' => 'An eco-friendly luxury camp in the heart of Tsavo West, offering an authentic wilderness
              experience. Spacious tents, a wellness spa, and views of Mount Kilimanjaro await. Ideal for couples and
              families looking for serene, immersive game drives and nature.',
              'image' => 'severin.webp',
              'price' => 00
              ],
              [
              'name' => 'Voyager Ziwani Camp',
              'desc' => 'Located on a private sanctuary on the edge of Tsavo West, Voyager Ziwani offers a tranquil
              safari setting with hippos and crocodiles in the river below. Ideal for family safaris, with guided bush
              walks, night game drives, and cultural experiences.',
              'image' => 'voyager.webp',
              'price' => 00
              ]
              ];
              $chunks = array_chunk($destinations, 4);
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
            <img id="location-image" src="{{ asset('images/fh-2.webp') }}" alt="Location" class="img-fluid rounded mb-3"
              style="height: 250px; object-fit: cover;" />
            <h3 id="location-title">Finch Hattons</h3>
            <p id="location-desc" class="px-4">Located in Tsavo West National Park, Finch Hattons offers a luxury safari
              experience inspired
              by the golden era of African safaris. The camp features elegant tented suites, a spa, gourmet dining, and
              stunning views of the Chyulu Hills and Mt. Kilimanjaro. Enjoy guided game drives, nature walks, and
              exclusive bush experiences.</p>
            <p id="location-price" class="fw-bold mt-2">
              Price ranging from <strong>$00</strong> per person depending on month of travel
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

      const title = button.getAttribute('data-title');
      const desc = button.getAttribute('data-desc');
      const imageName = button.getAttribute('data-image-name');
      const price = button.getAttribute('data-price');
      const details = button.getAttribute('data-details');

      const imagePath = `/images/${imageName}`;

      bookingModal.querySelector('#modalTitle').textContent = title;
      bookingModal.querySelector('#modalDesc').textContent = desc;
      bookingModal.querySelector('#modalImage').src = imagePath;
      bookingModal.querySelector('#modalPrice').textContent = price;
      bookingModal.querySelector('#modalDetails').innerHTML = details;

      const encodedTitle = encodeURIComponent(title);
      const encodedPrice = encodeURIComponent(price);
      const bookingUrl = `/booking?title=${encodedTitle}&image=${imageName}&price=${encodedPrice}`;
      bookingModal.querySelector('#modalBookBtn').href = bookingUrl;
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