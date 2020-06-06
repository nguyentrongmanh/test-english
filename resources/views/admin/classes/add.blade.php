@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">
			Add new class
		</h6>
	</div>
	<div class="card-body">
		<form action="{{ route('class-add') }}" enctype="multipart/form-data" id="add-class-form" method="POST"
			class="needs-validation" novalidate>
			@csrf
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Name
				</label>
				<div class="col-sm-10">
					<input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"
						type="text" required />
					@error('name')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Teacher
				</label>
				<select class="form-control col-sm-9" id="select-teacher" name="teacher_id">
					@foreach ($teachers as $teacher)
					<option value="{{ $teacher->id }}">
						{{ $teacher->name  }} - {{ $teacher->email }}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Main Image
				</label>
				<div class="col-sm-5">
					<input id="main_image" name="image" type="file" />
					<img id="drop" src="" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Target
				</label>
				<div class="col-sm-10">
					<input class="form-control " name="target" placeholder="Target" type="number" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Address
				</label>
				<div class="col-sm-10">
					<input class="form-control" name="address" placeholder="Address" type="text" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Schedule
				</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="schedule" placeholder="Schedule" 
					rows="3"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Description
				</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="description" 
					placeholder="Description" rows="3"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Total Number
				</label>
				<div class="col-sm-10">
					<input class="form-control" name="total_number" placeholder="Total Number" type="number" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Fee
				</label>
				<div class="col-sm-5">
					<input class="form-control" name="fee" placeholder="Fee" type="number" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Register Number
				</label>
				<div class="col-sm-5">
					<input class="form-control" name="register_number" placeholder="Register Number" type="number" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Start Date
				</label>
				<div class="col-sm-5">
					<input class="form-control" max="3000-12-31" min="1000-01-01" name="start_date" type="date"
						required />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					End Date
				</label>
				<div class="col-sm-5">
					<input class="form-control" max="3000-12-31" min="1000-01-01" name="end_date" type="date"
						required />
				</div>
			</div>
			
	</div>
	<div class="add-btn">
		<button class="btn btn-primary" type="submit">
			Add
		</button>
	</div>
	</form>
</div>
</div>
<script>
	$(document).ready(function () {
		$("input[type=file]").on("change", function(event) {
			var fReader = new FileReader();
			fReader.readAsDataURL(event.target.files[0]);
			fReader.onloadend = function(event){
				var img = document.getElementById("drop");
				img.src = event.target.result;
			}
		});
	})
</script>
@endsection

<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>