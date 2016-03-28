@extends('layout')

@section('content')
<title>Home</title>
<div class="content">
	<div class="container">
		
		<div class="panel panel-forum">
			<div class="panel-heading">
				<h4 class="panel-title">All thread</h4>
			</div>
			<ul class="forum-list">

				@foreach ($threads as $key => $thread)
					<li>
						<div class="media">
							<img src="/{{$thread->getUser()->avatar}}">
							<a href="/user/view/{{$thread->getUser()->id}}"><h6>{{ $thread->getUser()->name }}</h6></a>
						</div>
						<div class="info-container">

							<div class="info">
								<h4 class="title"><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h4>
								<p class="desc">
									@if(!empty($thread->updated_at))
										<p class="desc">(updated at {{ $thread->updated_at }} </p>
									@endif
									<?php
									echo substr($thread->content, 0,500);
									if(strlen($thread->content) > 500){ echo '...'; }
									echo '<br>';
									?>
								</p>
							</div>
							<div class="total-count">
								<td class="text-center"><div><i class="fa fa-2x fa-comments-o"></i></div><div class="hidden-xs">
									{{$thread->countComment()}}.replies
								</div></td>
							</div>
							<div class="latest-post">
								<p class="time">created at {{$thread->created_at}}</p></br>
								<ul class="list-inline">
									@foreach ($thread->getComments() as $key => $user)
										<li>
											<div class="media recent-reply">
												<a href="/user/view/{{$user->filterUser()->id}}"><img src="/{{ $user->filterUser()->avatar}}" width="25" height="25"></a>
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
	</div>
</div>
@endsection