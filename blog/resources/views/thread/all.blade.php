@extends('layout')

@section('content')
<title>All thread</title>
<div class="row">
	<div class="col-sm-9">
		@if(!empty($threads))
			@foreach ($threads as $thread)
				<h3><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h3>
				@if(!empty($thread->image))
					<img src="/{{ $thread->image }}" class="img-responsive"><br/>
				@endif


				<form method="POST" action="/thread/visible/{{$thread->id}}">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					@if($thread->visible == false)
						<button type="submit" class="btn btn-success">hide</button>	
					@else
						<button type="submit" class="btn btn-success">unhide</button>	
					@endif

				</form>

				<br/><a href="#modal-delete" data-toggle="modal" class="btn btn-success"> delete</a>	</br></br>
				<span>Poster by <b>{{$thread->getUser->name}}</b> At {{$thread->created_at}}</span>
				<span>
					@if(!empty($thread->updated_at))
						|<span>updated {{$thread->updated_at}}</span>
					@endif
				</span>|
				<span>{{ $thread->countComment() }} Comments</span>|
				<span>{{ $thread->countLikes() }} Likes</span>
				<h5>{{$thread->content}}[...]</h5>
				<br/><hr/>

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
			<h3>do not have a thread...</h3>
		@endif
	</div>
</div>
@endsection