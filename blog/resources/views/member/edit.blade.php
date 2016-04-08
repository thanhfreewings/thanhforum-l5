@extends('layout')

@section('content')
<form class="form-horizontal" method="POST"  action="/member">
	<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
	<!-- <input type="hidden" name="_method" value="PUT"></input> -->
	<div class="form-group">
		<h4 class="col-md-9 col-md-offset-3">ADD ROLE</h4>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">Name</label>
		<div class="col-md-9">
			<input disabled type="text" class="form-control" value="{{ $user->name }}"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">Email address</label>
		<div class="col-md-9">
			<input disabled type="text" class="form-control" value="{{ $user->email }}"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">Role</label>

		<input type="hidden" name="user_id" value="{{$user->id}}"/>

		<div class="col-md-9">
			<select name="role_id" class="form-control">
					<option></option>
				@foreach($roles as $role)
					<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endforeach
			</select>
			@if($errors->has('role_id'))
				<span class="text-danger">{{$errors->first('role_id')}}</span>
			@endif
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-9 col-md-offset-3">
			<button type="submit" class="btn btn-success">Add role</button>
			<a href="/member" class="btn btn-default pull-right">Cancel</a>
		</div>
	</div>
</form>
@endsection