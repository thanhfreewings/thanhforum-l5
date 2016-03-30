@extends('layout')
@section('content')
<div class="row">
	<div class="col-md-6 col-sm-9" >
		<form class="form-horizontal" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
			<input type="hidden" name="receiver_id" value="{{ $getUser->id }}" >
			<div class="form-group">
				<div class="col-sm-10">
					<label for="inputEmail3" class="">Write message here:</label>
					@if($errors->has('message'))
					<label class="text-danger">{{$errors->first('message')}}</label><br/>
					@endif
					<textarea name="message" class="form-control" rows="5">{{old('message')}}</textarea><br/>
					<button type="submit" class="btn btn-default">Send message</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection