@extends('layout')

@section('content')
	<h1>Message</h1>
	<div class="col-md-9 col-lg-12">
		<table class="table table-striped">
			<tr>
				<th>Created_by</th>
				<th>Receiver_id</th>
				<th>Content</th>
				<th></th>
			</tr>
			@foreach($messages as $message)
			<tr>
				<td>{{$message->created_by}}</td>
				<td>{{$message->receiver_id}}</td>
				<td>{{$message->message}}</td>
				<td><a href="">delete</a></td>
			</tr>
			@endforeach
		</table>
	</div>
@endsection