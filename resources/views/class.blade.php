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
					@foreach ($classes as $index => $class)
					<li data-index="{{ $index }}"
						class="class-link ui-state-default ui-corner-top {{ $index == 0 ? 'ui-tabs-active ui-state-active' : null 	}}">
						<a class="ui-tabs-anchor ">
							<i class="fas fa-bookmark"></i>{{ $class->name }}
						</a>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="col-lg-8">
				<section class="tabs-content">
					<article aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
						<img src="{{ url('img/class.jpg') }}" alt="First Class">
						<h4 class="class-name"></h4>
						<p>
							Description: <span class="class-description"></span>
						</p>
						<p>
							Target: <span class="class-target"></span>
						</p>
						<div class="main-button">
							<a href="#">Đăng Ký lớp</a>
						</div>
					</article>
				</section>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		
		const classList = {!! json_encode($classes) !!};
		var selectedClass = classList[0];
		
		$(".class-link").on("click", function(e) {
			e.preventDefault();
			const classIndex = $(this).attr("data-index")
			$(".ui-state-default").removeClass("ui-tabs-active ui-state-active")
			$(this).addClass("ui-tabs-active ui-state-active")
			selectedClass = classList[classIndex]
			showClassDetail();
		})

		var showClassDetail = function(){
			$(".class-name").html(selectedClass.name)
			$(".class-description").html(selectedClass.description)
			$(".class-target").html(selectedClass.target)
		}
		showClassDetail();
	});
</script>

@endsection