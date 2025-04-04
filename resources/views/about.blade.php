<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

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
    <link rel="stylesheet" href="css/style.css">

    <title>Tour</title>
</head>

<body>


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    @include('layouts.nav')


    <div class="hero2"
        style="background: url('{{ asset('images/about.jpeg') }}') no-repeat center center; background-size: cover; padding: 7rem 0 10rem 0; background-position: center -20em;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">About Us</h1>
                        <p class="about-text">We are a passionate team dedicated to delivering the best tours and
                            travel experiences. Whether you're looking to explore majestic safaris, hidden gems, or
                            breathtaking destinations, we are here to make your journey unforgettable. With years of
                            expertise, we curate unforgettable memories for every traveler.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="owl-single dots-absolute owl-carousel">
                        <img src="images/cheetah.webp" alt="Adventure Awaits" class="img-fluid rounded-20">
                        <img src="images/elephants.webp" alt="Explore the World" class="img-fluid rounded-20">
                        <img src="images/about.jpeg" alt="Amazing Destinations" class="img-fluid rounded-20">
                        <img src="images/amboseli.webp" alt="Unforgettable Safaris" class="img-fluid rounded-20">
                        <!-- <img src="images/slider-5.jpg" alt="Luxury Escapes" class="img-fluid rounded-20"> -->
                    </div>
                </div>
                <div class="col-lg-5 pl-lg-5 ml-auto">
                    <h2 class="section-title mb-4">Who We Are</h2>
                    <p>Our company is built around the idea of sharing incredible travel experiences with people who
                        seek adventure, culture, and relaxation. We pride ourselves on offering tailored experiences
                        that suit the unique needs of each traveler. From serene beach resorts to thrilling safaris,
                        our team ensures your trips are memorable.</p>
                    <ul class="list-unstyled two-col clearfix">
                        <li>Expert Tour Guides</li>
                        <li>Custom Travel Packages</li>
                        <li>Luxury Accommodations</li>
                        <li>Exclusive Access to Destinations</li>
                        <li>Safety and Comfort</li>
                        <li>Local Cultural Experiences</li>
                        <li>24/7 Customer Support</li>
                        <li>Group and Solo Travel Options</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-6 text-center">
                    <h2 class="section-title mb-3 text-center">Meet Our Team</h2>
                    <p>Our team is a group of passionate travel enthusiasts who are experts in providing curated
                        tours, ensuring every detail is meticulously planned for an amazing journey. We believe in
                        giving our clients personalized attention to make their trip truly unforgettable.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 mb-4">
                    <div class="team">
                        <img src="images/person_1.jpg" alt="James Watson" class="img-fluid mb-4 rounded-20">
                        <div class="px-3">
                            <h3 class="mb-0">Name</h3>
                            <p>Co-Founder &amp; CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="team">
                        <img src="images/person_2.jpg" alt="Carl Anderson" class="img-fluid mb-4 rounded-20">
                        <div class="px-3">
                            <h3 class="mb-0">Name</h3>
                            <p>Co-Founder &amp; CEO</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div class="team">
                        <img src="images/person_4.jpg" alt="Michelle Allison" class="img-fluid mb-4 rounded-20">
                        <div class="px-3">
                            <h3 class="mb-0">Name</h3>
                            <p>Co-Founder &amp; CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="team">
                        <img src="images/person_3.jpg" alt="Drew Wood" class="img-fluid mb-4 rounded-20">
                        <div class="px-3">
                            <h3 class="mb-0">Name</h3>
                            <p>Co-Founder &amp; CEO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="py-5 cta-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="mb-2 text-white">Lets you Explore the Best. Contact Us Now</h2>
                    <p class="mb-4 lead text-white text-white-opacity">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.
                        Excepturi, fugit?</p>
                    <p class="mb-0"><a href="booking.html"
                            class="btn btn-outline-white text-white btn-md font-weight-bold">Get in
                            touch</a></p>
                </div>
            </div>
        </div>
    </div> -->

    @include('layouts.footer')

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/daterangepicker.js"></script>

    <script src="js/typed.js"></script>

    <script src="js/custom.js"></script>

</body>

</html>