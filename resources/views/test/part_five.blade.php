@extends('layouts.test')

@section('content')
<div class="top-nav">
	<h4 class="sm black bold">Part V: Incomplete Sentences</h4>
	<ul class="top-nav-list">
		<li><a href="#"><i class="fas fa-arrow-right"></i><b>FINISH ALL</b></a></li>
		<li class="timer"><a style="font-size: 25px; padding-left: 15px; padding-right: 15px"
				href="#"><b>01:30:00</b></a>
		</li>
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
			<div class="row" style="height: auto !important; justify-content: center;">
				<div class="col-md-10 col-md-push-1" style="height: auto !important; min-height: 0px !important;">
					<div class="question-content" style="height: auto !important; min-height: 0px !important;">
						@foreach ($partFiveQuestions as $item )
						@php
						$question = $item->questions[0];
						$startIndex++;
						@endphp
						<div class="answer">
							<p><b>{{ $startIndex }}. {{ $question->question }}</b>
							</p>
							<ul class="answer-list">
								<li>
									<input type="radio" name="31" value="13707" id="13707">
									<label for="13707">
										<i class="icon icon_radio"></i>
										A. {{ $question->option_a }}
									</label>
								</li>
								<li>
									<input type="radio" name="31" value="13708" id="13708">
									<label for="13708">
										<i class="icon icon_radio"></i>
										B. {{ $question->option_b }}
									</label>
								</li>
								<li>
									<input type="radio" name="31" value="13709" id="13709">
									<label for="13709">
										<i class="icon icon_radio"></i>
										C. {{ $question->option_c }}
									</label>
								</li>
								<li>
									<input type="radio" name="31" value="13710" id="13710">
									<label for="13710">
										<i class="icon icon_radio"></i>
										D. {{ $question->option_d }}
									</label>
								</li>
							</ul>
						</div>
						@endforeach
						<button type="submit" class="mc-btn btn-style-6">Next</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>

</script>

@endsection