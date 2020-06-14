@extends('layouts.admin')
@php
use Carbon\Carbon;
$class->image = $class->image ?? 'default_class_image.jpg';
@endphp

@section('content')
<div style="margin: 10px;">
	<div class="card shadow mb-4 border-left-warning">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Class infomation</h6>
		</div>
		<div class="card-body">
			<div class="">
				<img class="class-image" src="{{ url('image/' . $class->image) }}" />
			</div>
			<ul class="list-group">
				<li class="list-group-item">
					<p class="label">Class Name</p>
					<p> : {{ $class->name }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Teacher Name</p>
					<p> : {{ $teacher->name }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Target</p>
					<p> : {{ $class->target }} Toeic + </p>
				</li>
				<li class="list-group-item">
					<p class="label">Address</p>
					<p> : {{ $class->address }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Schedule</p>
					<p> : {{ $class->schedule }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Description</p>
					<p> : {{ $class->description }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Total Number</p>
					<p> : {{ $class->total_number }} students</p>
				</li>
				<li class="list-group-item">
					<p class="label">Register Number</p>
					<p> : {{ $class->register_number }} students </p>
				</li>
				<li class="list-group-item">
					<p class="label">Fee</p>
					<p> : {{ $class->fee }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Start Date</p>
					<p> : {{ $class->start_date }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">End Date</p>
					<p> : {{ $class->end_date }} </p>
				</li>
				<li class="list-group-item">
					<p class="label">Create At</p>
					<p> : {{ $class->getFormatCreated() }} </p>
				</li>
			</ul>
		</div>
	</div>
	<div class="card shadow mb-4 border-left-success">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Registered Students</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Student Name</th>
							<th>Student Email</th>
							<th>Registered at</th>
							<th>Link</th>
						</tr>
					</thead>
					<tbody>
						@php

						@endphp
						@foreach ($students as $student)
						<tr style="width: 20px">
							<td>{{ $student->name }}</td>
							<td>{{ $student->email }}</td>
							<td>{{ $student->pivot->created_at }}</td>
							<td><a class="btn btn-primary"
									href="{{ url('admin/users/detail/' . $student->id) }}">Link</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection