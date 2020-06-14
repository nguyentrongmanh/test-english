@extends('layouts.admin')

@section('content')
<div style="margin: 10px;">
	<div class="card shadow mb-4 border-left-warning">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Reading Detail</h6>
		</div>
		<div class="card-body">
			<div class="main-article"></div>
			@if ($reading->part != 5)
			@php
			$startIndex = 1;
			@endphp
			@endif
			@foreach ($reading->questions as $question)
			<div class="answer">
				<p><b>Question {{ $startIndex ?? "" }} : {{ $question->question }}</b>
				</p>
				<ul class="answer-list">
					<li>
						<label for="question_{{$question->id}}1">
							<i class="icon icon_radio"></i>
							A. {{ $question->option_a }}
						</label>
					</li>
					<li>
						<label for="question_{{$question->id}}2">
							<i class="icon icon_radio"></i>
							B. {{ $question->option_b }}
						</label>
					</li>
					<li>
						<label for="question_{{$question->id}}3">
							<i class="icon icon_radio"></i>
							C. {{ $question->option_c }}
						</label>
					</li>
					<li>
						<label for="question_{{$question->id}}4">
							<i class="icon icon_radio"></i>
							D. {{ $question->option_d }}
						</label>
					</li>
				</ul>
				<p>Answer: {{$question->answer}}</p>
			</div>
			@if ($reading->part != 5)
			@php
			$startIndex++;
			@endphp
			@endif
			@endforeach
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		var reading = {!! json_encode($reading) !!};
		if (reading.post != null) {
			$('.main-article').html(reading.post)
		}
	});
</script>
@endsection