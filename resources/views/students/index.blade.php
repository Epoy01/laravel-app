@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <div class="container">
    @if(session()->get('success'))
      <div class="alert alert-success"> {{session()->get('success')}}</div>
    @endif
    <h1>Student Records</h1><hr/>
  </div>
  <div class="form-group">
    <form action="{{route('students.index')}}" method="get">
      <div class="input-group col-sm-12">
        <a href="{{ route('students.create') }}" class="btn btn-success ">Add New Student Record</a>
        <span class="col-sm-4"></span>
        <input  class="form-control" name="search_text" type="text" value="{{ isset($_GET['search_text']) ? $_GET['search_text']:'' }}" />
        <div class="input-group-prepend">
           <input class="form-control btn btn-primary" type="submit" name="search" value="Search" />
        </div>

      </div>
    </form>

  </div>
  <div class="container">
    <div class="table-responsive">
    <table class="table table-striped table-bordered ">
      <thead class="table-primary">
          <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Middle Name</td>
            <td>Last Name</td>
            <td>Course</td>
            <td>Year</td>
            <td>Addsress</td>
            <td>Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($students['data'] as $data)
          <tr>
              <td>{{$data->s_id}}</td>
              <td>{{$data->fname}}</td>
              <td>{{$data->mname}}</td>
              <td>{{$data->lname}}</td>
              <td >{{$data->course}}</td>
              <td>{{$data->yr}}</td>
              <td>{{$data->address}}</td>
              <td>
                <a href="{{ route('students.edit',$data->s_id) }}" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="del({{$data}})">Delete</button>
              </td>
          </tr>
          @endforeach
          @if(isset($students['msg']))
          <tr>
              <td colspan="8" class="alert alert-danger" align="center">{{ $students['msg'] }}</td> 
          </tr>
          @endif
      </tbody>
    </table>
  </div>
    {{ $students['data']->links() }}
  </div>
<div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('students.destroy',0)}}" method="post">
        @csrf
        @method('delete')
      <div class="modal-header alert-danger">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body alert-danger" >
        <input type="text" name="id" id="my_selected">
        <div id="selected"></div>
      </div>
      <div class="modal-footer alert-danger">
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function del(data){
    var my_selected="<p>ID: "+data['s_id']+"<br/>Name: "+data['fname']+" "+data['mname']+" "+data['lname']+"<br/>Course: "+data['course']+"<br/>Year: "+data['yr']+"<br/>Address: "+data['address'];
    $('#selected').html(my_selected);
    $('#my_selected').val(data['s_id']);
  }
</script>
@endsection