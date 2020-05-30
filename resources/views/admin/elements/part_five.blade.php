<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Danh sách câu hỏi part 5</h6>
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
					<th>ID</th>
					<th>Questions</th>
					<th>Option A</th>
					<th>Option B</th>
					<th>Option C</th>
					<th>Option D</th>
					<th>Answer</th>
					<th>Explain</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Questions</th>
					<th>Option A</th>
					<th>Option B</th>
					<th>Option C</th>
					<th>Option D</th>
					<th>Answer</th>
					<th>Action</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($readingQuestions as $questionPartFive)
				<tr>
					<td>{{ $questionPartFive->id }}</td>
					<td>{{ $questionPartFive->questions[0]->question }}</td>
					<td>{{ $questionPartFive->questions[0]->option_a }}</td>
					<td>{{ $questionPartFive->questions[0]->option_b }}</td>
					<td>{{ $questionPartFive->questions[0]->option_c }}</td>
					<td>{{ $questionPartFive->questions[0]->option_d }}</td>
					<td>{{ $questionPartFive->questions[0]->answer }}</td>
					<td>{{ $questionPartFive->questions[0]->explain }}</td>
					<td style="width: 50px">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Actions
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<div class="dropdown-item"><a
										href="{{ url('admin/readings/delete/' . $questionPartFive->id) }}"
										class="btn btn-sm btn-circle">
										<i class="fas fa-trash" style="margin-right: 10px;"></i> Delete
									</a></div>
								<div class="dropdown-item"> <a
										href="{{ url('admin/readings/detail/' . $questionPartFive->id) }}"
										class="btn btn-sm btn-circle">
										<i class="fas fa-book" style="margin-right: 10px;"></i> Detail
									</a></div>
								<div class="dropdown-item"> <a
										href="{{ url('admin/readings/edit/' . $questionPartFive->id) }}"
										class="btn btn-sm btn-circle">
										<i class="fas fa-user-edit" style="margin-right: 10px;"></i> Edit
									</a></div>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
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
	});
</script>