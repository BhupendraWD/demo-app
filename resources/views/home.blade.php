@extends('layout')
@section('title',"Home")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
    <h5>Student form</h5>
    @if(session('success'))
    <div class="alert alert-success my-4">
        {{ session('success') }}
    </div>
@endif
    <form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

</div>
<div class="form-group">
<label for="phone">Phone</label>
<input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" required>
@if ($errors->has('phone'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
<label for="gender">Gender</label>
<select name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" required>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
@if ($errors->has('gender'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('gender') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
<label>Courses</label>
<div class="form-check">
<input type="checkbox" name="course_1" class="form-check-input">
<label class="form-check-label">Course 1</label>
</div>
<div class="form-check">
<input type="checkbox" name="course_2" class="form-check-input">
<label class="form-check-label">Course 2</label>
</div>
</div>
<button type="submit" class="btn btn-primary my-3">Submit</button>

   </form>
</div>
</div>
<div>
@endsection