@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Thêm câu hỏi bài đọc</h6>
	</div>
	<div class="card-body">
		<form method="POST" id="add-reading-form" enctype='multipart/form-data' action="{{ route('create-reading') }}">
			@csrf
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" value="5" name="part" id="inlineRadio1">
				<label class="form-check-label" for="inlineRadio1">Part 5</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" value="6" name="part" id="inlineRadio2">
				<label class="form-check-label" for="inlineRadio2">Part 6</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" checked value="7" name="part" id="inlineRadio3">
				<label class="form-check-label" for="inlineRadio3">Part 7</label>
			</div>
			<div class="form-group" id="quill-wraper">
				<label>Post</label>
				<div id="quill"></div>
			</div>
			<input class="form-control" name="post" type="hidden" rows="3"></input>
			<div class="question-list">
				<div class="question-item">
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Questions</label>
						<input name="questions[0][question]" class="form-control" id="exampleFormControlTextarea1"
							type="text" />
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Option A</label>
						<input class="form-control" name="questions[0][option_a]" id="exampleFormControlTextarea1"
							type="text" />
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Option B</label>
						<input class="form-control" name="questions[0][option_b]" id="exampleFormControlTextarea1"
							type="text" />
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Option C</label>
						<input class="form-control" name="questions[0][option_c]" id="exampleFormControlTextarea1"
							type="text" />
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Option D</label>
						<input class="form-control" name="questions[0][option_d]" id="exampleFormControlTextarea1"
							type="text" />
					</div>
					<div class="form-group">
						<div>Aswer</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="questions[0][answer]" value="A">
							<label class="form-check-label">A</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="questions[0][answer]" value="B">
							<label class="form-check-label">B</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="questions[0][answer]" value="C">
							<label class="form-check-label">C</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="questions[0][answer]" value="D">
							<label class="form-check-label">D</label>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Explain</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" name="questions[0][explain]"
							rows="3"></textarea>
					</div>
				</div>
			</div>
			<button class="btn btn-primary" id="add-question">Them cau hoi</button>
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
			const PART_FIVE = 5;
			const PART_SIX = 6;
			const PART_SEVEN = 7;
			var quill = new Quill('#quill', {
			    theme: 'snow'
			});
			var dataOrder = 0;
			$("#add-reading-form").on("submit", function(e) {
				$("input[name=post]").val(quill.root.innerHTML);
				$(this).submit();
			});

			$('#add-question').on('click', function(e) {
				e.preventDefault();
				dataOrder++;
				var groupTemplate = "<div class='question-item'>" + getQuestionContent(dataOrder) + getOptions(dataOrder) + getAnswer(dataOrder) + getExplain(dataOrder) + "</div>"
				$('.question-list').append(groupTemplate);
			});

			$('input[type=radio][name=part]').change(function() {
				if (this.value == PART_FIVE) {
					$("#quill-wraper").hide(500)
					$("#add-question").prop('disabled', true);
					return
				}
				$("#add-question").prop('disabled', false);
				$("#quill-wraper").show(500)
			});
		});
		var getQuestionContent = function(dataOrder) {
			return "<div class='form-group'>" + 
				"<label>Questions</label>" +
				"<input name='questions[" + dataOrder + "][question]' class='form-control' type='text'></input>" +
			"</div>";
		}
		var getOptions = function(dataOrder) {
			return "<div class='form-group'>" + 
				"<label>Option A</label>" +
				"<input name='questions[" + dataOrder + "][option_a]' class='form-control' type='text'></input>" +
			"</div>" +
			"<div class='form-group'>" + 
				"<label>Option B</label>" +
				"<input name='questions[" + dataOrder + "][option_b]' class='form-control' type='text'></input>" +
			"</div>" +
			"<div class='form-group'>" + 
				"<label>Option C</label>" +
				"<input name='questions[" + dataOrder + "][option_c]' class='form-control' type='text'></input>" +
			"</div>" +
			"<div class='form-group'>" + 
				"<label>Option D</label>" +
				"<input name='questions[" + dataOrder + "][option_d]' class='form-control' type='text'></input>" +
			"</div>";
		}
		var getAnswer = function(dataOrder) {
			return "<div class='form-group'>" +
				"<div>Aswer</div>" +
				"<div class='form-check form-check-inline'>" +
				  	"<input class='form-check-input' type='radio' name='questions[" + dataOrder + "][answer]' id='answer-radion" + dataOrder + "' value='A'>" +
				  	"<label class='form-check-label' for='answer-radion" + dataOrder + "'>A</label>" +
				"</div>" +
				"<div class='form-check form-check-inline'>" +
				  	"<input class='form-check-input' type='radio' name='questions[" + dataOrder + "][answer]' id='answer-radion" + dataOrder + "' value='B'>" +
				  	"<label class='form-check-label' for='answer-radion" + dataOrder + "'>B</label>" +
				"</div>" +
				"<div class='form-check form-check-inline'>" +
				  	"<input class='form-check-input' type='radio' name='questions[" + dataOrder + "][answer]' id='answer-radion" + dataOrder + "' value='C'>" +
				  	"<label class='form-check-label' for='answer-radion" + dataOrder + "'>C</label>" +
				"</div>" +
				"<div class='form-check form-check-inline'>" +
				  	"<input class='form-check-input' type='radio' name='questions[" + dataOrder + "][answer]' id='answer-radion" + dataOrder + "' value='D'>" +
				  	"<label class='form-check-label' for='answer-radion" + dataOrder + "'>D</label>" +
				"</div>" +
			"</div>"
		}
		var getExplain = function(dataOrder) {
			return "<div class='form-group'>" + 
				"<label>Explain</label>" +
				"<textarea name='questions[" + dataOrder + "][explain]' class='form-control' type='text'></textarea>" +
			"</div>";
		}

</script>
@endsection