@extends('layout')

@section('content')
<title>Thread created</title>
<div class="row">
	<div class="col-md-12">
		@if(!empty($threads))
			<table class="table">
				<a href="/thread/create" class="btn btn-success pull-right m-b-10">+ Compose</a>
				<tr class="active">
					<th>Title</th>	
					<th>Comments</th>	
					<th>Likes</th>	
					<th>Created at</th>	
					<th></th>	
					<th></th>	
				</tr>
				@foreach ($threads as $thread)
					<tr>
						<td><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></td>
						<td>{{ $thread->countComment() }}</td>
						<td>{{ $thread->countLikes() }}</td>
						<td>{{$thread->created_at}}</td>
						<td><a href="/thread/update/{{$thread->id}}">update</a></td>
						<td><a href="#{{$thread->id}}" data-toggle="modal">delete</a></td>
					</tr>

					<div class="modal fade" id="{{$thread->id}}">
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

				@endforeach
			</table>
		@else
			<li><h2>do not have a thread...</h2></li>
		@endif
	</div>
</div>
@endsection