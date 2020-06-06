@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit class
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('class-edit', ['id' => $class->id]) }} " enctype="multipart/form-data" id="edit-class-form" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Name
                </label>
                <div class="col-sm-10">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" required="" type="text" value="{{ $class->name }}">
                    </input>
                    @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Teacher
                </label>
                <select class="form-control col-sm-9" id="select-teacher" name="teacher_id">
                    @foreach ($teachers as $item)
                    @php
                        $selected = '';
                        if($item->id == $teacherId)    // Any Id
                        {
                            $selected = 'selected="selected"';
                        }
                    @endphp
                    <option value="{{ $item->id }}" {{$selected}}>
                        {{ $item->name  }} - {{ $item->email }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Target
                </label>
                <div class="col-sm-10">
                    <input class="form-control" name="target" placeholder="Target" type="text" value="{{ $class->target }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Address
                </label>
                <div class="col-sm-10">
                    <input class="form-control" name="address" placeholder="Address" type="text" value="{{ $class->address }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Schedule
                </label>
                <div class="col-sm-10">
                    <input class="form-control" name="schedule" placeholder="Schedule" type="text" value="{{ $class->schedule }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Description
                </label>
                <div class="col-sm-10">
                    <input class="form-control" name="description" placeholder="Description" type="text" value="{{ $class->description }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Total Number
                </label>
                <div class="col-sm-10">
                    <input class="form-control" name="total_number" placeholder="Total Number" type="text" value="{{ $class->total_number }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Fee
                </label>
                <div class="col-sm-5">
                    <input class="form-control" name="fee" placeholder="Fee" type="number" value="{{ $class->fee }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Register Number
                </label>
                <div class="col-sm-5">
                    <input class="form-control" name="register_number" placeholder="Register Number" type="number" value="{{ $class->register_number }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Start Date
                </label>
                <div class="col-sm-5">
                    <input class="form-control" max="3000-12-31" min="1000-01-01" name="start_date" required="" type="date" value="{{ $class->start_date }}">
                    </input>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    End Date
                </label>
                <div class="col-sm-5">
                    <input class="form-control" max="3000-12-31" min="1000-01-01" name="end_date" required="" type="date" value="{{ $class->end_date }}">
                    </input>
                </div>
            </div>
            <div class="add-btn">
                <button class="btn btn-primary" type="submit">
                    Add
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
