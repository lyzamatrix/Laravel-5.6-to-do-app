<!-- create.blade.php -->
@extends('master')
@section('content')
<div class="container">
	<form method="post" action="{{url('crud')}}">
		<div class="form-group row">
			{{csrf_field()}}
			<label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
				<div class="col-sm-8">
					<input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Task title" name="title" required>
				</div>
		
		</div>
		<div class="form-group row">
			<label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Task</label>
				<div class="col-sm-10">
					<textarea name="post" rows="8" cols="85" placeholder="Task Description" class="form-control form-control-lg" required></textarea>
				</div>
		</div>
		<div class="form-group row">
				<div class="col-md-3"></div>
					<input type="submit" class="btn btn-primary" class="form-control form-control-lg">
		</div>		
	</form>
</div>
@endsection