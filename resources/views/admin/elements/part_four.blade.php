<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Danh sách câu hỏi part 4</h6>
</div>
<div class="card-body">
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th style="width: 20px">ID</th>
					<th>Image</th>
					<th>Audio</th>
					<th>Questions</th>
					<th>Answer</th>
					<th style="width: 50px">Action</th>
				</tr>
			</thead>
			<tbody>
				@if (count($listeningQuestions) != 0)
				@foreach ($listeningQuestions as $questionPartFour)
				@php
				$questionList = $questionPartFour->questions;
				@endphp
				<tr>
					<td>{{ $questionPartFour->id }}</td>
					<td>
					</td>
					<td>
						<div class="table-row">
							@foreach ($questionList as $index => $question)
							<div>
								<div>Câu {{ __($index + 1) }} : {{ $question->question }}</div>
								<div>A: {{ $question->option_a }}</div>
								<div>B: {{ $question->option_b }}</div>
								<div>C: {{ $question->option_c }}</div>
								<div>D: {{ $question->option_d }}</div>
							</div>
							@endforeach
						</div>
					</td>
					<td>
						<div class="table-row">
							@foreach ($questionList as $index => $question)
							<div>
								<div>Câu {{ __($index + 1) }}: {{ $question->answer }}</div>
								<div>Giải thích: {{ $question->explain }}</div>
							</div>
							@endforeach
						</div>
					</td>
					<td style="width: 50px">Action</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>