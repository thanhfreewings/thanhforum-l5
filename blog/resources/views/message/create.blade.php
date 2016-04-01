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
			@foreach($getUsers as $user)
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
	<div class="col-md-9">
		<form class="form-horizontal" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}"></input><br/>
			<div class="form-group">
				<label>To:</label>
				<select name="receiver_id" class="form-control">
					@foreach($getUsers as $user)
					@if(\Auth::user()->id != $user->id)
					<option value="{{ $user->id }}" >{{ $user->name }}</option>
					@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Content:</label>
				@if($errors->has('message'))
				<label class="text-danger">{{$errors->first('message')}}</label>
				@endif
				<textarea name="message" class="form-control" rows="5">{{old('message')}}</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Send message</button>
			</div>
		</form>
	</div>
</div>
@endsection