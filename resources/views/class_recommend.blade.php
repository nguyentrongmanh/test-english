@extends('layouts.app')

@section('content')

<section class="section" id="our-classes">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="section-heading">
					<h2>Our <em>Classes</em></h2>
				</div>
			</div>
		</div>
		<div class="row ui-tabs ui-widget ui-widget-content ui-corner-all" id="tabs">
			<div class="col-lg-2">
			</div>
			<div class="col-lg-8">
				<section class="tabs-content">
					<article aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
						<img class="class-img" src="{{ url('image/' . $class->image) }}" data="{{ url('/') }}">
						<h4 class="class-name">{{ $class->name}}</h4>
						<p class="class_item_detail">
							Description: <span class="class-description">{{ $class->description}}</span>
						</p>
						<p class="class_item_detail">
							Target: <span class="class-target">{{ $class->target}}</span>
						</p>
						<p class="class_item_detail">
							Schedule: <span class="class-schedule">{{ $class->schedule}}</span>
						</p>
						<p class="class_item_detail">
							Start Date: <span class="class-start-date">{{ $class->start_date}}</span>
						</p>
						<p class="class_item_detail">
							End Date: <span class="class-end-date">{{ $class->end_date}}</span>
						</p>
						<div class="main-button">
							<a style="margin-right: 50px" href="{{ url('/class/register?id=' . $class->id) }}"
								class="register-button">Register
								now</a>
							<a href="{{ url('/class') }}" class="register-button">see more class</a>
						</div>
					</article>
				</section>
			</div>
		</div>
	</div>
</section>
@endsection