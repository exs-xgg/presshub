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


<body style="background-image:url('/img/bg_login.png'); 
background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;  ">
<div class="container">
	
	<div class="row">
		<div class="col-lg-6 col-md-4 col-xs-4">
			&nbsp;
		</div>
		<div class="col-lg-6 col-md-8 col-xs-8">
			<div class="container">
				<div class="row">
					<div class="card col-lg-12">
						<div class="card-body">
							<div class="row">
								<div class="col-2">
								&nbsp;	
								</div>
								<div class="col-8">
								<img src="/img/brand/favicon1.png" width="250" height="250">
								</div>
								<div class="col-2">
								&nbsp;	
								</div>
							</div>
							<h2 class="col-lg-12" align="center">Login - Presshub</h2>
							<hr>
							<?php
						if ($_REQUEST['incorrect']=="y") {
							?>

<p class=" text-danger" align="center">Login Incorrect.</p>

							<?php
						}


						?><?php
						if ($_REQUEST['incorrect']=="x") {
							?>

<p class=" text-danger" align="center">User is Deactivated. Please contact administrator</p>

							<?php
						}


						?>

							<div class="col-lg-12">
								<form autocomplete="off" class="" action="/userstatus" method="post">
								<input class="form-control" type="text" name="username" placeholder="Username">
								<br>
								<input class="form-control" type="password" name="password" placeholder="Password"><br>
								<button class="btn btn-primary col-lg-12" onclick="set()" type="submit">Login</button><br><div class="col-lg-12" align="center"> - or - </div>
								<a class="btn btn-warning col-lg-12" href="/forgot">Forgot Password</a>
								</form>
							</div>
						</div>
					
					</div>
					
					
					
				</div>
			</div>
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