@extends('layout')

@section('content')
<title>View thread</title>
<div class="content">
	<div class="container">
		<div class="col-md-9">
			<ul class="forum-list forum-detail-list">
				<li>
					<div class="media">
						<img src="/{{ $thread->getUser()->avatar }}" >
						<span class="label label-inverse">{{ $thread->getUser()->name }}</span>
					</div>
					<div class="info-container">
						<div class="post-user"><a href="/view_user.php?id=<?php echo $thread->created_by ?>">{{ $thread->getUser()->name }}</a><small><?php echo $thread->title ?></small></div>
						<div class="post-content">
							{{ $thread->content }}
						</div>
						<div class="post-time">
							at {{ $thread->created_at }}
							<?php if(!empty($thread->updated_at)){ echo 'update at '.$thread->updated_at; } ?>
						</div>
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
				@foreach ($thread->getComments() as $key => $comment)
					<li>
						<div class="media">
							<img src="/{{$comment->getUser()->avatar}}" >
							<span class="label label-inverse">{{$comment->getUser()->name}}</span>
						</div>
						<div class="info-container">
							<div class="post-user"><a href="/view_user.php?id=<?php echo $comment->created_by ?>">{{ $comment->getUser()->name }}</a><small>SAYS</small></div>
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