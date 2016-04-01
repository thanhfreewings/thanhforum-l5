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
		<form class="form-horizontal" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}"></input><br/>
			<input type="hidden" name="receiver_id" value="{{ $getUser->id }}" >
			<div class="form-group">
				<div class="col-sm-10">
					<h5 for="inputEmail3" class="">Message to: <a href="/user/view/{{$getUser->id}}">{{$getUser->name}}</a></h5>
					@if($errors->has('message'))
					<label class="text-danger">{{$errors->first('message')}}</label><br/>
					@endif
					<textarea name="message" class="form-control" rows="5">{{old('message')}}</textarea><br/>
					<button type="submit" class="btn btn-success">Send message</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection