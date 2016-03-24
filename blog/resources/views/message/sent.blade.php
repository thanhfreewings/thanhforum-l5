@extends('layout')

@section('content')
	<div class="col-md-9 col-lg-12">
		<table class="table table-email">
			<thead>
				<tr>
					<th colspan="2">
						<a href="" class="email-header-link" >Message to:</a>
					</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@if(!empty($messages))
					@foreach($messages as $message)
						<tr>
							<td><a href="/user/view/{{ $message->receiver_id }}"><img src="/{{ $message->getReceiver()->avatar }}" class="img-circle" height="25" width="25"></a></td>
							<td class="email-sender">
								<a href="/user/view/{{ $message->receiver_id }}">{{ $message->getReceiver()->name }}</a>
							</td>
							<td>{{ $message->message }}</td>	
							<td class="email-subject">
								<a href="/message/delete/{{ $message->id }}" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
							</td>
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
	</div>
@endsection