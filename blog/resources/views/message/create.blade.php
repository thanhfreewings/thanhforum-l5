@extends('layout')
@section('content')
<div class="row">
	<div class="col-md-6">
		<form class="form-horizontal" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
			<div class="form-group">
				<label>Message</label>
				@if($errors->has('message'))
				<label class="text-danger">{{$errors->first('message')}}</label>
				@endif
				<textarea name="message" class="form-control" rows="5">{{old('message')}}</textarea>
			</div>
			<div class="form-group">
				<label>Send to</label>
				<select name="receiver_id" class="form-control">
					@foreach($getUsers as $user)
					@if(\Auth::user()->id != $user->id)
					<option value="{{ $user->id }}" >{{ $user->name }}</option>
					@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default">Send message</button>
			</div>
		</form>
	</div>
</div>
@endsection