@extends('layout')
@section('content')

<div class="row">
	<div class="col-md-2">
		<br/><img src="/{{$user->avatar}}" class="img-thumbnail img-responsive"><br/><br/>
		<a href="/user/upload" class="btn btn-default btn-block">Change Picture</a>
	</div>
	<div class="col-md-2"></div>
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
	            <a href="#modal-update" class="btn btn-warning" data-toggle="modal">Click to update</a>
	        </div>

			<!-- #modal-dialog -->
			<div class="modal fade" id="modal-update">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Update profile</h4>
						</div>
						<div class="modal-body">
							You want to update profile...?
						</div>
						<div class="modal-footer">
							<button class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-sm btn-warning">Update</button>
						</div>
					</div>
				</div>
			</div>
			<!--end #modal-dialog -->

		</form><hr/>
		<p class="text-right">Last updated: {{ $user->updated_at }}</p>
	</div>
</div>
@endsection