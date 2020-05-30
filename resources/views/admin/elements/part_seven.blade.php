<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Danh sách câu hỏi part 7</h6>
</div>
<div class="card-body">
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<div class="dataTables_length" id="dataTable_length">
				<label style="display: flex">
					<p>Show</p>
					<select name="dataTable_length" aria-controls="dataTable"
						class="table-entries custom-select custom-select-sm form-control form-control-sm">
						<option value="10">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select>
					<p>Entries</p>
				</label>
			</div>
		</div>
		<div class="col-sm-12 col-md-6">
			<div id="dataTable_filter" class="dataTables_filter">
				<label style="display: flex; justify-content: flex-end;">
					Search:<input type="search" class="table-search form-control form-control-sm" placeholder=""
						aria-controls="dataTable">
				</label>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th style="width: 20px">ID</th>
					<th style="width: 600px">Post</th>
					<th class="w-250">Question</th>
					<th>Explain</th>
					<th style="width: 50px">Action</th>
				</tr>
			</thead>
			<tbody>
				@if (count($readingQuestions) != 0)
				@foreach ($readingQuestions as $questionPartSeven)
				@php
				$questionList = $questionPartSeven->questions
				@endphp
				<tr>
					<td>{{ $questionPartSeven->id }}</td>
					<td style="width: 400px">
						<div class="main-article table-row"></div>
					</td>
					<td class="w-250">
						<div class="table-row">
							@foreach ($questionList as $index => $question)
							<div>
								<div>Câu {{ __($index + 1) }} : {{ $question->question }}</div>
								<div>A: {{ $question->option_a }}</div>
								<div>B: {{ $question->option_b }}</div>
								<div>C: {{ $question->option_c }}</div>
								<div>D: {{ $question->option_d }}</div>
							</div>
							<br />
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
							<br />
							@endforeach
						</div>
					</td>
					<td style="width: 50px">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Actions
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<div class="dropdown-item"><a
										href="{{ url('admin/readings/delete/' . $questionPartSeven->id) }}"
										class="btn btn-sm btn-circle">
										<i class="fas fa-trash" style="margin-right: 10px;"></i> Delete
									</a></div>
								<div class="dropdown-item"> <a
										href="{{ url('admin/readings/detail/' . $questionPartSeven->id) }}"
										class="btn btn-sm btn-circle">
										<i class="fas fa-book" style="margin-right: 10px;"></i> Detail
									</a></div>
								<div class="dropdown-item"> <a
										href="{{ url('admin/readings/edit/' . $questionPartSeven->id) }}"
										class="btn btn-sm btn-circle">
										<i class="fas fa-user-edit" style="margin-right: 10px;"></i> Edit
									</a></div>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
		{{ $readingQuestions->links() }}
	</div>
</div>
<script>
	$(document).ready(function() {
		const defaultLimit = "{{$limit}}"
		$("select[name=dataTable_length]").val(defaultLimit);
		$("select[name=dataTable_length]").on("change", function(e) {
			const limit = e.target.value
			window.location = baseLaravelUrl + "/admin/readings?limit=" + limit + "&part=" + "{{$part}}"
		});
		var questionList = {!! json_encode($readingQuestions) !!};
		questionList = questionList.data
		$('.main-article').each(function(index,element) {
			$(this).html(questionList[index].post)
		});
	});
</script>