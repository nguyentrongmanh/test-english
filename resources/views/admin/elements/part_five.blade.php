<div class="card-header py-3">
  	<h6 class="m-0 font-weight-bold text-primary">Danh sách câu hỏi part 5</h6>
</div>
<div class="card-body">
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
				  	<td>Action</td>
				</tr>
				@endforeach
		  	</tbody>
		</table>
  	</div>
</div>