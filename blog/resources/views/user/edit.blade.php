@extends('layout')
@section('content')

<div class="row">
	<div class="col-md-4">
		<img src="/{{$user->avatar}}" ><br/><br/>
		<a href="/user/upload" class="btn btn-default">Change Picture</a>
	</div>
	<div class="col-md-8">		
		<form class="form-horizontal" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
			<div class="form-group">
				<label>Name</label>
				@if($errors->has('name'))
				<span class="text-danger">{{$errors->first('name')}}</span>
				@endif
				<input name="name" type="text" class="form-control" value="{{ $user->name }}">
			</div>
			<div class="form-group">
				<label>Email address</label>
				@if($errors->has('email'))
				<span class="text-danger">{{$errors->first('email')}}</span>
				@endif
				<input name="email" type="text" class="form-control" value="{{ $user->email }}">
			</div>
			<div class="form-group">
				<label>Password (more than 6 character!)</label>
				@if($errors->has('password'))
				<span class="text-danger">{{$errors->first('password')}}</span>
				@endif
				<input name="password" type="password" class="form-control">
			</div>
	        <div class="form-group">
	            <button type="submit" class="btn btn-warning">Click to update</button>
	        </div>
		</form><hr/>
		<p class="text-right">Last updated: {{ $user->updated_at }}</p>
	</div>
</div>
@endsection