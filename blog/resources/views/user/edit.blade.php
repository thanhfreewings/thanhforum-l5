@extends('layout')
@section('content')
<div class="col-md-6 offset6">
    <form action="index.html" method="POST" class="margin-bottom-0">
    	<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
        <label class="control-label">Name</label>
        <div class="row m-b-15">
            <div class="col-md-12">
                <input name="name" type="text" class="form-control" placeholder="Name" />
            </div>
        </div>
        <label class="control-label">Email</label>
        <div class="row m-b-15">
            <div class="col-md-12">
                <input name="email" type="text" class="form-control" placeholder="Email address" />
            </div>
        </div>
        <label class="control-label">Password</label>
        <div class="row m-b-15">
            <div class="col-md-12">
                <input name="password" type="text" class="form-control" placeholder="Password" />
            </div>
        </div>
        
        <div class="register-buttons">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Click to update</button>
        </div>
        <div class="m-t-20 m-b-40 p-b-40">
            Already a member? Click <a href="/logout">here</a> to login.
        </div>
        <hr />
    </form>
</div>
@endsection