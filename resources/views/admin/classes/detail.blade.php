@extends('layouts.admin')
@php
use Carbon\Carbon;
@endphp

@section('content')
<div style="margin: 10px;">
	<div class="card shadow mb-4 border-left-warning">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Class infomation</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-3">
					<img class="admin-user-avatar" src="{{ url('img/default_avatar.png') }}" />
				</div>
				<div class="col-sm-9">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10 detail-value">
							{{ $class->name }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Teacher Name</label>
						<div class="col-sm-10 detail-value">
							{{ $class->teacher_name }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Target</label>
						<div class="col-sm-10 detail-value">
							{{ $class->target }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10 detail-value">
							{{ $class->address }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Schedule</label>
						<div class="col-sm-10 detail-value">
							{{ $class->schedule }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Description</label>
						<div class="col-sm-10 detail-value">
							{{ $class->description }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Total Number</label>
						<div class="col-sm-10 detail-value">
							{{ $class->total_number }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Fee</label>
						<div class="col-sm-10 detail-value">
							{{ $class->fee }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Register Number</label>
						<div class="col-sm-10 detail-value">
							{{ $class->register_number }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Start Date</label>
						<div class="col-sm-10 detail-value">
							{{ $class->start_date }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">End Date</label>
						<div class="col-sm-10 detail-value">
							{{ $class->end_date }}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Create At</label>
						<div class="col-sm-10 detail-value">
							{{ Carbon::createFromFormat("Y-m-d H:i:s", $class->created_at)->format("Y-m-d") }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection