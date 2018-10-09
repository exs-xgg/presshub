<?php

session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Presshub</title>

	<link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/js/bootstrap.min.js">
	<script src="/node_modules/jquery/dist/jquery.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="/css/argon.css?v=1.0.0" rel="stylesheet">
</head>


<body style="background: rgba(212,228,239,1);
background: -moz-linear-gradient(left, rgba(212,228,239,1) 0%, rgba(134,174,204,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(212,228,239,1)), color-stop(100%, rgba(134,174,204,1)));
background: -webkit-linear-gradient(left, rgba(212,228,239,1) 0%, rgba(134,174,204,1) 100%);
background: -o-linear-gradient(left, rgba(212,228,239,1) 0%, rgba(134,174,204,1) 100%);
background: -ms-linear-gradient(left, rgba(212,228,239,1) 0%, rgba(134,174,204,1) 100%);
background: linear-gradient(to right, rgba(212,228,239,1) 0%, rgba(134,174,204,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d4e4ef', endColorstr='#86aecc', GradientType=1 ">
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
					<div class="card col-lg-12">
						<div class="card-body">
							<h2 class="col-lg-12" align="center">Login - Presshub</h2>
							<hr>
							<?php
						if ($_REQUEST['incorrect']=="y") {
							?>

<p class=" text-danger" align="center">Login Incorrect.</p>

							<?php
						}


						?>
							<div class="col-lg-12">
								<form autocomplete="off" class="" action="/userstatus" method="post">
								<input class="form-control" type="text" name="username" placeholder="Username">
								<br>
								<input class="form-control" type="password" name="password" placeholder="Password"><br>
								<button class="btn btn-primary col-lg-12" onclick="set()" type="submit">Login</button><br><div class="col-lg-12" align="center"> - or - </div>
								<a class="btn btn-warning col-lg-12" href="/home">Go Back</a>
								</form>
							</div>
						</div>
					
					</div>
					
					
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-2 col-xs-2">
		&nbsp;
	</div>
</div>

</body>
<script>
	function set(){
		this.disabled = true;
	}
</script>
</html>