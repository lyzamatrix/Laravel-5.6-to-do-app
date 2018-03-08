<!-- index.blade.php -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

@extends('master')
@section('content')

  <div class="container">
  
    <table class="table table-striped">
     @if(Session::has('success_msg'))
        <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        @endif
    <thead>
      <tr>
        <th>ID</th>
        <th>Task Title</th>
        <th>Task Description</th>
        <th>Action</th>
        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
  Add New Task
</button></td>
      </tr>
    </thead>
    <tbody>
      @foreach($cruds as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['post']}}</td>
        <td><a href="{{action('CRUDController@edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('CRUDController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>


<div class="modal fade" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New Task</h4>
      </div>
      <div class="modal-body">
        <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group row add">
            <label class="contro-label col-sm-2" for="title">Title :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="title" name="title" placeholder="Task title" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="contro-label col-sm-2" for="body">Task :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="body" name="body" placeholder="Task Description" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add Task</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
@endsection