<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="BDC Tech">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/daterangepicker.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>

<body>
    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/ico_head.svg') }}" alt="Plutocrats Travel">
                </a>
                <!-- <a href="index.html" class="logo m-0">Tours & Travel <span class="text-primary">.</span></a> -->

                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    <li class="has-children">
                        <a href="#">Destinations</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('amboseli') }}">Amboseli</a></li>
                            <li><a href="{{ route('olpejeta') }}">Ol Pejeta</a></li>
                            <li><a href="{{ route('tsavo') }}">Tsavo</a></li>
                            <li><a href="{{ route('mara') }}">Maasai Mara</a></li>
                            <li><a href="#">Samburu</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('packages') }}">Packages</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    @guest
                    <a href="{{ route('login') }}" class="btn-book-today ml-3">Book Today</a>
                    @else
                    <div class="dropdown d-inline-block ml-3">
                        <a href="#" class="dropdown-toggle text-dark" id="userDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <!-- Font Awesome User Icon -->
                            <i class="fas fa-user-circle" style="font-size: 24px; color:#fff;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('user_dash') }}">My Bookings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endguest

                </ul>

                <a href="#"
                    class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>
        </div>
    </nav>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>