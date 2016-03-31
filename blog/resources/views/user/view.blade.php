@extends('layout')

@section('content')
	<title>View thread</title>
	<div class="" lass="wrapper">
	    <ul class="media-list underline m-b-20 p-b-15">
	        <li class="media media-sm clearfix">
	            <img class="media-object" src="/{{ $user->avatar }}" /><br/>
	            <div class="media-body">
	                <span class="email-to">user name: {{ $user->name }}</span><br/>
	                <span class="email-to">email: {{ $user->email }}</span><br/>
	                <span><a href="/message/reply/{{ $user->id }}">message</a></span>
	            </div>
	        </li>
		</ul>
	</div>
	@if(!$user->threads->isEmpty())
		@foreach ($user->threads as $thread)
			<h4><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h4>
			<p>Created at {{$thread->created_at}}
			@if(!empty($thread->updated_at))
				<p>update at {{$thread->updated_at}}</p>
			@endif
			<p>{{$thread->content}}</p>
		@endforeach
	@else
		<p>do not have a thread...</p>
	@endif

@endsection