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
						<h4>
							<form method="POST" action="/like" id="this_form">
								<input type="hidden" name="_token" value="{{csrf_token()}}" />
								<input type="hidden" name="created_by" value="{{\Auth::user()->id}}" />
								<input type="hidden" name="thread_id" value="{{$thread->id}}" />
								@if($thread->getLike() == true)
								<a href="javascript:;" class="fa fa-heart" onclick="document.getElementById('this_form').submit();"> likes</a>
								@else
								<a href="javascript:;" class="fa fa-heart-o" onclick="document.getElementById('this_form').submit();"> likes</a>
								@endif
								<label> ({{$thread->countLikes()}})</label>
							</form>
						</h4>
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
							<div class="post-user">
								<a href="/user/view/{{$comment->user->id}}">{{ $comment->user->name }}</a>
								<small>SAYS</small>
								

								@if(\Auth::user()->getRole() == 'Admin' ||
									\Auth::user()->getRole() == 'Moderator')
									<label class="pull-right">
										<a href="#modal-delete" data-toggle="modal">Delete</a>
									</label>
								@endif
								<!-- #modal-dialog -->
								<div class="modal fade" id="modal-delete">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												<h4 class="modal-title">Delete comment</h4>
											</div>
											<div class="modal-body">
												You want to delete comment...?
											</div>
											<div class="modal-footer">
												<button class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
												<a href="/comment/delete/{{$comment->id}}" class="btn btn-sm btn-warning">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<!--end #modal-dialog -->


							</div>
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