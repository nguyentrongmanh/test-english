@extends('layouts.app')

@section('content')

<section class="section" id="our-classes">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="section-heading">
					<h2>Our <em>Classes</em></h2>
					<img src="assets/images/line-dec.png" alt="">
					<p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies
						fermentum massa consequat eu.</p>
				</div>
			</div>
		</div>
		<div class="row ui-tabs ui-widget ui-widget-content ui-corner-all" id="tabs">
			<div class="col-lg-4">
				<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
					<li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active">
						<a class="ui-tabs-anchor">
							<i class="fas fa-bookmark"></i>First Class
						</a>
					</li>
					<li class="ui-state-default ui-corner-top">
						<a class="ui-tabs-anchor">
							<i class="fas fa-bookmark"></i>Second Class
						</a>
					</li>
					<li class="ui-state-default ui-corner-top">
						<a class="ui-tabs-anchor">
							<i class="fas fa-bookmark"></i>Third Class
						</a>
					</li>
					<li class="ui-state-default ui-corner-top">
						<a class="ui-tabs-anchor">
							<i class="fas fa-bookmark"></i>Third Class
						</a>
					</li>
					<li class="ui-state-default ui-corner-top">
						<a class="ui-tabs-anchor">
							<i class="fas fa-bookmark"></i>Third Class
						</a>
					</li>
				</ul>
			</div>
			<div class="col-lg-8">
				<section class="tabs-content">
					<article aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
						<img src="{{ url('img/class.jpg') }}" alt="First Class">
						<h4>First Training Class</h4>
						<p>Phasellus convallis mauris sed elementum vulputate. Donec posuere leo sed dui eleifend
							hendrerit. Sed suscipit suscipit erat, sed vehicula ligula. Aliquam ut sem fermentum sem
							tincidunt lacinia gravida aliquam nunc. Morbi quis erat imperdiet, molestie nunc ut,
							accumsan diam.</p>
						<div class="main-button">
							<a href="#">Đăng Ký lớp</a>
						</div>
					</article>
				</section>
			</div>
		</div>
	</div>
</section>

@endsection