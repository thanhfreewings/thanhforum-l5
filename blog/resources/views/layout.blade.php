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

	<link type='text/css' rel='stylesheet' href='style.css'/> 
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
				<a href="/home" class="navbar-brand">
					<span class="navbar-logo"></span>
					<span class="brand-text">
						Thanh Forum
					</span>
				</a>
			</div>
			<div class="collapse navbar-collapse" id="header-navbar">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form" method="POST" action="/result_search.php">
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Enter Name..." />
								<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
							</div>
						</form>
					</li>
					<li><a href="/message">Inbox</a></li>
					<li><a href="/sent">Sent</a></li>
					<li><a href="/message/create">Message</a></li>
					<li><a href="/thread/create">Compose</a></li>
					<li><a href="/logout">Hi {{\Auth::user()->name}}, Logout</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		@yield('content')
	</div>

	<script src="assets/plugins/pace/pace.min.js"></script>

	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<script src="assets/js/apps.min.js"></script>

	<script>    
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>