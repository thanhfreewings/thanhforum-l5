@extends('layout')
@section('content')
<title>Member</title>
<label><h4>Roles</h4></label>
<a href="/role/create" class="pull-right"><h4>Create</h4></a>

<table class="table">
	<tr class="active">
		<th>Name</th>
		<th>Created at</th>
		<th></th>
		<th></th>
	</tr>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{$role->name}}</td>
		<td>{{$role->created_at}}</td>
		<td></td>
		<td>
			<form action="/role/{{$role->id}}" method="POST">
				{!!csrf_field()!!}
				<input type="hidden" name="_method" value="DELETE"></input>
				<button class="btn btn-warning btn-xs pull-right">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
@endsection