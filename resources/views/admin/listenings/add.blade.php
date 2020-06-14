@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Thêm câu hỏi bài nghe</h6>
	</div>
	<div class="card-body">
		<form method="POST" id="add-listening-form" enctype='multipart/form-data'
			action="{{ route('create-listening') }}">
			@csrf
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" value="1" name="part" id="inlineRadio1" checked>
				<label class="form-check-label" for="inlineRadio1">Part 1</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" value="2" name="part" id="inlineRadio2">
				<label class="form-check-label" for="inlineRadio2">Part 2</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" value="3" name="part" id="inlineRadio3">
				<label class="form-check-label" for="inlineRadio3">Part 3</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" value="4" name="part" id="inlineRadio4">
				<label class="form-check-label" for="inlineRadio4">Part 4</label>
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">Audio</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="audio" accept=".mp3" required>
					<label class="custom-file-label" for="audio">Choose file...</label>
					<div class="invalid-feedback">Example invalid custom file feedback</div>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">image</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="main_img">
					<label class="custom-file-label" for="main_img">Choose file...</label>
					<div class="invalid-feedback">Example invalid custom file feedback</div>
				</div>
				<div class="drop-container">
					<img id="drop" class="hidden" />
					<div class="drop-text">Drop files</div>
				</div>
			</div>
			<div class="part-one-and_two-sheet">
				<div class="form-group">
					<div>Aswer</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="answer" id="inlineRadio1" value="A">
						<label class="form-check-label">A</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="answer" id="inlineRadio2" value="B">
						<label class="form-check-label">B</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="answer" id="inlineRadio3" value="C">
						<label class="form-check-label">C</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="answer" id="inlineRadio3" value="D">
						<label class="form-check-label">D</label>
					</div>
				</div>
				<div class="form-group">
					<label>Example textarea</label>
					<textarea class="form-control" name="explain" rows="3"></textarea>
				</div>
			</div>
			<div class="question-list" style="display: none;">
				@for ($i = 1; $i < 4; $i++) <div class="question-item">
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Questions {{ $i }}</label>
						<input name="questions[{{$i}}][question]" class="form-control" id="exampleFormControlTextarea1"
							type="text" />
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Option A</label>
						<input class="form-control" name="questions[{{$i}}][option_a]" id="exampleFormControlTextarea1"
							type="text" />
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Option B</label>
						<input class="form-control" name="questions[{{$i}}][option_b]" id="exampleFormControlTextarea1"
							type="text" />
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Option C</label>
						<input class="form-control" name="questions[{{$i}}][option_c]" id="exampleFormControlTextarea1"
							type="text" />
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Option D</label>
						<input class="form-control" name="questions[{{$i}}][option_d]" id="exampleFormControlTextarea1"
							type="text" />
					</div>
					<div class="form-group">
						<div>Aswer</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="questions[{{$i}}][answer]" value="A">
							<label class="form-check-label">A</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="questions[{{$i}}][answer]" value="B">
							<label class="form-check-label">B</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="questions[{{$i}}][answer]" value="C">
							<label class="form-check-label">C</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="questions[{{$i}}][answer]" value="D">
							<label class="form-check-label">D</label>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Explain</label>
						<textarea class="form-control" id="exampleFormControlTextarea1"
							name="questions[{{$i}}][explain]" rows="3"></textarea>
					</div>
			</div>
			@endfor
	</div>
	<button type="submit" class="btn btn-primary">Add</button>
	</form>
</div>
</div>
<script>
	$(document).ready(function () {
		$("input[name=main_img]").on("change", function(event) {
			var fReader = new FileReader();
			var fileName = event.target.value
			fReader.readAsDataURL(event.target.files[0]);
			fReader.onloadend = function(event){
				var img = document.getElementById("drop");
				$("#drop").removeClass("hidden") 
				$("#drop").attr("src", event.target.result)
				$(".drop-text").addClass("hidden")
				$("label[for=main_img]").html(fileName)
			}
		});
	})
</script>

<script>
	$(document).ready(function () {
		$("input[name=audio]").on("change", function(event) {
			var fReader = new FileReader();
			var fileName = event.target.value
			fReader.readAsDataURL(event.target.files[0]);
			fReader.onloadend = function(event){
				console.log(event)
				$("label[for=audio]").html(fileName)
			}
		});
	})
</script>
<script type="text/javascript">
	$(document).ready(function() {
		const PART_ONE = 1;
		const PART_TWO = 2;
		const PART_THREE = 3;
		const PART_FOUR = 4;
		var dataOrder = 0;
		$('input[type=radio][name=part]').change(function() {
			if (this.value == PART_TWO) {
				$("input[name=main_img]").prop('disabled', true);
			} else {
				$("input[name=main_img]").prop('disabled', false);
			}
			if (this.value == PART_THREE || this.value == PART_FOUR) {
				$(".part-one-and_two-sheet").hide(500)
				$(".question-list").show(1000)
			} else {
				$(".question-list").hide(1000)
				$(".part-one-and_two-sheet").show(500)
			}
		});

		$("input[name=audio]").change(function (){
			var fileName = $(this).val();
		});
	});
</script>
@endsection