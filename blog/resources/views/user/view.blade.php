@extends('layout')

@section('content')
<title>View thread</title>
<div class="content">
	<div class="container">
		<div class="col-xs-12 col-sm-9">
		<div class="media small-avatar">
			<img src="/{{ $user->avatar }}">
		</div>
		<div class="viewUser">
			<br><br>
			<h3>User name: <?php echo $user->name ?></h3>
			<p><a href="/reply_message.php?id=<?php echo $user->id ?>">message </a></p>
			<p>Thread created: </p>
			<p>Email: <?php echo $user->email ?></p>
			<i class="icon-envelope"></i>
		</div>
		<hr style="border-width: 2px;">
			
			@if(!empty($user->getThreads()))
				@foreach ($user->getThreads() as $thread)
					<h4><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h4>
					<p>Created at {{$thread->created_at}}
					@if(!empty($thread->updated_at))
						<p>update at {{$thread->updated_at}}</p>
					@endif
					<p>{{$thread->content}}</p>
				@endforeach
			@else
				<h2>do not have a thread...</h2>
			@endif
		</div>
	</div>
</div>
@endsection