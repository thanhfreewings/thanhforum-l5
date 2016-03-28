@extends('layout')
@section('content')
<div class="row">
	<div class="col-md-6">
		<form class="form-horizontal" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Message</label>
				<div class="col-sm-10">
					<textarea name="message" class="form-control" rows="5"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Send to</label>
				<div class="col-sm-10">
					<select name="receiver_id" class="form-control">
						@foreach($getUsers as $user)
							@if(\Auth::user()->id != $user->id)
								<option value="{{ $user->id }}" >{{ $user->name }}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Send message</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection