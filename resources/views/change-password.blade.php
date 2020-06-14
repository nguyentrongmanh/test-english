@extends('layouts.auth')

@section('content')
<div class="row profile-page">
	<div class="col-md-8 offset-md-2">
		<div class="card shadow mb-4 " id="profile">
			<div class="card-header py-3">
				<h2 class="m-0 font-weight-bold text-primary">Change your password</h2>
			</div>
			<div class="card-body">
				<form method="POST" id="form-change-password" enctype='multipart/form-data'
					action="{{ route('change-password') }}">
					@csrf
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Current Password</label>
						<div class="col-sm-10">
							<input class="form-control" type="password" placeholder="Current Password" name="current-password">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">New Password</label>
						<div class="col-sm-10">
							<input class="form-control" type="password" placeholder="New Password" name="password">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Confirm Password</label>
						<div class="col-sm-10">
							<input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
						</div>
					</div>
					<div class="add-btn">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@if (session('error1'))
<script type="text/javascript">
    swal({
        title: "Mật khẩu mới không trùng nhau",
        icon: "error",
        dangerMode: true,
    });
</script>
@endif

@if (session('error2'))
<script type="text/javascript">
    swal({
        title: "Mật khẩu hiện tại không đúng",
        icon: "error",
        dangerMode: true,
    });
</script>
@endif

@endsection