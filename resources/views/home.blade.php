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
					<h2>Choose your <em>Class</em></h2>
					<img src="{{ url('img/line-dec.png') }}" alt="waves">
					<p>We offer classes that are suitable for everyone.</p>
				</div>
			</div>
			<div class="col-lg-6">
				@foreach ($classes as $index => $class)
				@if ($index % 2 == 0)
				<ul class="features-items">
					<li class="feature-item">
						<div class="left-icon">
							<img src="{{ url('/img/home-class.png') }}" alt="First One">
						</div>
						<div class="right-content">
							<h4>{{ $class->name }}</h4>
							<p>{{ $class->description }}</p>
							<a href="#" class="text-button">Discover More</a>
						</div>
					</li>
				</ul>
				@endif
				@endforeach
			</div>
			<div class="col-lg-6">
				@foreach ($classes as $index => $class)
				@if ($index % 2 == 1)
				<ul class="features-items">
					<li class="feature-item">
						<div class="left-icon">
							<img src="{{ url('/img/home-class.png') }}" alt="First One">
						</div>
						<div class="right-content">
							<h4>{{ $class->name }}</h4>
							<p>{{ $class->description }}</p>
							<a href="#" class="text-button">Discover More</a>
						</div>
					</li>
				</ul>
				@endif
				@endforeach
			</div>
		</div>
		<div class="main-button scroll-to-section home-class-btn">
			<a href="{{ url('test/start') }}">SEE MORE CLASSES</a>
		</div>
	</div>
</section>

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
						<a href="{{ url('test/start') }}">START ONLINE TEST</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section" id="trainers">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="section-heading">
					<h2>OUR <em>TEACHERS</em></h2>
					<img src="assets/images/line-dec.png" alt="">
					<p>The success of students is also the success of our teachers</p>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach ($teachers as $teacher)
			<div class="col-lg-4">
				<div class="trainer-item">
					<div class="image-thumb">
						<img src="{{ url('/image/' . $teacher->image) }}" alt="">
					</div>
					<div class="down-content">
						<h4>{{ $teacher->name }}</h4>
						<p>{{ $teacher->intro ?? "Trên 5 năm kinh nghiệm luyện thi TOEIC, IELTS. Đạt 990/990 TOEIC , 8.5 IELTS. Thạc sĩ trường Leeds Metropolitan của
						Vương Quốc Anh." }}</p>
						<ul class="social-icons">
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fab fa-behance"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>


@if (session('success'))
<script type="text/javascript">
	swal({
		title: "Đăng ký thành công",
		icon: "success",
		button: "OK!",
	});
</script>
@endif

@if (session('error'))
<script type="text/javascript">
	swal({
		title: "Bạn đã đăng ký lớp này rồi",
		icon: "error",
		dangerMode: true,
	});
</script>
@endif
@endsection