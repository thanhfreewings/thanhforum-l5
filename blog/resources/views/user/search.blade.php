@extends('layout')
@section('content')
@if(!empty($users))
    <h4 class="m-b-15 m-t-0 p-b-10 underline">Result search:</h4>
	@foreach ($users as $key => $user)
	<div class="" lass="wrapper">
	    <ul class="media-list underline m-b-20 p-b-15">
	        <li class="media media-sm clearfix">
	            <a href="/user/view/{{$user->id}}" class="pull-left">
	                <img class="media-object rounded-corner" src="/{{ $user->avatar }} " />
	            </a><br/>
	            <div class="media-body">
	                <span class="email-from text-inverse f-w-600"><a href="/user/view/{{$user->id}} ">{{ $user->name }}</a></span><br/>
	                <span class="email-to">
	                    email: {{ $user->email }}
	                </span><br/>
	            </div>
	        </li>
		</ul>
	</div>
	@endforeach
@endif
@if(empty($users))
	<p>Don't have result search...</p>
@endif
@endsection