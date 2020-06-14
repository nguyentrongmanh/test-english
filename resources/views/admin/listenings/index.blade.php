@extends('layouts.admin')

@section('content')
<div class="btn-group" role="group" aria-label="Basic example" style="margin-left: 10px;">
	<a href="{{ url('admin/listenings?part=1') }}" type="button" class="btn btn-secondary">Part 1</a>
	<a href="{{ url('admin/listenings?part=2') }}" type="button" class="btn btn-secondary">Part 2</a>
	<a href="{{ url('admin/listenings?part=3') }}" type="button" class="btn btn-secondary">Part 3</a>
	<a href="{{ url('admin/listenings?part=4') }}" type="button" class="btn btn-secondary">Part 4</a>
</div>
<a style="margin: 15px;" href="{{ url('/admin/listenings/create') }}" class="btn btn-success btn-icon-split">
	<span class="icon text-white-50">
		<i class="fas fa-plus"></i>
	</span>
	<span class="text">Thêm mới</span>
</a>
<div class="card shadow mb-4">
	@if ($part == 1)
	@include("admin/elements/part_one", [ "listeningQuestions" => $listeningQuestions, "limit" => $limit, "part" =>
	$part])
	@endif
	@if ($part == 2)
	@include("admin/elements/part_two", [ "listeningQuestions" => $listeningQuestions, "limit" => $limit, "part" =>
	$part])
	@endif
	@if ($part == 3)
	@include("admin/elements/part_three", [ "listeningQuestions" => $listeningQuestions, "limit" => $limit, "part" =>
	$part])
	@endif
	@if ($part == 4)
	@include("admin/elements/part_four", [ "listeningQuestions" => $listeningQuestions, "limit" => $limit, "part" =>
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