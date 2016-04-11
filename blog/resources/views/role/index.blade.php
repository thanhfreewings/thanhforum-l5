@extends('layout')
@section('content')
<title>Role</title>



<table class="table">
	<tr>
		<th>
			@if (session('error'))
			    <p class="text-danger">{{ session('error') }}</p>
			@endif
		</th>
		<th></th>
		<th></th>
		<!-- <th></th> -->
		<th><a href="/role/create" class="pull-right"><h5>New role</h5></a></th>
	</tr>
	<tr class="active">
		<th>Name</th>
		<th>Created at</th>
		<th>Updated at</th>
		<!-- <th></th> -->
		<th></th>
	</tr>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{$role->name}}</td>
		<td>{{$role->created_at}}</td>
		<td>
			@if(!empty($role->updated_at) && $role->created_at!=$role->updated_at)
				{{$role->updated_at}}
			@endif
		</td>
		<!-- <td><a href="/role/{{$role->id}}/edit" class="btn btn-success btn-xs pull-right">Edit</a></td> -->
		<td>
			<form action="/role/{{$role->id}}" method="POST">
				{!!csrf_field()!!}
				<input type="hidden" name="_method" value="DELETE"></input>
				<button class="btn btn-success btn-xs pull-right">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
@endsection