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
				<li class="list-group-item">Class Name: {{ $class->name }}</li>
				<li class="list-group-item">Teacher Name: {{ $class->teacher->name }}</li>
				<li class="list-group-item">Target: {{ $class->target }} Toeic +</li>
				<li class="list-group-item">Address: {{ $class->address }}</li>
				<li class="list-group-item">Schedule: {{ $class->schedule }}</li>
				<li class="list-group-item">Description: {{ $class->description }}</li>
				<li class="list-group-item">Total Number: {{ $class->total_number }} students</li>
				<li class="list-group-item">Register Number: {{ $class->register_number }} students</li>
				<li class="list-group-item">Fee: {{ $class->fee }}</li>
				<li class="list-group-item">Start Date: {{ $class->start_date }}</li>
				<li class="list-group-item">End Date: {{ $class->end_date }}</li>
				<li class="list-group-item">Create At: {{ $class->getFormatCreated() }}</li>
			</ul>
		</div>
	</div>
</div>
@endsection