@extends('layout')
@section('content')
<div class="row">
    <div class="wrapper col-md-3">
        <p><b>FOLDERS</b></p>
        <ul class="nav nav-pills nav-stacked nav-sm">
            <li><a href="/message/inbox"><i class="fa fa-inbox fa-fw m-r-5"></i> Inbox <span class="badge pull-right">{{ \App\Models\Message::countInbox() }}</span></a></li>
            <li><a href="/message/sent"><i class="fa fa-send fa-fw m-r-5"></i> Sent </a></li>
        </ul>
        <p><b>FRIENDS</b></p>
        <ul class="nav nav-pills nav-stacked nav-sm m-b-0">
			@foreach($allUsers as $user)
				@if(\Auth::user()->id != $user->id)
				<li>
					<table>
						<tr>
							<td><a href="/user/view/{{$user->id}}" class="email-user"><img src="/{{$user->avatar}}" class="small-avatar img-circle"></a></td>
							<td><a href="/message/reply/{{$user->id}}" class="other-link">{{$user->name}}</a></td><br/>
						</tr>
					</table>
				</li>
				@endif
			@endforeach
        </ul>
    </div>
	<div class="col-sm-9" >
	@if(!empty($messages))
		@foreach($messages as $message)
			@if($message->getSender->id != \Auth::user()->id)
				<div class="row">
					<div class="col-md-1">
						<img src="/{{$message->getSender->avatar}}" class="small-avatar">
					</div>
					<div class="col-md-10 bg-silver">
							<p><a href="/user/view/{{$message->getSender->id}}">{{$message->getSender->name}}</a></p>
							<p>{{$message->message}}</p>
							<p><small>{{$message->created_at}}</small></p>
					</div>
					<div class="col-md-1"></div>
				</div><br/>
			@else
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10 bg-silver">
						<p class="text-right"><a href="/user/view/{{$message->getSender->id}}">You</a></p>
						<p class="text-right">{{$message->message}}</p>
						<p class="text-right"><small>{{$message->created_at}}</small></p>
					</div>
					<div class="col-md-1">
						<img src="/{{$message->getSender->avatar}}" class="small-avatar">
					</div>
				</div><br/>
			@endif
		@endforeach
	@endif
		<div class="col-md-10 col-md-offset-1">
			<form class="form-horizontal" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}"></input><br/>
				<input type="hidden" name="receiver_id" value="{{ $getUser->id }}" >
				<div class="form-group">
					<h5 for="inputEmail3" class="">Message to: <a href="/user/view/{{$getUser->id}}">{{$getUser->name}}</a></h5>
					@if($errors->has('message'))
					<label class="text-danger">{{$errors->first('message')}}</label><br/>
					@endif
					<textarea name="message" class="form-control" rows="5">{{old('message')}}</textarea><br/>
					<button type="submit" class="btn btn-success">Send message</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection