@extends('layout')

@section('content')
<table class="table table-email">
	<thead>
		<tr>
			<th colspan="2">
				<a href="" class="email-header-link" >Message to:</a>
			</th>
		</tr>
	</thead>
	<tbody>
		@if(!empty($messages))
		@foreach($messages as $message)
		<tr>
			<td>
				<a href="/user/view/{{ $message->receiver_id }}"><img src="/{{ $message->getReceiver->avatar }}" class="img-circle" height="25" width="25"></a>
			</td>
			<td class="email-sender">
				<a href="/user/view/{{ $message->receiver_id }}">{{ $message->getReceiver->name }}</a>
			</td>
			<td>{{ $message->message }}</td>	
			<td><a href="#modal-dialog" data-toggle="modal"><i class="fa fa-trash-o"></i></a></td>
			<!-- #modal-dialog -->
			<div class="modal fade" id="modal-dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Delete message</h4>
						</div>
						<div class="modal-body">
							You want to delete Message...?
						</div>
						<div class="modal-footer">
							<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
							<a href="/message/sent/delete/{{$message->id}}" class="btn btn-sm btn-danger">Delete</a>
						</div>
					</div>
				</div>
			</div>
			<!--end #modal-dialog -->
		</tr>
		@endforeach
		@endif
		@if(empty($messages))
		<tr>
			<td><p>You don't have any message...!</p></td>
		</tr>
		@endif
	</tbody>
</table>

@endsection