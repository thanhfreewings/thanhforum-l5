@extends('layout')

@section('content')
	<div class="col-md-9 col-lg-12">
		<table class="table table-email">
			<thead>
				<tr>
					<th colspan="2">
						<a href="" class="email-header-link" >Inbox:</a>
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
							<td><a href="/user/view/{{ $message->created_by }}"><img src="/{{ $message->getSender->avatar }}" class="img-circle" height="25" width="25"></a></td>
							<td class="email-sender">
								<a href="/user/view/{{ $message->created_by }}">{{ $message->getSender->name }}</a>
							</td>
							<td class="email-subject">
								<a href="/message/inbox/delete/{{ $message->id }}" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
							</td>
							<td>{{ $message->message }}</td>	
							<td class="email-date"><a href="/message/reply/{{ $message->created_by }}">reply</a></td>
						</tr>
					@endforeach
				@endif
				@if(empty($messages))
					<tr>
						<td><p>Inbox is empty...!</p></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
@endsection