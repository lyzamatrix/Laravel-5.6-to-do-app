<!-- index.blade.php -->

@extends('master')
@section('content')

  <div class="container">
    <div><h2>ToDo List App</h2></div>
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
        <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus-square" aria-hidden="true"></i> 
  Add
</button></th>
      </tr>
    </thead>
    <tbody>
      @foreach($cruds as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['post']}}</td>
        <td><a href="{{action('CRUDController@edit', $post['id'])}}" class="btn btn-warning" id="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>
        <td> 
            <button class="btn btn-danger" data-toggle="modal" data-target="#delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>     
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>

<!-- Add New Task Modal-->
<form class="form-horizontal" role="form" method="post" action="{{url('crud')}}">
        {{csrf_field()}}
      <div class="modal fade" id="add" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add New Task</h4>
            </div>
              <div class="modal-body">
                <div class="form-group row add">
                  <label class="contro-label col-sm-2" for="title">Title </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Task title" required>
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="contro-label col-sm-2" for="body">Task </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="body" name="post" placeholder="Task Description" required>
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Task</button>
            </div>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
 </form>

<!-- Delete Task Modal-->
<form class="form-horizontal" role="form" method="post" action="{{action('CRUDController@destroy', $post['id'])}}">
        {{csrf_field()}}     
    <input name="_method" type="hidden" value="DELETE">
      <div class="modal fade" id="delete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete Task</h4>
            </div>
              <div class="modal-body">
                <h4>Are you sure you want to delete this task?</h4>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete Task</button>
            </div>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
 </form>

@endsection