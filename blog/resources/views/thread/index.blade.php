@extends('layout')

@section('content')
<title>Home</title>
<p class="text-right"><a href="/thread/create" class="btn btn-link">+ Compose</a></p>
<div class="panel panel-forum">
	<div class="panel-heading">
		<h4 class="panel-title">All thread</h4>
	</div>
	<ul class="forum-list">

		@foreach ($threads as $key => $thread)
		<li>
			<div class="media">
				<img src="/{{$thread->avatar}}" class="img-thumbnail">
				<a href="/user/view/{{$thread->userId}}"><h6>{{ $thread->name }}</h6></a>
			</div>
			<div class="info-container">

				<div class="info">
					<h4 class="title"><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h4>
					<p class="desc">
						<span>Created {{$thread->created_at}}</span>
						@if(!empty($thread->updated_at))
						|<span class=""> updated {{ $thread->updated_at }}</span>
						@endif
						<br/><span>{{substr($thread->content, 0,500)}}</span>
						@if(strlen($thread->content) > 500)
						<span>[...]</span>
						@endif
						<br>
					</p>
				</div>
				<div class="total-count">
					<span class="text-center">{{$thread->countComment()}} Comments</span>
				</div>
				<div class="latest-post">
					<span>Recent replies</span>
					<ul class="list-inline">
						@foreach ($thread->filterUser() as $user)
						<li>
							<div class="media recent-reply">
								<a href="/user/view/{{$user->id}}"><img src="/{{ $user->avatar}}" width="30" height="30"></a>
							</div>
						</li>
						@endforeach
					</ul>

				</div>
			</div>
		</li>
		@endforeach

	</ul>
</div>
@endsection