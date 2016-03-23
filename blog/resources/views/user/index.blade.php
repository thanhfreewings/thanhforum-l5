@extends('layout')

@section('content')
	<h1>Users</h1>
		<div class="col-md-9 col-lg-12">
			<table class="table table-striped">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th></th>
				</tr>
				@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td><a href="">edit</a></td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection