@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Students
  </div>
  <div class="card-body">
      <form method="post" action="{{ route('students.store') }}">
          <div class="form-group">
            @csrf
              <label for="fname">First Name:</label>
              <input type="text" id="fname" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" />
            @if ($errors->has('fname'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('fname') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group">
            @csrf
              <label for="mname">Middle Name:</label>
              <input type="text" id="mname" class="form-control {{ $errors->has('mname') ? ' is-invalid' : '' }}" name="mname" value="{{ old('mname') }}" />
            @if ($errors->has('mname'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('mname') }}</strong>
              </span>
            @endif 
          </div>
          <div class="form-group">
            @csrf
              <label for="lname">Last Name:</label>
              <input type="text" id="lname" class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{old('lname')}}" />
            @if ($errors->has('lname'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('lname') }}</strong>
              </span>
            @endif 
          </div>
          <div class="form-group">
            @csrf
              <label for="course">Course:</label>
              <input type="text" id="course" class="form-control {{ $errors->has('course') ? ' is-invalid' : '' }}" name="course" value="{{old('course')}}" />
            @if ($errors->has('course'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('course') }}</strong>
              </span>
            @endif 
          </div>
          <div class="form-group">
            @csrf
              <label for="yr">Year:</label>
              <input type="text" id="yr" class="form-control {{ $errors->has('yr') ? ' is-invalid' : '' }}" name="yr" value="{{old('yr')}}" />
              @if ($errors->has('yr'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('yr') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group">
            @csrf
              <label for="address">Address:</label>
              <input type="text" id="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{old('address')}}" />
            @if ($errors->has('address'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
            @endif
          </div>

          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>

@endsection