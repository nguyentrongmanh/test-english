<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Danh sách câu hỏi part two</h6>
</div>
<div class="card-body">
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Audio</th>
					<th>Answer</th>
					<th>Explain</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Audio</th>
					<th>Answer</th>
					<th>Explain</th>
					<th>Action</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($listeningQuestions as $questionPartTwo)
				<tr>
					<td>{{ $questionPartTwo->id }}</td>
					<td>{{ $questionPartTwo->questions[0]->answer }}</td>
					<td>{{ $questionPartTwo->questions[0]->answer }}</td>
					<td>{{ $questionPartTwo->questions[0]->explain }}</td>
					<td>Action</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>