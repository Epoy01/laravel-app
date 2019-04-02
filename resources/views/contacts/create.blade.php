@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Customer
  </div>
  <div class="card-body">
      <form method="post" action="{{ route('contacts.store') }}">
          <div class="form-group">
              @csrf
              <label for="fname">First Name:</label>
              <input type="text" id="fname" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" onkeydown="" />
              @if ($errors->has('fname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fname') }}</strong>
                </span>
              @endif
          </div>
          <div class="form-group">
              @csrf
              <label for="mname">Middle Name:</label>
              <input type="text" class="form-control {{ $errors->has('mname') ? ' is-invalid' : '' }}" name="mname" value="{{ old('mname') }}"/>
              @if ($errors->has('mname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mname') }}</strong>
                </span>
              @endif
          </div>
          <div class="form-group">
              @csrf
              <label for="lname">Last Name:</label>
              <input type="text" class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}"/>
              @if ($errors->has('lname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lname') }}</strong>
                </span>
              @endif
          </div>
          <div class="form-group">
              @csrf
              <label for="age">Age:</label>
              <input type="numeric" min='1' class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}"/>
              @if ($errors->has('age'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('age') }}</strong>
                </span>
              @endif
          </div>
          <div class="form-group">
              @csrf
              <label for="gen">Gender:</label>
              <select class="form-control {{ $errors->has('gen') ? ' is-invalid' : '' }}" name="gen" value="{{ old('gen') }}">
                <option>Male</option>
                <option>Female</option>
              </select>
              @if ($errors->has('gen'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gen') }}</strong>
                </span>
              @endif
          </div>
          <div class="form-group">
              @csrf
              <label for="contact">Contact Number:</label>
              <input type="text" class="form-control {{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{ old('contact') }}"/>
              @if ($errors->has('contact'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('contact') }}</strong>
                </span>
              @endif
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
