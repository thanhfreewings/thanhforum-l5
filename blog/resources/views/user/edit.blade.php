@extends('layout')
@section('content')

<div class="" lass="wrapper">
    <h4 class="m-b-15 m-t-0 p-b-10 underline">Edit profile:</h4>
    <ul class="media-list underline m-b-20 p-b-15">
        <li class="media media-sm clearfix">
            <a href="/user/upload" class="pull-left">
                <img class="media-object rounded-corner" src="/{{ \Auth::user()->avatar }} " />
            </a>
            <div class="media-body">
                <span class="email-from text-inverse f-w-600">
                    {{ \Auth::user()->name }}
                    
                </span><span class="text-muted m-l-5"><i class="fa fa-clock-o fa-fw"></i> {{ \Auth::user()->updated_at }}</span><br/>
                <span class="email-to">
                    email: {{ \Auth::user()->email }}
                </span><br/>
                <span><a href="/user/update">update</a></span>
            </div>
        </li>
	</ul>
</div>
@endsection