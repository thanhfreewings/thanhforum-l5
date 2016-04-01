@extends('layout')

@section('content')
<title>Update thread</title>
<div class="col-md-9 col-lg-9">
	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
		<div class="form-group">
			<label>Title</label>
			@if($errors->has('title'))
			<span class="text-danger">{{$errors->first('title')}}</span>
			@endif
			<input name="title" type="text" class="form-control" value="{{$thread->title}}">
		</div>
		<div class="form-group">
			<label>Content</label>
			@if($errors->has('content'))
			<span class="text-danger">{{$errors->first('content')}}</span>
			@endif
			<textarea name="content" class="form-control" rows="8">{{$thread->content}}</textarea><br/>
			<label>Add image</label>
			<input type="file" name="image" id="fileToUpload">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default">Click to update thread</button>
		</div>
	</form>
</div>
@endsection