@extends('layout')
@section('content')
	<h2>Edit role</h2>
	<form class="form-horizontal" method="POST" action="/role/{{$role->id}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="_method" value="PUT"/>
        <div class="form-group">
            @if($errors->has('name'))
				<label class="text-danger col-md-9 col-md-offset-3">{{$errors->first('name')}}</label>
			@endif
            <label class="col-md-3 control-label">Name</label>
            <div class="col-md-9">
                <input class="form-control" value="{{$role->name}}" type="text" name="name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-sm btn-success">Update</button>
            </div>
        </div>
    </form>
@stop