@extends('layout')
@section('content')
<title>Upload avatar</title>

<div class="content">
	<div class="container">
		<br>
		<form method="POST" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
		    Select image to upload:
		    <input type="file" name="avatar" id="fileToUpload"><br>
		    <button type="submit" class="btn btn-default">Upload</button>
		</form>
		<br><hr style="border-width: 2px;">
	</div>
</div>
@endsection