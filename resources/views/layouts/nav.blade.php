<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="BDC Tech"> <link rel="shortcut icon" href="{{ asset('favicon.png') }}"> <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" /> <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}"> <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">

</head>

<body>
    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="logo m-0"> <img src="{{ asset('images/ico_head.svg') }}" alt="Plutocrats Travel" style="max-height: 100px;"> </a>

                <ul class="js-clone-nav d-none d-lg-inline-block site-menu mb-0"> <li class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="has-children {{ Str::contains(Route::currentRouteName(), ['amboseli', 'olpejeta', 'tsavo', 'mara', 'samburu']) ? 'active' : '' }}">
                        <a href="#">Destinations</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('amboseli') }}">Amboseli</a></li>
                            <li><a href="{{ route('olpejeta') }}">Ol Pejeta</a></li>
                            <li><a href="{{ route('tsavo') }}">Tsavo</a></li>
                            <li><a href="{{ route('mara') }}">Maasai Mara</a></li>
                            <li><a href="{{ route('samburu') }}">Samburu</a></li>
                        </ul>
                    </li>
                    <li class="{{ Route::is('packages') ? 'active' : '' }}"><a href="{{ route('packages') }}">Packages</a></li>
                    <li class="{{ Route::is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                    <li class="{{ Route::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact Us</a></li>
                    
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
                                  transition: all 0.3s ease;" 
                        >Book Today</a>
                    </li>
                    @else
                    <li class="nav-item dropdown ms-3"> <a href="#" class="dropdown-toggle text-dark nav-link" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle" style="font-size: 24px; color: #000;"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('user_dash') }}">My Bookings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
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
            <ul class="navbar-nav js-clone-nav-target"> <li><a class="dropdown-item py-2 {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}"><i class="fas fa-home me-2"></i>Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle py-2 {{ Str::contains(Route::currentRouteName(), ['amboseli', 'olpejeta', 'tsavo', 'mara', 'samburu']) ? 'active' : '' }}" href="#" id="destinationsDropdownMobile" role="button"
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
                <li><a class="dropdown-item py-2 {{ Route::is('packages') ? 'active' : '' }}" href="{{ route('packages') }}"><i class="fas fa-box-open me-2"></i>Packages</a></li>
                <li><a class="dropdown-item py-2 {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}"><i class="fas fa-address-card me-2"></i>About</a></li>
                <li><a class="dropdown-item py-2 {{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}"><i class="fas fa-phone me-2"></i>Contact Us</a></li>
            </ul>
            @guest
            <a href="{{ route('login') }}" class="btn btn-primary w-100 mt-3">Book Today</a>
            @else
            <div class="mt-3 pt-3 border-top"> <a class="dropdown-item py-2" href="{{ route('user_dash') }}"><i class="fas fa-briefcase me-2"></i>My Bookings</a>
                <hr class="my-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item py-2"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                </form>
            </div>
            @endguest
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Script from navbar.blade.php to hide mobile navbar on homepage if you want to keep this behavior
        // document.addEventListener('DOMContentLoaded', function() {
        //     const mobileNavbar = document.getElementById('mobileNavbar');
        //     // Check if the current page is the home page (index)
        //     if (window.location.pathname === '/') { // Adjust if your home route is different
        //         const burgerButton = document.querySelector('[data-bs-target="#mobileNavbar"]');
        //         if (burgerButton) {
        //              // burgerButton.classList.add('d-none'); // Option: hide burger on home
        //         }
        //         // To hide the offcanvas itself if it were to be opened by other means (though unlikely here)
        //         // mobileNavbar.classList.add('d-none');
        //     }
        // });

        // Basic active class handling for main nav (can be expanded)
        // This is a simple example, for more complex scenarios, consider server-side logic or a more robust JS solution.
        // The @ Route::is() and @ Str::contains() Blade directives are preferred for server-side active state.
        // document.addEventListener('DOMContentLoaded', function () {
        //     const currentPath = window.location.pathname;
        //     const navLinks = document.querySelectorAll('.site-menu > li > a');
        //     navLinks.forEach(link => {
        //         if (link.getAttribute('href') === currentPath) {
        //             link.parentElement.classList.add('active');
        //         }
        //         // For has-children, you might need more specific logic if you want to activate the parent
        //     });
        // });
    </script>
</body>
</html>