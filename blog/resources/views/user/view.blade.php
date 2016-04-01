@extends('layout')

@section('content')
	<title>View thread</title>
	<div class="" lass="wrapper">
	    <ul class="media-list underline m-b-20 p-b-15">
	        <li class="media media-sm clearfix">
	            <img class="media-object img-thumbnail" src="/{{ $user->avatar }}" /><br/>
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
			<h4><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h4><br/>
			@if(!empty($thread->image))
				<img src="/{{ $thread->image }}" class="img-responsive"><br/><br/>
			@endif
			<span>At {{$thread->created_at}}</span>
			<span>
				@if(!empty($thread->updated_at))
					|<span>updated {{$thread->updated_at}}</span>
				@endif
			</span>|<span>{{ $thread->countComment() }} Comments</span>
			<p>{{$thread->content}}[...]</p><br/>
			<a href="/thread/view/{{$thread->id}}" class="read-btn"><p class="text-right">Read More <i class="fa fa-angle-double-right"></i></p></a><br/>
		@endforeach
	@else
		<p>do not have a thread...</p>
	@endif

@endsection