@extends('layouts.admin')

@section('content')
<div class="btn-group" role="group" aria-label="Basic example" style="margin-left: 10px;">
	<a href="{{ url('admin/readings?part=5') }}" type="button" class="btn btn-secondary">Part 5</a>
	<a href="{{ url('admin/readings?part=6') }}" type="button" class="btn btn-secondary">Part 6</a>
	<a href="{{ url('admin/readings?part=7') }}" type="button" class="btn btn-secondary">Part 7</a>
</div>
<a style="margin: 15px;" href="{{ url('/admin/readings/create') }}" class="btn btn-success btn-icon-split">
	<span class="icon text-white-50">
		<i class="fas fa-plus"></i>
	</span>
	<span class="text">Thêm mới</span>
</a>
<div class="card shadow mb-4">
	@if ($part == 5)
	@include("admin/elements/part_five", [ "readingQuestions" => $readingQuestions, "limit" => $limit, "part" =>
	$part])
	@endif
	@if ($part == 6)
	@include("admin/elements/part_six", [ "readingQuestions" => $readingQuestions, "limit" => $limit, "part" =>
	$part])
	@endif
	@if ($part == 7)
	@include("admin/elements/part_seven", [ "readingQuestions" => $readingQuestions, "limit" => $limit, "part" =>
	$part])
	@endif
</div>
@if (session('success'))
<script type="text/javascript">
	swal({
		title: "Tạo câu hỏi mới thành công!",
		icon: "success",
		button: "Ok!",
	});
</script>
@endif
@if (session('edit'))
<script type="text/javascript">
	swal({
		title: "Edit success",
		icon: "success",
		button: "Ok!",
	});
</script>
@endif

@if (session('delete'))
<script type="text/javascript">
	swal({
		title: "Delete success",
		icon: "success",
		button: "Ok!",
	});
</script>
@endif

@if (session('error'))
<script type="text/javascript">
	swal({
		title: "An error occurred",
		icon: "error",
		dangerMode: true,
	});
</script>
@endif
@endsection