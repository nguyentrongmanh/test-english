@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Add new class</h6>
	</div>
	<div class="card-body">
		<form method="POST" id="add-class-form" enctype='multipart/form-data' action="{{ route('class-add') }}">
			@csrf
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
				<label class="col-sm-2 col-form-label">Target</label>
				<div class="col-sm-10">
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
						placeholder="Name">
					@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Address</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="address" placeholder="Address">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Schedule</label>
				<div class="col-sm-10">
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
						placeholder="Name">
					@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-10">
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
						placeholder="Name">
					@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Total Number</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="company" placeholder="company">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Fee</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" name="age" placeholder="Age">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Register Number</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" name="age" placeholder="Age">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Start Date</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" name="phone" placeholder="Phone">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">End Date</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" name="phone" placeholder="Phone">
				</div>
			</div>
			<div class="add-btn">
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
		</form>
	</div>
</div>
@endsection