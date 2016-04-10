<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="/assets/css/animate.min.css" rel="stylesheet" />
	<link href="/assets/css/style.min.css" rel="stylesheet" />
	<link href="/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="/assets/css/theme/default.css" id="theme" rel="stylesheet" />
	<link href="/css/app.css" rel="stylesheet" />

</head>
<body>
	<div id="header" class="header navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="/" class="navbar-brand">
					<span class="navbar-logo"></span>
					<span class="brand-text">
						Thanh Forum
					</span>
				</a>
			</div>
			<div class="collapse navbar-collapse" id="header-navbar">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form" method="POST" action="/user/search">
							<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Enter Name..." />
								<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
							</div>
						</form>
					</li>
					<li><a href="/message/inbox"><span class="badge badge-danger pull-right">{{ \App\Models\Message::countInbox() }}</span>Inbox</a></li>
					<li><a href="/message/sent">Sent</a></li>
					<li><a href="/message/create">Message</a></li>
					@if(\Auth::user()->getRole() == 'Admin')
						<li><a href="/role">Role</a></li>
					@endif
					@if(\Auth::user()->getRole() == 'Admin' ||
						\Auth::user()->getRole() == 'Moderator')
						<li><a href="/member">User</a></li>
						<li><a href="/thread/all">All threads</a></li>
					@endif
					</li>
					<li class="dropdown navbar-user">
						<a href="/javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="/{{\Auth::user()->avatar}}" class="img-circle" width="25" height="25" />
							<span class="hidden-xs">Hi {{\Auth::user()->name}}</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="/user/edit">Edit Profile</a></li>
							<li><a href="/thread/created">Threads created</a></li>
							<li class="divider"></li>
							<li><a href="/logout">Log Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="container">
			@yield('content')
		</div>
	</div>

	<script src="/assets/plugins/pace/pace.min.js"></script>
	<script src="/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<script src="/assets/js/apps.min.js"></script>

	<script>    
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>