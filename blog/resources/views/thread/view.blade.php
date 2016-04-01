@extends('layout')

@section('content')
<title>View thread</title>
<div class="content">
	<div class="container">
		<div class="col-md-11">
			<ul class="forum-list forum-detail-list">
				<li>
					<div class="media">
						<a href="/user/view/{{$thread->getUser->id}}"><img src="/{{ $thread->getUser->avatar }}" ></a>
						<span class="label label-inverse">{{ $thread->getUser->name }}</span>
					</div>
					<div class="info-container">
						<div class="post-user"><small><?php echo $thread->title ?></small></div>
						@if(!empty($thread->image))
							<img src="/{{ $thread->image }}" class="img-responsive"><br/><br/>
						@endif
						<div class="post-time">
							<span>Poster <a href="/user/view/{{$thread->getUser->id}}">{{ $thread->getUser->name }} </a></span>|
							<span>at {{ $thread->created_at }}</span>
							@if(!empty($thread->updated_at))
								| <span>update at {{$thread->updated_at}}</span>
							@endif
						</div>
						<div class="post-content">{{ $thread->content }}</div>
					</div>
				</li>
			</ul>
			<ul class="forum-list forum-detail-list">
				<li>
					<div class="info-container">
						<div class="panel panel-forum">
							<div class="panel-heading">
								<h4 class="panel-title">Comment</h4>
							</div>
							<div class="panel-body">
								<form method="POST" action="/comment/create">
									<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
									<input type="hidden" name="thread_id" value="{{ $thread->id }}">
									@if($errors->has('content'))
									<span class="text-danger">{{$errors->first('content')}}</span>
									@endif
									<textarea class="textarea form-control" name="content" placeholder="Enter text ..." rows="10"></textarea>
									<div class="m-t-10">
										<button type="submit" class="btn btn-theme">Post Comment <i class="fa fa-paper-plane"></i></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</li>
			</ul>
			<ul class="forum-list forum-detail-list">
				@foreach ($thread->comments as $key => $comment)
					<li>
						<div class="media">
							<a href="/user/view/{{$comment->user->id}}"><img src="/{{$comment->user->avatar}}" ></a>
							<span class="label label-inverse">{{$comment->user->name}}</span>
						</div>
						<div class="info-container">
							<div class="post-user"><a href="/user/view/{{$comment->user->id}}">{{ $comment->user->name }}</a><small>SAYS</small></div>
							<div class="post-content">
								{{$comment->content}}
							</div>
							<div class="post-time">at {{$comment->created_at }}</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endsection