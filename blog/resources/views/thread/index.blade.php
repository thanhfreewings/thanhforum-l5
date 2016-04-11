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
		@if($thread->visible == false)
		
		<li>
			<div class="media">
				<a href="/user/view/{{$thread->userId}}"><img src="/{{$thread->avatar}}"></a>
				<h6><b>{{ $thread->user->getRole() }}</b></h6>
			</div>
			<div class="info-container">

				<div class="info">
					<h4 class="title"><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h4>
					<p class="desc">
						<span>Posted by <a href="/user/view/{{$thread->userId}}">{{$thread->name}}</a></span>|
						<span>At {{$thread->created_at}}</span>
						@if(!empty($thread->updated_at))
						|<span class=""> updated {{ $thread->updated_at }}</span>
						@endif
						<h5>
							{{substr($thread->content, 0,300)}}
							@if(strlen($thread->content) > 300)
							[...]
							@endif
						</h5>
						<br>
					</p>
				</div>
				<div class="total-count">
					<div class="col-md-9 pull-right">
						<span class="pull-left">{{$thread->countComment()}} Comments</span><br/>
						<span class="pull-left">{{$thread->countLikes()}} Likes</span>
					</div>
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
		
		@endif
		@endforeach

	</ul>
</div>
@endsection