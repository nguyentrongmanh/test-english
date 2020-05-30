@extends('layouts.admin')

@section('content')
<a style="margin: 15px;" href="{{ url('/admin/readings/create') }}" class="btn btn-success btn-icon-split">
	<span class="icon text-white-50">
		<i class="fas fa-plus"></i>
	</span>
	<span class="text">Thêm mới</span>
</a>
<div class="card shadow mb-4">
	@include("admin/elements/part_five", [ "readingQuestions" => $readingQuestions])
	{{-- @include("admin/elements/part_six", [ "readingQuestions" => $readingQuestions]) --}}
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
@endsection