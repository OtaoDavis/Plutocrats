<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="BDC Technologies">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="0">
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
	<link rel="icon" href="{{ asset('img/ico_logo.webp') }}?v={{ time() }}">

	<title>Tours and Travel</title>
</head>

<body>
	@include('layouts.navbar')

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<div class="hero">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="intro-wrap">
						<h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Trip In <span
								class="typed-words"></span></h1>

						<div class="row">
							<div class="col-12">
								<form class="form">
									<div class="row mb-2">
										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
											<select name="" id="" class="form-control custom-select">
												<option value="">Destination</option>
												<option value="">Tsavo</option>
												<option value="">Maasai Mara</option>
												<option value="">Amboseli</option>
												<option value="">Hell's Gate</option>
												<option value="">Samburu</option>
												<option value="">etc</option>
											</select>
										</div>
										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-5">
											<input type="text" class="form-control" name="daterange">
										</div>
										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-3">
											<input type="text" class="form-control" placeholder="# of People">
										</div>

									</div>
									<div class="row align-items-center">
										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
											<input type="submit" class="btn btn-primary btn-block" value="Get Quote">
										</div>
										<div class="col-lg-8">
											<label class="control control--checkbox mt-3">
												<span class="caption">Save this search</span>
												<input type="checkbox" checked="checked" />
												<div class="control__indicator"></div>
											</label>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="slides">
						<img src="images/hero-slider-1.png" alt="Image" class="img-fluid active">
						<img src="images/hero-slider-2.jpg" alt="Image" class="img-fluid">
						<img src="images/hero-slider-3.jpg" alt="Image" class="img-fluid">
						<img src="images/hero-slider-4.jpg" alt="Image" class="img-fluid">
						<img src="images/hero-slider-5.png" alt="Image" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="untree_co-section">
		<div class="container">
			<div class="row text-center justify-content-center mb-5">
				<div class="col-lg-7">
					<h2 class="section-title text-center">Top Destinations</h2>
				</div>
			</div>

			<div class="row">
				<!-- Location 1 -->
				<div class="col-md-4 mb-4">
					<div class="destination-item">
						<a class="media-thumb" href="{{route('mara')}}">
							<img src="images/cheetah.webp" alt="Maasai Mara" class="img-fluid">
							<div class="media-text">
								<h3>Maasai Mara</h3>
								<span class="location">Kenya</span>
								<p>A breathtaking wildlife reserve known for the Great Migration and
									diverse animal species.</p>
								<span class="explore-text">
									Explore
								</span>
							</div>
						</a>
					</div>
				</div>

				<!-- Location 2 -->
				<div class="col-md-4 mb-4">
					<div class="destination-item">
						<a class="media-thumb" href="images/elephants.webp" data-fancybox="gallery">
							<img src="images/elephants.webp" alt="Tsavo West" class="img-fluid">
							<div class="media-text">
								<h3>Tsavo </h3>
								<span class="location">Kenya</span>
								<p>Kenya’s largest park, Tsavo, is famed for its red elephants, stunning landscapes, and
									rich wildlife.</p>
								<span class="explore-text">
									Explore
								</span>

							</div>
						</a>
					</div>
				</div>

				<!-- Location 3 -->
				<div class="col-md-4 mb-4">
					<div class="destination-item">
						<a class="media-thumb" href="images/amboseli.webp" data-fancybox="gallery">
							<img src="images/hero-slider-3.jpg" alt="Amboseli" class="img-fluid">
							<div class="media-text">
								<h3>Amboseli</h3>
								<span class="location">Kenya</span>
								<p>Amboseli offers stunning Kilimanjaro views, large elephant herds, and diverse
									wildlife.</p>
								<span class="explore-text">
									Explore
								</span>
							</div>
						</a>
					</div>
				</div>

				<!-- Location 4 -->
				<div class="col-md-4 mb-4">
					<div class="destination-item">
						<a class="media-thumb" href="{{(route('tsavo'))}}">
							<img src="images/kicheche.webp" alt="Tsavo East" class="img-fluid">
							<div class="media-text">
								<h3>Ol Pejeta</h3>
								<span class="location">Kenya</span>
								<p>A renowned conservancy home to the last two northern white rhinos and diverse
									wildlife.</p>
								<span class="explore-text">
									Explore
								</span>
							</div>
						</a>
					</div>
				</div>

				<!-- Location 5 -->
				<div class="col-md-4 mb-4">
					<div class="destination-item">
						<a class="media-thumb" href="#">
							<img src="images/hero-slider-5.png" alt="Chyulu Hills" class="img-fluid">
							<div class="media-text">
								<h3>Chyulu Hills</h3>
								<span class="location">Kenya</span>
								<p>A volcanic mountain range with lush green hills, caves, and stunning wildlife.</p>
								<span class="explore-text">
									Explore
								</span>
							</div>
						</a>
					</div>
				</div>

				<!-- Location 6 -->
				<div class="col-md-4 mb-4">
					<div class="destination-item">
						<a class="media-thumb" href="#">
							<img src="images/samburu.webp" alt="Samburu" class="img-fluid">
							<div class="media-text">
								<h3>Samburu</h3>
								<span class="location">Kenya</span>
								<p>A rugged wilderness known for rare wildlife like Grevy’s zebra and reticulated
									giraffe.</p>
								<span class="explore-text">
									Explore
								</span>
							</div>
						</a>
					</div>
				</div>
			</div>

			<!-- "All Destinations" Button
			<div class="text-center mt-2">
				<a href="all-destinations.html" class="btn btn-primary btn-lg">View Destinations</a>
			</div> -->
		</div>
	</div>




	<!-- <div class="untree_co-section count-numbers py-5">
		<div class="container">
			<div class="row">
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="9313">0</span>
						</div>
						<span class="caption">No. of Travels</span>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="8492">0</span>
						</div>
						<span class="caption">No. of Clients</span>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="100">0</span>
						</div>
						<span class="caption">No. of Employees</span>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="120">0</span>
						</div>
						<span class="caption">No. of Countries</span>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<div class="package-section">
		<h2 class="section-title">Common Packages</h2>
		<div class="packages-container">
			<!-- Package 1 -->
			<div class="package-card" style="background-image: url('{{ asset('images/game_drive.webp') }}');">
				<div class="package-details">
					<h3>5-Day Kenya Game Drive</h3>
					<p>Explore Kenya’s famous Maasai Mara and Amboseli National Park in an exciting 5-day safari.</p>
					<span class="price">From Kshs /= </span>
				</div>
			</div>

			<!-- Package 2 -->
			<div class="package-card" style="background-image: url('{{ asset('images/charter2.webp') }}');">
				<div class="package-details">
					<h3>Private Charter</h3>
					<p>Experience ultimate luxury with a private chartered tour of the savannah grasslands and
						rainforests.</p>
					<span class="price">From Kshs /=</span>
				</div>
			</div>

			<!-- Package 3 -->
			<div class="package-card" style="background-image: url('{{ asset('images/hiking.webp') }}');">
				<div class="package-details">
					<h3>7-Day Hiking Safari</h3>
					<p>Embark on a 7-day adventure exploring Mount Kenya, Aberdare Ranges, and Hell’s Gate.</p>
					<span class="price">From Kshs /=</span>
				</div>
			</div>

			<!-- Package 4 -->
			<div class="package-card" style="background-image: url('{{ asset('images/kicheche.webp') }}');">
				<div class="package-details">
					<h3>Luxury Safari Weekend</h3>
					<p>Indulge in a luxury getaway at a 5-star safari lodge with game drives and spa treatments.</p>
					<span class="price">From Kshs /= </span>
				</div>
			</div>
		</div>
	</div>





	<div class="untree_co-section testimonial-section mt-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 text-center">
					<h2 class="section-title text-center mb-5">Testimonials</h2>
	
					<div class="owl-single owl-carousel no-nav">
						<div class="testimonial mx-auto">
							<figure class="img-wrap">
								<img src="images/person_2.jpg" alt="Image" class="img-fluid">
							</figure>
							<h3 class="name">Adam Aderson</h3>
							<blockquote>
								<p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
						</div>
	
						<div class="testimonial mx-auto">
							<figure class="img-wrap">
								<img src="images/person_3.jpg" alt="Image" class="img-fluid">
							</figure>
							<h3 class="name">Lukas Devlin</h3>
							<blockquote>
								<p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
						</div>
	
						<div class="testimonial mx-auto">
							<figure class="img-wrap">
								<img src="images/person_4.jpg" alt="Image" class="img-fluid">
							</figure>
							<h3 class="name">Kayla Bryant</h3>
							<blockquote>
								<p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
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
						adipisicing elit. Excepturi, fugit?</p>
					<p class="mb-0"><a href="booking.html"
							class="btn btn-outline-white text-white btn-md font-weight-bold">Get in touch</a></p>
				</div>
			</div>
		</div>
	</div> -->


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
	<script>
		$(function () {
			var slides = $('.slides'),
				images = slides.find('img');

			images.each(function (i) {
				$(this).attr('data-id', i + 1);
			})

			var typed = new Typed('.typed-words', {
				strings: ["Maasai Mara", " Tsavo", " Amboseli", " Samburu", "Chyulu Hills"],
				typeSpeed: 80,
				backSpeed: 80,
				backDelay: 4000,
				startDelay: 1000,
				loop: true,
				showCursor: true,
				preStringTyped: (arrayPos, self) => {
					arrayPos++;
					console.log(arrayPos);
					$('.slides img').removeClass('active');
					$('.slides img[data-id="' + arrayPos + '"]').addClass('active');
				}

			});
		})

		function togglePackageDetails(card) {
			card.classList.toggle('open');
		}

	</script>

	<script src="js/custom.js"></script>

	@include('layouts.footer')

</body>

</html>