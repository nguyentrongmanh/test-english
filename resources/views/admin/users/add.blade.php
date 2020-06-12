@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Add new user</h6>
	</div>
	<div class="card-body">
		<form method="POST" id="add-reading-form" enctype='multipart/form-data' action="{{ route('user-create') }}">
			@csrf
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
						placeholder="email">
					@error('email')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
						placeholder="Password">
					@error('password')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
						placeholder="Name">
					@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
					Avatar
				</label>
				<div class="col-sm-5">
					<input id="main_image" name="image" type="file" />
					<div class="drop-container">
						<img id="drop" class="hidden" />
						<div class="drop-text">Drop files</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Address</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="address" placeholder="Address">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Company</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="company" placeholder="company">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Age</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" name="age" placeholder="Age">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Phone</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" name="phone" placeholder="Phone">
				</div>
			</div>
			<fieldset class="form-group">
				<div class="row">
					<legend class="col-form-label col-sm-2 pt-0">Role</legend>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="role" id="user" value="0" checked>
							<label class="form-check-label" for="user">
								User
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="role" id="admin" value="1">
							<label class="form-check-label" for="admin">
								Admin
							</label>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="add-btn">
				<button type="submit" class="btn btn-primary">Add</button>
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
				$("#drop").removeClass("hidden") 
				$("#drop").attr("src", event.target.result)
				$(".drop-text").addClass("hidden")
			}
		});
	})
</script>
@endsection