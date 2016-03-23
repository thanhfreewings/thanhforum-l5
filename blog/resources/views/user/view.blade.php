@extends('layout')

@section('content')
<title>View thread</title>
<div class="content">
	<div class="container">
		<img src="<?php echo $user->avatar ?>" class="img-circle" alt="avatar" height="85" width="85">
		<div class="viewUser">
			<br><br>
			<h3>User name: <?php echo $user->name ?></h3>
			<a href="/reply_message.php?id=<?php echo $user->id ?>">message </a><a href="thread_user.php?id=<?php echo $user->id ?>"> thread</a>
			<p>Thread created: </p>
			<p>Email: <?php echo $user->email ?></p>
		</div>
		<hr style="border-width: 2px;">
		<div class="col-xs-12 col-sm-9">
			
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