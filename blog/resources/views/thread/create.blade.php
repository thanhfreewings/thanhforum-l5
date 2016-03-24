@extends('layout')

@section('content')
<div class="col-md-9 col-lg-9">
	<form class="form-horizontal" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
		<div class="form-group">
			<label >Title</label>
			<input name="title" type="text" class="form-control" placeholder="less than 50 characters!">
		</div>
		<div class="form-group">
			<label >Content</label>
			<textarea name="content" class="form-control" rows="8"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default">Create Thread</button>
		</div>
	</form>
</div>
@endsection