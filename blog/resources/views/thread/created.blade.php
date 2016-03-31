@extends('layout')

@section('content')
<title>Thread created</title>
<div class="content">
	<div class="container">
		<div class="col-xs-12 col-sm-9">
			<br><br>
			<p class="text-right"><a href="/thread/create" class="btn btn-success m-r-5 m-b-5">+ Compose</a></p><hr>
			@if(!empty($threads))
				@foreach ($threads as $thread)
					<h4><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h4>
					<span>At {{$thread->created_at}}</span>
					<span>
						@if(!empty($thread->updated_at))
							|<span>updated {{$thread->updated_at}}</span>
						@endif
					</span>|<span>{{ $thread->countComment() }} Comments</span>|
					<span><a href="/thread/update/{{$thread->id}}">update</a></span>|
					<span><a href="/thread/delete/{{$thread->id}}">delete</a></span>
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