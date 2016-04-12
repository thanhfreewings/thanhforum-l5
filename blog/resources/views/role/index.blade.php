@extends('layout')
@section('content')
<title>Role</title>



<table class="table">
	@if (session('error'))
	    <label class="text-danger">{{ session('error') }}</label>
	@endif
	<a href="/role/create" class="btn btn-success pull-right m-b-10">New role</a>
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