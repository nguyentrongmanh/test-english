@extends('layouts.app')

@section('content')

<section class="section" id="our-classes">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="section-heading">
					<h2>Our <em>Classes</em></h2>
					<img src="assets/images/line-dec.png" alt="">
					<p class="intro">Having a solid foundation knowledge after each lesson, increasing difficulty helps students keep up with the progress of the new TOEIC FORMAT test.</p>
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
						<img class="class-img" data="{{ url('/') }}">
						<h4 class="class-name"></h4>
						<p class_item_detail>
							Description: <span class="class-description"></span>
						</p>
						<p class_item_detail>
							Target: <span class="class-target"></span>
						</p>
						<p class_item_detail>
							Schedule: <span class="class-schedule"></span>
						</p>
						<p class_item_detail>
							Start Date: <span class="class-start-date"></span>
						</p>
						<p class_item_detail>
							End Date: <span class="class-end-date"></span>
						</p>
						<div class="main-button">
							<a class="register-button">Register now</a>
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
		var showClassDetail = function(){
			var src = selectedClass.image ? selectedClass.image : 'default_class_image.jpg'
			baseURL = $(".class-img").attr("data")
			src = baseURL + '/image/'+ src
			$(".class-img").attr("src", src)
			$(".class-name").html(selectedClass.name)
			$(".class-description").html(selectedClass.description)
			$(".class-target").html(selectedClass.target)
			$(".class-schedule").html(selectedClass.schedule)
			$(".class-start-date").html(selectedClass.start_date)
			$(".class-end-date").html(selectedClass.end_date)
		}
		showClassDetail();

		$(".class-link").on("click", function(e) {
			e.preventDefault();
			const classIndex = $(this).attr("data-index")
			$(".ui-state-default").removeClass("ui-tabs-active ui-state-active")
			$(this).addClass("ui-tabs-active ui-state-active")
			selectedClass = classList[classIndex]
			showClassDetail();
		})

		$(".main-button").on("click", function() {
			classId = selectedClass.id
			window.location = baseURL + "/class/register?id=" + classId
		})
	});
</script>

@endsection

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