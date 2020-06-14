@extends('layouts.test')

@section('content')
<div class="top-nav">
	<h4 class="sm black bold">Test toeic online</h4>
	<ul class="top-nav-list">
		<li><a href="#"><b>Bách Khoa Toeic</b></a></li>
		<li class="outline-learn part-list">
			<a href="#"><i class="fas fa-list-alt"></i></a>
			<div class="list-item-body outline-learn-body ps-container ps-active-y"
				style="height: 417.443px; width: 352.8px;">
				<div class="ps-scrollbar-x-rail" style="width: 329.2px; display: none; left: 0px;">
					<div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
				</div>
				<div class="ps-scrollbar-y-rail" style="top: 0px; height: 360.813px; display: inherit; right: 0px;">
					<div class="ps-scrollbar-y" style="top: 0px; height: 150px;"></div>
				</div>
			</div>
		</li>
		<li class="exit">
			<a href="#"><i class="fas fa-times-circle"></i></a>
		</li>
	</ul>
</div>

<section id="quizz-intro-section" class="quizz-intro-section learn-section"
	style="min-height: 466px; height: auto !important;">
	<div class="container" style="height: auto !important;">
		<div class="question-content-wrap" style="height: auto !important;">
			<div class="row" style="height: auto !important;">
				<div class="col-md-10 col-md-push-1" style="height: auto !important; min-height: 0px !important;">
					<div class="question-content" style="height: auto !important; min-height: 0px !important;">
						<div class="exam-info" style="height: auto !important;">
							<h4 class="sm">Thi thử TOEIC - Practice Mini Test</h4>
							<br>
							<p><b>Thời gian làm bài: 30 phút</b></p>
							<p><b>Listening: 15 phút</b></p>
							<p><b>Reading: 15 phút</b></p>
						</div>
						<div class="text-center">
							<a href="{{ route('test-part-one') }}" class="btn-start mc-btn btn-style-6">BẮT
								ĐẦU</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection