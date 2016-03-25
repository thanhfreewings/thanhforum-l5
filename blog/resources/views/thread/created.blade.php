@extends('layout')

@section('content')
<title>Thread created</title>
<div class="content">
	<div class="container">
		<div class="col-xs-12 col-sm-9">
			<br><br>
			<h3>Thread created:</h3>
			<hr style="border-width: 2px;">
			@if(!empty($threads))
				@foreach ($threads as $thread)
					<h4><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h4>
					<p>Created at {{$thread->created_at}}
					@if(!empty($thread->updated_at))
						<p>update at {{$thread->updated_at}}</p>
					@endif
					<p>{{$thread->content}}</p>
					<br/>
				@endforeach
			@else
				<h2>do not have a thread...</h2>
			@endif
		</div>
	</div>
</div>
@endsection