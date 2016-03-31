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
					<span>At {{$thread->created_at}}</span>
					<span>
						@if(!empty($thread->updated_at))
							|<span>updated {{$thread->updated_at}}</span>
						@endif
					</span>|<span>{{ $thread->countComment() }} Comments</span>
					<p>{{$thread->content}}[...]</p>
					<br/>
				@endforeach
			@else
				<h2>do not have a thread...</h2>
			@endif




			
		</div>
	</div>
</div>
@endsection