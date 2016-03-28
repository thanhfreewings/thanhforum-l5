@extends('layout')
@section('content')
@if(!empty($users))
	@foreach ($users as $key => $user)
		<a href="/user/view/{{$user->id}} "><img src="/{{ $user->avatar }}" class="img-circle" height="40" width="40"><h5>{{ $user->name }}</h5></a><hr>
	@endforeach
@endif
@if(empty($users))
	<p>Don't have result search...</p>
@endif
@endsection