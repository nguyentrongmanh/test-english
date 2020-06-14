@extends('layouts.admin')

@section('content')
<div style="margin: 10px;">
	<div class="card shadow mb-4 border-left-warning">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Listening Detail</h6>
		</div>
		<div class="card-body">
			@if ($listening->main_img != null)
			<img src="{{ url('image/' . $listening->main_img) }}">
			@endif
			<div>
				<audio class="detail-audio" controls="">
					<source src="{{ url('audio/' . $listening->audio) }}" type="audio/mp3">
				</audio>
			</div>
			@if ($listening->part == 3 || $listening->part == 4)
			@foreach ($listening->questions as $question)
			<div class="answer">
				<p><b>Question : {{ $question->question }}</b>
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
			@endforeach
			@else
			<p style="margin-top: 20px;">Answer: {{$listening->questions[0]->answer}}</p>
			@endif
		</div>
	</div>
</div>
@endsection