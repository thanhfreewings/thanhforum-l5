@extends('layout')
@section('content')
	<title>Member</title>
    <h4 class="m-b-15 m-t-0 p-b-10 underline">Member</h4>

    <table class="table">
    	<tr class="active">
    		<th></th>
    		<th>Name</th>
    		<th>Email</th>
    		<th>Role</th>
    		<th>Created at</th>
    		<th></th>
    	</tr>
	@foreach ($users as $key => $user)
		<tr>
	        <td class="media media-sm clearfix">
	            <a href="/user/view/{{$user->id}}" class="pull-left">
	                <img class="media-object rounded-corner" src="/{{ $user->avatar }} " />
	            </a>
	        </td>
	        <td>{{ $user->name }}</td>
	        <td>{{ $user->email }}</td>
	        <td>{{ $user->getRole($user->id) }}</td>
	        <td>{{ $user->created_at }}</td>
	        <td><a href="/member/{{$user->id}}/edit" class="btn btn-success btn-sm pull-right">Edit</a></td>
		</tr>
	@endforeach
    </table>
@endsection