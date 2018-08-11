<!DOCTYPE html>
<html>
<head>
	<title>Login - Presshub</title>

	<link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/js/bootstrap.min.js">
	<script src="/node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row" style="height: 30vh">
		&nbsp;
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-2 col-xs-2">
			&nbsp;
		</div>
		<div class="col-lg-6 col-md-8 col-xs-8">
			<div class="container">
				<div class="row">
					<br><br>
					<h2 class="col-lg-12" align="center">Login - Presshub</h2>
					<form autocomplete="off" class="form form-control" style="height: 25vh" action="/userstatus" method="post">
					<input class="form form-control" type="text" name="username" placeholder="Username">
					<br>
					<input class="form form-control" type="password" name="password" placeholder="Password"><br>
					<button class="btn btn-primary col-lg-12" onclick="set()" type="submit">Login</button><br><div class="col-lg-12" align="center"> - or - </div>
					<a class="btn btn-warning col-lg-12" href="/home">Go Back</a>
					</form>
					
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-2 col-xs-2">
			&nbsp;
		</div>
	</div>
</div>
</body>
<script>
	function set(){
		this.disabled = true;
	}
</script>
</html>