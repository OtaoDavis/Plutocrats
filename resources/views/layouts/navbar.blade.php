<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="logo m-0">
                    <img src="{{ asset('images/ico_head.svg') }}" alt="Plutocrats Travel" style="max-height: 150px;">
                </a>

                <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    <li class="has-children">
                        <a href="#">Destinations</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('amboseli') }}">Amboseli</a></li>
                            <li><a href="{{ route('olpejeta') }}">Ol Pejeta</a></li>
                            <li><a href="{{ route('tsavo') }}">Tsavo</a></li>
                            <li><a href="{{ route('mara') }}">Maasai Mara</a></li>
                            <li><a href="{{ route('samburu') }}">Samburu</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('packages') }}">Packages</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    @guest
                    <li>
                        <a href="{{ route('login') }}"
                           class="btn-book-today ms-3" style="background-color: #ffffff;
                                  color: #1A374D;
                                  border: 2px solid #1A374D;
                                  padding: 8px 20px;
                                  border-radius: 10px;
                                  font-weight: 600;
                                  text-decoration: none;
                                  display: inline-block; /* Often needed for button-like anchors */
                                  transition: all 0.3s ease;" /* For hover effect if :hover styles change these properties */
                        >Book Today</a>
                    </li>
                    @else
                    <li class="has-children">
                        <a href="#" class="text-dark">
                            <i class="fas fa-user-circle" style="font-size: 24px;"></i>
                        </a>
                        <ul class="dropdown">
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
                    </li>
                    @endguest
                </ul>

                <a href="#"
                    class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                    data-bs-toggle="offcanvas" data-bs-target="#mobileNavbar" aria-controls="mobileNavbar">
                    <span></span>
                </a>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileNavbar" aria-labelledby="mobileNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mobileNavbarLabel">
                <img src="{{ asset('images/ico_head.svg') }}" alt="Plutocrats Travel" style="max-height: 60px;">
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav js-clone-nav-target">
                <li><a class="dropdown-item py-2" href="{{ route('home') }}"><i class="fas fa-home me-2"></i>Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle py-2" href="#" id="destinationsDropdownMobile" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-map-marker-alt me-2"></i>Destinations
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="destinationsDropdownMobile">
                        <li><a class="dropdown-item py-2" href="{{ route('amboseli') }}">Amboseli</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('olpejeta') }}">Ol Pejeta</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('tsavo') }}">Tsavo</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('mara') }}">Maasai Mara</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('samburu') }}">Samburu</a></li>
                    </ul>
                </li>
                <li><a class="dropdown-item py-2" href="{{ route('packages') }}"><i class="fa-solid fa-box-open"></i>
                        Packages</a></li>
                <li><a class="dropdown-item py-2" href="{{ route('about') }}"><i class="fa-regular fa-address-card"></i>
                        About</a></li>
                <li><a class="dropdown-item py-2" href="{{ route('contact') }}"><i class="fa-solid fa-phone"></i>
                        Contact Us</a></li>
            </ul>
            @guest
            <a href="{{ route('login') }}" class="btn btn-primary w-100 mt-3">Book Today</a>
            @else
            <div class="mt-3">
                <a class="dropdown-item py-2" href="{{ route('user_dash') }}"><i class="fas fa-briefcase me-2"></i>My
                    Bookings</a>
                <hr class="my-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item py-2"><i
                            class="fas fa-sign-out-alt me-2"></i>Logout</button>
                </form>
            </div>
            @endguest
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileNavbar = document.getElementById('mobileNavbar');
            const body = document.body;

            // Check if the current page is the home page (index)
            if (window.location.pathname === '/') {
                mobileNavbar.classList.add('d-none'); // Hide the mobile navbar
            } else {
                mobileNavbar.classList.remove('d-none'); // Ensure it's visible on other pages
            }
        });
    </script>

</body>

</html>