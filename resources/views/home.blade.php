@extends('layouts.app')

@section('content')

<div id="js-preloader" class="js-preloader">
	<div class="preloader-inner">
		<span class="dot"></span>
		<div class="dots">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(window).on('load', function() {
        $('#js-preloader').addClass('loaded');
    });
</script>
<!-- ***** Preloader End ***** -->
<!-- ***** Header Area Start ***** -->

<!-- ***** Header Area End ***** -->

<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
	<img src="img/banner.jpg" id="bg-video">

	<div class="video-overlay header-text">
		<div class="caption">
			<h6>work harder</h6>
			<h2>improve your<em> English</em></h2>
			<div class="main-button scroll-to-section">
				<a href="#features">Become a member</a>
			</div>
		</div>
	</div>
</div>

<section class="section" id="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="section-heading">
					<h2>Choose your <em>course</em></h2>
					<img src="assets/images/line-dec.png" alt="waves">
					<p>Training Studio is free CSS template for gyms and fitness centers. You are allowed to use this
						layout for your business website.</p>
				</div>
			</div>
			<div class="col-lg-6">
				<ul class="features-items">
					<li class="feature-item">
						<div class="left-icon">
							<img src="assets/images/features-first-icon.png" alt="First One">
						</div>
						<div class="right-content">
							<h4>Basic Fitness</h4>
							<p>Please do not re-distribute this template ZIP file on any template collection website.
								This is not allowed.</p>
							<a href="#" class="text-button">Discover More</a>
						</div>
					</li>
					<li class="feature-item">
						<div class="left-icon">
							<img src="assets/images/features-first-icon.png" alt="second one">
						</div>
						<div class="right-content">
							<h4>New Gym Training</h4>
							<p>If you wish to support TemplateMo website via PayPal, please feel free to contact us. We
								appreciate it a lot.</p>
							<a href="#" class="text-button">Discover More</a>
						</div>
					</li>
					<li class="feature-item">
						<div class="left-icon">
							<img src="assets/images/features-first-icon.png" alt="third gym training">
						</div>
						<div class="right-content">
							<h4>Basic Muscle Course</h4>
							<p>Credit goes to <a rel="nofollow" href="https://www.pexels.com" target="_blank">Pexels
									website</a> for images and video background used in this HTML template.</p>
							<a href="#" class="text-button">Discover More</a>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-lg-6">
				<ul class="features-items">
					<li class="feature-item">
						<div class="left-icon">
							<img src="assets/images/features-first-icon.png" alt="fourth muscle">
						</div>
						<div class="right-content">
							<h4>Advanced Muscle Course</h4>
							<p>You may want to browse through <a rel="nofollow"
									href="https://templatemo.com/tag/digital-marketing" target="_parent">Digital
									Marketing</a> or <a href="https://templatemo.com/tag/corporate">Corporate</a> HTML
								CSS templates on our website.</p>
							<a href="#" class="text-button">Discover More</a>
						</div>
					</li>
					<li class="feature-item">
						<div class="left-icon">
							<img src="assets/images/features-first-icon.png" alt="training fifth">
						</div>
						<div class="right-content">
							<h4>Yoga Training</h4>
							<p>This template is built on Bootstrap v4.3.1 framework. It is easy to adapt the columns and
								sections.</p>
							<a href="#" class="text-button">Discover More</a>
						</div>
					</li>
					<li class="feature-item">
						<div class="left-icon">
							<img src="assets/images/features-first-icon.png" alt="gym training">
						</div>
						<div class="right-content">
							<h4>Body Building Course</h4>
							<p>Suspendisse fringilla et nisi et mattis. Curabitur sed finibus nisi. Integer nibh sapien,
								vehicula et auctor.</p>
							<a href="#" class="text-button">Discover More</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- ***** Features Item End ***** -->

<!-- ***** Call to Action Start ***** -->
<section class="section" id="call-to-action">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cta-content">
					<h2>ONLINE <em>toeic test</em></h2>
					<p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula, sit amet dapibus odio
						augue eget libero. Morbi tempus mauris a nisi luctus imperdiet.</p>
					<div class="main-button scroll-to-section">
						<a href="{{ url('test/start	') }}">START ONLINE TEST</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection