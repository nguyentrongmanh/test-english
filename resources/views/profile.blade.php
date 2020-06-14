@extends('layouts.app')

@section('content')
<div class="row profile-page">
	<div class="col-md-8 offset-md-2">
		<div class="card shadow mb-4 " id="profile">
			<div class="card-header py-3">
				<h2 class="m-0 font-weight-bold text-primary">User Profile</h2>
				<button type="button" class="change-pass">
					<a href="/change-password">Change your password</a>
				</button>
				
			</div>
			<div class="card-body">
				<form method="POST" id="add-reading-form" enctype='multipart/form-data'
					action="{{ route('profile') }}">
					@csrf
					<input type="hidden" name="id" value="{{ $user->id }}">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" readonly value="{{ $user->email }}" name="email">
						</div>
					</div>
					@php
					$imageFileName = $user->image ?? null;
					@endphp
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">
							Avatar
						</label>
						<div class="col-sm-5">
							<input id="main_image" name="image" type="file" />
							<div class="drop-container">
								<img id="drop" src="{{ url('image/' . $imageFileName) }}"
									class="{{$imageFileName == null ? 'hidden' : null }}" />
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control @error('name') is-invalid @enderror"
								value="{{ $user->name }}" name="name" placeholder="Name">
							@error('name')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $user->address }}" name="address"
								placeholder="Address">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Company</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $user->company }}" name="company"
								placeholder="Company">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Age</label>
						<div class="col-sm-5">
							<input type="number" class="form-control" value="{{ $user->age }}" name="age" placeholder="Age">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Phone</label>
						<div class="col-sm-5">
							<input type="number" class="form-control" value="{{ $user->phone }}" name="phone"
								placeholder="Phone">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Intro</label>
						<div class="col-sm-10">
							<textarea class="form-control"  name="intro" placeholder="Introduce yourself"
								rows="5">{{ $user->intro }}</textarea>
						</div>
					</div>
					<div class="add-btn">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h2 class="m-0 font-weight-bold text-primary">Registered Classes</h2>
			</div>
			<div class="card-body">
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th>Class Name</th>
							<th>Target</th>
							<th>Schedule</th>
							<th>Start Date</th>
						</tr>
					</thead>
					<tbody>
						@foreach($user->classes as $class)
						<tr>
							<td>{{ $class->name }}</td>
							<td>{{ $class->target }}</td>
							<td>{{ $class->schedule }}</td>
							<td>{{ $class->start_date }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
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
			}
		});
	})
</script>

@if (session('success'))
<script type="text/javascript">
    swal({
        title: "Thành công",
        icon: "success",
        button: "OK!",
    });
</script>
@endif

@if (session('error'))
<script type="text/javascript">
    swal({
        title: "Có lỗi xảy ra, vui lòng thử lại",
        icon: "error",
        dangerMode: true,
    });
</script>
@endif

@endsection