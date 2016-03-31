@extends('layout')
@section('content')
<title>Update User</title>
<div class="col-md-6 offset6">
    <form method="POST" class="margin-bottom-0">
    	<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
        <label class="control-label">Name</label>
        <div class="row m-b-15">
            <div class="col-md-12">
                <input name="name" type="text" class="form-control" value="{{\Auth::user()->name}}" />
            </div>
        </div>
        <label class="control-label">Email</label>
        <div class="row m-b-15">
            <div class="col-md-12">
                <input name="email" type="text" class="form-control" value="{{\Auth::user()->email}}" />
            </div>
        </div>
        <label class="control-label">Password (min is 6 characters)</label>
        <div class="row m-b-15">
            <div class="col-md-12">
                <input name="password" type="password" class="form-control" />
            </div>
        </div>
        
        <div class="register-buttons">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Click to update</button>
        </div>
        <hr />
    </form>
</div>
@endsection