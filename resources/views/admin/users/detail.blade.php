@extends('layouts.admin')

@section('content')
<div style="margin: 10px;">
	<div class="card shadow mb-4 border-left-warning">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">User infomation</h6>
		</div>
		<div class="card-body">
			<div class="row">
				@php
				if ($user->image == null) {
				$avatarSrc = url('img/default_avatar.jpg');
				} else {
				$avatarSrc = url('image/' . $user->image);
				}
				@endphp
				<div class="col-sm-3">
					<img class="admin-user-avatar" src="{{ $avatarSrc }}" />
				</div>
				<div class="col-sm-9">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10 detail-value">
							{{ $user->email }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10 detail-value">
							{{ $user->name }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10 detail-value">
							{{ $user->address }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Company</label>
						<div class="col-sm-10 detail-value">
							{{ $user->company }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Age</label>
						<div class="col-sm-10 detail-value">
							{{ $user->age }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Phone</label>
						<div class="col-sm-10 detail-value">
							{{ $user->phone }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Intro</label>
						<div class="col-sm-10 detail-value">
							{{ $user->intro }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Role</label>
						<div class="col-sm-10 detail-value">
							{{ $user->role == 0 ? 'USER' : 'ADMIN' }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card mb-4 py-3 border-left-success">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Test history</h6>
		</div>
		<div class="card-body">
			@foreach ($user->tests as $test )
			<h4>Test result : {{ $test->getFormatCreated() }}</h4>
			<h4 class="w-80-percent small font-weight-bold">Listening Score <span
					class="float-right">{{ $test->getListeningScore() }}/100</span></h4>
			<div class="w-80-percent progress mb-4">
				<div class="progress-bar" role="progressbar" style="width: {{ $test->getListeningScore() }}%"
					aria-valuenow="{{ $test->getListeningScore() }}" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			<h4 class="w-80-percent small font-weight-bold">Reading Score <span
					class="float-right">{{ $test->getReadingScore() }}/100</span>
			</h4>
			<div class="w-80-percent progress mb-4" style="margin-bottom: 30px;">
				<div class="progress-bar bg-info" role="progressbar" style="width: {{ $test->getReadingScore() }}%"
					aria-valuenow="{{ $test->getReadingScore() }}" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			<hr />
			@endforeach
		</div>
	</div>
</div>
@endsection