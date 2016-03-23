<!DOCTYPE html>
<html>
<head>
	<title>create</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="/assets/css/animate.min.css" rel="stylesheet" />
	<link href="/assets/css/style.min.css" rel="stylesheet" />
	<link href="/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="/assets/css/theme/default.css" id="theme" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->

<link type='text/css' rel='stylesheet' href='style.css'/> 
</head>
<body>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div style="" class="panel">
						<div class="panel-body">
							<form method="POST">
								<fieldset>
									<legend>Sign Up</legend>
									<div class="form-group">
										<label for="exampleInputEmail1">Name</label>
										<input name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="text">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Email address</label>
										<input name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="text">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<input name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
									</div>
									<button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button></br>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
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
