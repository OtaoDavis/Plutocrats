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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/daterangepicker.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <img src="images/PLUTOCRATS SVG- HEAD ONLY-01.svg" alt="">
                <!-- <a href="index.html" class="logo m-0">Tours & Travel <span class="text-primary">.</span></a> -->

                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                    <li class="active"><a href="{{route('home')}}">Home</a></li>
                    <li class="has-children">
                        <a href="#">Destinations</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('mara') }}">Maasai Mara</a></li>
                            <li><a href="{{route('tsavo')}}">Tsavo</a></li>
                            <li><a href="#">Amboseli</a></li>
                            <li><a href="#">Ol Pejeta</a></li>
                            <li><a href="#">Samburu</a></li>
                        </ul>
                    </li>
                    <li><a href="services.html">Packages</a></li>
                    <li><a href="{{route('about')}}">About</a></li>
                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                </ul>

                <a href="#"
                    class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>
        </div>
    </nav>

</body>

</html>