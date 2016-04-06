@extends('layout')

@section('content')
<title>Thread created</title>
<div class="row">
	<div class="col-sm-9">
		@if(!empty($threads))
			@foreach ($threads as $thread)
				<h4><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h4>
				@if(!empty($thread->image))
					<img src="/{{ $thread->image }}" class="img-responsive"><br/><br/>
				@endif
				<span>At {{$thread->created_at}}</span>
				<span>
					@if(!empty($thread->updated_at))
						|<span>updated {{$thread->updated_at}}</span>
					@endif
				</span>|<span>{{ $thread->countComment() }} Comments</span>|
				<span><a href="/thread/update/{{$thread->id}}">update</a></span>|
				<span><a href="#modal-delete" data-toggle="modal">delete</a></span>
				<h5>{{$thread->content}}[...]</h5>
				<br/>

				<!-- #modal-dialog -->
				<div class="modal fade" id="modal-delete">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Delete thread</h4>
							</div>
							<div class="modal-body">
								You want to delete thread...?
							</div>
							<div class="modal-footer">
								<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
								<a href="/thread/delete/{{$thread->id}}" class="btn btn-sm btn-danger">Delete</a>
							</div>
						</div>
					</div>
				</div>
				<!--end #modal-dialog -->

			@endforeach
		@else
			<li><h2>do not have a thread...</h2></li>
		@endif
	</div>
	<div class="col-sm-3">
		<br/><br/><p class="text-right"><a href="/thread/create" class="btn btn-success m-r-5 m-b-5">+ Compose</a></p>
	</div>
</div>
@endsection