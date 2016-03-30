@extends('layout')

@section('content')
<title>Thread created</title>
<div class="content">
	<div class="container">
		<div class="col-xs-12 col-sm-9">
			<br><br>
			<h3>Thread created:</h3>
			<hr style="border-width: 2px;">
			@if(!empty($threads))
				@foreach ($threads as $thread)
					<h4><a href="/thread/view/{{$thread->id}}">{{$thread->title}}</a></h4>
					<p>Created at {{$thread->created_at}}
					@if(!empty($thread->updated_at))
						<p>update at {{$thread->updated_at}}</p>
					@endif
					<p>{{$thread->content}}</p>
					<br/>
				@endforeach
			@else
				<h2>do not have a thread...</h2>
			@endif


            <div class="post-info">
                <h4 class="post-title">
                    <a href="post_detail.html">Bootstrap Carousel Blog Post</a>
                </h4>
                <div class="post-by">
                    Posted By <a href="#">admin</a> <span class="divider">|</span> <a href="#">Sports</a>, <a href="#">Mountain</a>, <a href="#">Bike</a> <span class="divider">|</span> 2 Comments
                </div>
                <div class="post-desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elit dolor, elementum ut ligula ultricies, 
                    aliquet eleifend risus. Vivamus ut auctor sapien. Morbi at nibh id lorem viverra commodo augue dui, in pellentesque odio tempor.
                     Etiam lobortis vel enim vitae facilisis. Suspendisse ac faucibus diam, non malesuada nisl. Maecenas vel aliquam eros, sit amet gravida lacus. 
                     nteger dictum, nulla [...]
                </div>
            </div>

			
		</div>
	</div>
</div>
@endsection