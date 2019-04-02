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
      <form method="post" action="{{ route('cms.store') }}">
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
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
<script type="text/javascript">
  function check(){
  }
</script>
@endsection
