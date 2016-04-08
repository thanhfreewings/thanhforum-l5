@extends('layout')

@section('content')
<title>View user</title>
<div class="col-md-9">
	<div class="row">
		<div class="col-md-3">
            <img class="media-object img-thumbnail" src="/{{ $user->avatar }}" />
        </div>
        <div class="col-md-1">
        	<p class="text-right">Name</p>
        	<p class="text-right">Role</p>
        	<p class="text-right">Email</p>
        </div>
        <div class="col-md-8">
            <p>{{ $user->name }}</p>
            <p>{{ $user->getRole()}}</p>
            <p>{{ $user->email }}</p>
            <p><a href="/message/reply/{{ $user->id }}">message</a>
        </div>
	</div><hr/><br/><br/><br/>
	<h1>Threads of {{$user->name}}</h1><hr/>
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
			</span>|
			<span>{{ $thread->countComment() }} Comments</span>|
			<span>{{ $thread->countLikes() }} countLikess</span>
			<h5>{{$thread->content}}[...]</h5><br/>
			<a href="/thread/view/{{$thread->id}}" class="read-btn"><p class="text-right">Read More <i class="fa fa-angle-double-right"></i></p></a><br/>
		@endforeach
	@else
		<p>do not have a thread...</p>
	@endif
</div>
@endsection