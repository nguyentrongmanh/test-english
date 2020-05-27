@extends('layouts.admin')

@section('content')
	<div class="card shadow mb-4">
		<div class="card-header py-3">
          	<h6 class="m-0 font-weight-bold text-primary">Thêm câu hỏi bài nghe</h6>
        </div>
        <div class="card-body">
        	<form>
			  	<div class="form-check form-check-inline">
					 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
					 <label class="form-check-label" for="inlineRadio1">Part 1</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
					  <label class="form-check-label" for="inlineRadio2">Part 2</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
					  <label class="form-check-label" for="inlineRadio3">Part 3</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
					  <label class="form-check-label" for="inlineRadio3">Part 4</label>
				</div>
			  	<div class="form-group">
				    <label for="exampleFormControlInput1">Audio</label>
				  	<div class="custom-file">
					    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
					    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
					    <div class="invalid-feedback">Example invalid custom file feedback</div>
					</div>
				</div>
				<div class="form-group">
				    <label for="exampleFormControlInput1">image</label>
				  	<div class="custom-file">
					    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
					    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
					    <div class="invalid-feedback">Example invalid custom file feedback</div>
					  </div>
				</div>
				<div class="form-group">
					<div>Aswer</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
					  <label class="form-check-label" for="inlineRadio1">A</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
					  <label class="form-check-label" for="inlineRadio2">B</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
					  <label class="form-check-label" for="inlineRadio3">C</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
					  <label class="form-check-label" for="inlineRadio3">D</label>
					</div>
				</div>
				<div class="form-group">
				    <label for="exampleFormControlTextarea1">Example textarea</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>
			</form>
        </div>
	</div>
@endsection
