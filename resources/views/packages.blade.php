<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="BDC Tech">
        <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">

        <meta name="description" content="" />
        <meta name="keywords" content="bootstrap, bootstrap4" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="css/daterangepicker.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/pack.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


        <title>Packages</title>
    </head>

    <body>
        @include('layouts.navbar')

        <!-- Top Introduction -->
        <section class="header py-5 text-center">
            <div class="container">
                <h1 class="display-5 fw-bold">Our Best Seller Packages</h1>
                <p class="lead">Choose from our specially curated safari experiences across Kenya's finest
                    destinations.</p>
            </div>
        </section>

        <!-- Package: 4 Nights/5 Days Safari -->
        <section class="py-5 text-white position-relative"
            style="background: url('images/nai.webp') no-repeat center center/cover;">
            <!-- Overlay -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);">
            </div>

            <div class="container position-relative" style="z-index: 1;">
                <div class="row align-items-start mb-4">

                    <!-- Left Column -->
                    <div class="col-md-6 mb-4">
                        <h2 class="fw-bold">4 NIGHTS/5 DAYS SAFARIS – NAIROBI & MARA COMBINATION</h2>
                        <p>
                            This classic safari blends the urban charm of Nairobi with the untamed wilderness of the
                            Masai Mara. Stay in
                            top-tier accommodations in Nairobi before heading out for game drives, a hot air balloon
                            experience, and
                            rich cultural immersions in the Maasai Mara.
                        </p>
                        <p><strong>From Ksh 2,500 per person sharing*</strong></p>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <h5 class="fw-bold">🗺️ Itinerary:</h5>
                        <ul>
                            <li>🏙️ Day 1 - Nairobi (Karen Blixen Cottages / Radisson Blu / Crown Plaza)</li>
                            <li>🦁 Day 2–5 - Masai Mara (Olengoti Safari Camp)</li>
                        </ul>

                        <h5 class="fw-bold mt-3">✔️ Includes:</h5>
                        <ul>
                            <li>🚐 Customized safari van / 4×4 land cruiser</li>
                            <li>🛬 Airport pick-up and drop-off</li>
                            <li>🏨 All accommodation and meals</li>
                            <li>🦓 Game drives and park fees</li>
                            <li>🎈 Balloon Safari & Maasai Village visit</li>
                        </ul>

                        <h5 class="fw-bold mt-3">❌ Excludes:</h5>
                        <ul>
                            <li>💼 Personal Insurance</li>
                            <li>🍷 Drinks & tips</li>
                            <li>🛂 Visa fees</li>
                        </ul>
                    </div>
                </div>

                <!-- Location Cards -->
                <div class="row g-4 justify-content-center mb-4">

                    <!-- karen blixen card -->
                    <div class="col-md-3">
                        <div class="card custom-card shadow-sm border-0 text-white position-relative overflow-hidden"
                            role="button" data-bs-toggle="modal" data-bs-target="#karenBlixenModal"
                            style="height: 200px;">

                            <div class="position-absolute w-100 h-100"
                                style="background: url('images/bx-4.webp') center center / cover no-repeat;"></div>
                            <div class="position-absolute w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4);">
                            </div>

                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <h5 class="card-title fw-bold">Karen Blixen Cottages</h5>
                            </div>

                            <span class="explore-text">View Gallery</span>
                        </div>
                    </div>

                    <!-- radisson blu card -->
                    <div class="col-md-3">
                        <div class="card custom-card h-150 shadow-sm border-0 text-white position-relative overflow-hidden"
                            role="button" data-bs-toggle="modal" data-bs-target="#radissonBluModal"
                            style="height: 200px;">

                            <!-- Background Image -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background: url('images/rd-1.avif') center center / cover no-repeat;"></div>

                            <!-- Overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background-color: rgba(0, 0, 0, 0.4);">
                            </div>

                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <h5 class="card-title mb-0 fw-bold">Radisson Blu</h5>
                            </div>

                            <span class="explore-text">
                                View Gallery
                            </span>

                        </div>
                    </div>

                    <!-- crown-plaza card -->
                    <div class="col-md-3">
                        <div class="card custom-card h-150 shadow-sm border-0 text-white position-relative overflow-hidden"
                            role="button" data-bs-toggle="modal" data-bs-target="#crownPlazaModal"
                            style="height: 200px;">

                            <!-- Background Image -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background: url('images/cr-1.avif') center center / cover no-repeat;"></div>

                            <!-- Overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background-color: rgba(0, 0, 0, 0.4);">
                            </div>

                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <h5 class="card-title mb-0 fw-bold">Crown Plaza</h5>
                            </div>

                            <span class="explore-text">
                                View Gallery
                            </span>

                        </div>
                    </div>
                    <!-- olengoti card -->
                    <div class="col-md-3">
                        <div class="card custom-card h-150 shadow-sm border-0 text-white position-relative overflow-hidden"
                            role="button" data-bs-toggle="modal" data-bs-target="#olengotiModal"
                            style="height: 200px;">

                            <!-- Background Image -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background: url('images/ole-1.webp') center center / cover no-repeat;"></div>

                            <!-- Overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background-color: rgba(0, 0, 0, 0.4);">
                            </div>

                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <h5 class="card-title mb-0 fw-bold">Olengoti Safari Camp</h5>
                            </div>

                            <span class="explore-text">
                                View Gallery
                            </span>
                        </div>
                    </div>

                </div>

                <!-- CTA -->
                <div class="text-center">
                    <a href="#contact" class="btn btn-warning btn-lg">Book Now</a>
                </div>
            </div>
        </section>


        <!-- Package 2 -->
        <!-- Package Section with Background -->
        <section class="py-5 text-white position-relative"
            style="background: url('images/fh-1.webp') no-repeat center center/cover;">
            <!-- Custom RGBA Overlay -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);">
            </div>

            <div class="container position-relative" style="z-index: 1;">
                <div class="row align-items-start mb-4">

                    <!-- Left Column -->
                    <div class="col-md-6 mb-4">
                        <h2 class="fw-bold">7 NIGHTS FLYING SAFARI – FINCH HATTONS & MAHALI MZURI</h2>
                        <p>
                            The ultimate "Out of Africa" safari experience combining two iconic safari camps and two of
                            Kenya's most
                            famous game parks.
                            Explore the stunning views of Mt. Kilimanjaro and the rolling Chyulu Hills of Kenya's
                            largest National Park,
                            Tsavo.
                            Finch Hattons is designed in the style of luxury safaris of a bygone era. Fly onto the vast
                            open savannas of
                            the world renowned
                            Maasai Mara National Reserve to the luxury of Sir Richard Branson's Kenyan camp, Mahali
                            Mzuri, nestled in a
                            valley of the private
                            Olare Motorogi Conservancy which offers the ultimate retreat for the last leg of your
                            journey.
                        </p>
                        <p><strong>From Ksh 6,500 per person sharing*</strong></p>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <h5 class="fw-bold">🗺️ Itinerary:</h5>
                        <ul>
                            <li>🌋 3 Nights - Finch Hattons, Tsavo West</li>
                            <li>🌄 4 Nights - Mahali Mzuri, Maasai Mara</li>
                        </ul>

                        <h5 class="fw-bold mt-3">✔️ Includes:</h5>
                        <ul>
                            <li>🛏️ Full board accommodation</li>
                            <li>🦓 Game drives & park fees</li>
                            <li>🛫 All domestic flights</li>
                            <li>🧴 Spa facility use</li>
                            <li>🧺 Laundry & Wi-Fi</li>
                        </ul>

                        <h5 class="fw-bold mt-3">🧒 Child Policy:</h5>
                        <p>Children above 6 years are welcome. Contact us for special rates.</p>
                    </div>
                </div>

                <div class="row g-4 justify-content-center mb-4">

                    <div class="col-md-3">
                        <div class="card custom-card h-150 shadow-sm border-0 text-white position-relative overflow-hidden"
                            role="button" data-bs-toggle="modal" data-bs-target="#finchHattonsModal"
                            style="height: 200px;">

                            <!-- Background Image -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background: url('images/fh-3.avif') center center / cover no-repeat;"></div>

                            <!-- Overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background-color: rgba(0, 0, 0, 0.4);">
                            </div>

                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <h5 class="card-title mb-0 fw-bold">Finch Hattons</h5>
                            </div>

                            <span class="explore-text">
                                View Gallery
                            </span>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card custom-card h-150 shadow-sm border-0 text-white position-relative overflow-hidden"
                            role="button" data-bs-toggle="modal" data-bs-target="#mahaliMzuriModal"
                            style="height: 200px;">

                            <!-- Background Image -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background: url('images/mz-1.webp') center center / cover no-repeat;"></div>

                            <!-- Overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background-color: rgba(0, 0, 0, 0.4);">
                            </div>

                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <h5 class="card-title mb-0 fw-bold">Mahali Mzuri</h5>
                            </div>

                            <span class="explore-text">
                                View Gallery
                            </span>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card custom-card h-150 shadow-sm border-0 text-white position-relative overflow-hidden"
                            role="button" data-bs-toggle="modal" data-bs-target="#tsavoWestModal"
                            style="height: 200px;">

                            <!-- Background Image -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background: url('images/tw-4.webp') center center / cover no-repeat;"></div>

                            <!-- Overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background-color: rgba(0, 0, 0, 0.4);">
                            </div>

                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <h5 class="card-title mb-0 fw-bold">Tsavo West</h5>
                            </div>

                            <span class="explore-text">
                                View Gallery
                            </span>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card custom-card h-150 shadow-sm border-0 text-white position-relative overflow-hidden"
                            role="button" data-bs-toggle="modal" data-bs-target="#maasaiMaraModal"
                            style="height: 200px;">

                            <!-- Background Image -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background: url('images/mara.webp') center center / cover no-repeat;"></div>

                            <!-- Overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="background-color: rgba(0, 0, 0, 0.4);">
                            </div>

                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <h5 class="card-title mb-0 fw-bold">Maasai Mara</h5>
                            </div>

                            <span class="explore-text">
                                View Gallery
                            </span>

                        </div>
                    </div>

                </div>

                <!-- Book Now Button -->
                <div class="text-center">
                    <a href="#contact" class="btn btn-warning btn-lg">Book Now</a>
                </div>
            </div>
        </section>


        <!-- karen blixen modal -->
        <div class="modal fade" id="karenBlixenModal" tabindex="-1" aria-labelledby="karenBlixenLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="karenBlixenLabel">Karen Blixen</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="karenBlixenCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img src="images/bx-1.webp" class="d-block w-100" alt="Karen Blixen 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/bx-2.avif" class="d-block w-100" alt="Karen Blixen 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/bx-3.webp" class="d-block w-100" alt="Karen Blixen 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/bx-4.webp" class="d-block w-100" alt="Karen Blixen 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/bx-5.webp" class="d-block w-100" alt="Karen Blixen 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/bx-6.webp" class="d-block w-100" alt="Karen Blixen 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/bx-7.webp" class="d-block w-100" alt="Karen Blixen 3">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#karenBlixenCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#karenBlixenCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <p class="mt-3">
                            Discover the charm of the Karen Blixen Museum, once the home of the famed Danish author of
                            *Out of Africa*.
                            Nestled in the serene outskirts of Nairobi, this historic house provides a glimpse into
                            colonial Kenya and
                            Blixen’s remarkable life and legacy.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- radisson-blu modal -->
        <div class="modal fade" id="radissonBluModal" tabindex="-1" aria-labelledby="radissonBluLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="radissonBluLabel">Radisson Blu</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="radissonBluCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img src="images/rd-1.avif" class="d-block w-100" alt="Radisson Blu 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/rd-2.webp" class="d-block w-100" alt="Radisson Blu 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/rd-3.avif" class="d-block w-100" alt="Radisson Blu 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/rd-4.avif" class="d-block w-100" alt="Radisson Blu 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/rd-5.avif" class="d-block w-100" alt="Radisson Blu 5">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#radissonBluCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#radissonBluCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <p class="mt-3">
                            Experience modern luxury at Radisson Blu Nairobi. Ideally located in the heart of the city,
                            this upscale
                            hotel features chic interiors, gourmet dining, serene spa services, and easy access to
                            Nairobi’s major
                            attractions and business hubs.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- crown-plaza modal -->
        <div class="modal fade" id="crownPlazaModal" tabindex="-1" aria-labelledby="crownPlazaLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="crownPlazaLabel">Crown Plaza</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="crownPlazaCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img src="images/cr-1.avif" class="d-block w-100" alt="Crown Plaza 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/cr-2.webp" class="d-block w-100" alt="Crown Plaza 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/cr-3.webp" class="d-block w-100" alt="Crown Plaza 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/cr-4.webp" class="d-block w-100" alt="Crown Plaza 4">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#crownPlazaCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#crownPlazaCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <p class="mt-3">
                            Conveniently located in the heart of Nairobi, Crown Plaza offers a seamless blend of
                            comfort, business, and
                            leisure—
                            perfect for a city stay before or after your safari experience.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- olengoti modal -->
        <div class="modal fade" id="olengotiModal" tabindex="-1" aria-labelledby="olengotiLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="olengotiLabel">Olengoti Safari Camp</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="olengotiCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img src="images/ole-1.webp" class="d-block w-100" alt="Olengoti Safari Camp 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/ole-2.webp" class="d-block w-100" alt="Olengoti Safari Camp 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/ole-3.webp" class="d-block w-100" alt="Olengoti Safari Camp 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/ole-4.webp" class="d-block w-100" alt="Olengoti Safari Camp 4">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#olengotiCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#olengotiCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <p class="mt-3">
                            Nestled along the banks of the Talek River, Olengoti Safari Camp offers an immersive
                            experience in the heart
                            of the Maasai Mara—
                            combining eco-conscious design with authentic wildlife encounters.
                        </p>
                    </div>
                </div>
            </div>
        </div>




        <!-- Finch Hattons Modal -->
        <div class="modal fade" id="finchHattonsModal" tabindex="-1" aria-labelledby="finchHattonsLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="finchHattonsLabel">Finch Hattons</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="finchHattonsCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img src="images/fh-1.webp" class="d-block w-100" alt="Finch Hattons 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/fh-2.webp" class="d-block w-100" alt="Finch Hattons 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/fh-3.avif" class="d-block w-100" alt="Finch Hattons 3">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#finchHattonsCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#finchHattonsCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <p class="mt-3">An elegant safari camp in Tsavo West National Park offering luxury in the
                            wild and sweeping
                            views of Mt. Kilimanjaro.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mahali Mzuri Modal -->
        <div class="modal fade" id="mahaliMzuriModal" tabindex="-1" aria-labelledby="mahaliMzuriLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="mahaliMzuriLabel">Mahali Mzuri</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="mahaliMzuriCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img src="images/mz-1.webp" class="d-block w-100" alt="Mahali Mzuri 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/mz-2.webp" class="d-block w-100" alt="Mahali Mzuri 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/mz-3.webp" class="d-block w-100" alt="Mahali Mzuri 3">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#mahaliMzuriCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#mahaliMzuriCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <p class="mt-3">
                            Sir Richard Branson’s exclusive safari camp in the private Olare Motorogi Conservancy in
                            Maasai Mara.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tsavo West Modal -->
        <div class="modal fade" id="tsavoWestModal" tabindex="-1" aria-labelledby="tsavoWestLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="tsavoWestLabel">Tsavo West</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="tsavoWestCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img src="images/tw-1.webp" class="d-block w-100" alt="Tsavo West 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/tw-4.webp" class="d-block w-100" alt="Tsavo West 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/tw-2.webp" class="d-block w-100" alt="Tsavo West 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/tw-3.webp" class="d-block w-100" alt="Tsavo West 3">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#tsavoWestCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#tsavoWestCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <p class="mt-3">
                            A vast and rugged wilderness with lava flows, the Mzima Springs, and amazing wildlife
                            diversity.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Maasai Mara Modal -->
        <div class="modal fade" id="maasaiMaraModal" tabindex="-1" aria-labelledby="maasaiMaraLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="maasaiMaraLabel">Maasai Mara</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="maasaiMaraCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img src="images/Mara.webp" class="d-block w-100" alt="Maasai Mara 1">
                                </div>
                                <div class="carousel-inner rounded">
                                    <div class="carousel-item active">
                                        <img src="images/game_drive2.webp" class="d-block w-100" alt="Maasai Mara 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/Maasai-Mara-National-Reserve.webp" class="d-block w-100"
                                            alt="Maasai Mara 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/olare.webp" class="d-block w-100" alt="Maasai Mara 3">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/mara_bush.webp" class="d-block w-100" alt="Maasai Mara 3">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#maasaiMaraCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#maasaiMaraCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <p class="mt-3">One of Africa’s most iconic wildlife destinations, the Maasai Mara offers
                                dramatic
                                landscapes,
                                abundant game viewing, and the annual Great Migration.</p>
                        </div>
                    </div>
                </div>
            </div>





            @include('layouts.footer')
    </body>

</html>
