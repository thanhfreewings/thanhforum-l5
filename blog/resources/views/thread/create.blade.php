@extends('layout')

@section('content')
<title>Create thread</title>
<div class="col-md-9 col-lg-9">
	<form class="form-horizontal" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
		<div class="form-group">
			<label>Title</label>
			@if($errors->has('title'))
			<span class="text-danger">{{$errors->first('title')}}</span>
			@endif
			<input name="title" type="text" class="form-control" placeholder="less than 50 characters!" value="{{old('title')}}">
		</div>
		<div class="form-group">
			<label>Content</label>
			@if($errors->has('content'))
			<span class="text-danger">{{$errors->first('content')}}</span>
			@endif
			<textarea name="content" class="form-control" rows="8">{{old('content')}}</textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default">Create Thread</button>
		</div>
	</form>
</div>
@endsection