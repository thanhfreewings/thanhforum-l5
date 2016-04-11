@extends('layout')

@section('content')
<title>All thread</title>
<div class="row">
	<div class="col-md-12">
		@if(!empty($threads))
		<table class="table">
			<h3>All threads</h3>
			<tr class="active">
				<th>Title</th>
				<th>Visible</th>
				<th>Author</th>
				<th>Created at</th>
				<th></th>
				<th></th>
			</tr>
			@foreach ($threads as $thread)
				<tr>
					<td><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></td>
					<td>{{$thread->visible}}</td>
					<td>{{$thread->user->name}}</td>
					<td>{{$thread->created_at}}</td>
					<td>
						<form method="POST" action="/thread/visible/{{$thread->id}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}" />
							@if($thread->visible == false)
								<button type="submit" class="btn btn-success pull-right">Hide</button>	
							@else
								<button type="submit" class="btn btn-success pull-right">Show</button>	
							@endif
						</form>
					</td>
					<td><a href="#delete_confirm" class="btn btn-success" data-toggle="modal">Delete</a></td>
				</tr>
				
				<div class="modal fade" id="delete_confirm">
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
								<a id="delete_link" href="/thread/delete/{{$thread->id}}" class="btn btn-sm btn-danger">Delete</a>
							</div>
						</div>
					</div>
				</div>

			@endforeach
		</table>
		@else
			<h3>There is no thread to show...</h3>
		@endif
	</div>
</div>
@endsection