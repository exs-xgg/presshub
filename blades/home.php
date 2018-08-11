<!DOCTYPE html>
<html>
<head>
	<title>Presshub</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container fixed-top">
	<div class="col-lg-12" style="height: 50px;">&nbsp;</div>
		<h1 align="center">PRESSHUB</h1>
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<a class="btn btn-primary col-lg-12" href="/home">Home</a>
				</div>
				<div class="col-lg-8">
					<a class="btn btn-info col-lg-12" href="/dashboard">My Dashboard</a>
				</div>
				<div class="col-lg-2">
					<a class="btn btn-success col-lg-12" href="/login">Log<?php echo (!isset($_SESSION['user']))? "in" : "out" ?></a>
				</div>
			</div>
		</div>
	</div>

<div class="col-lg-12" style="height: 150px;">&nbsp;</div>
<div class="container jumbotron">

	<h2>Announcement</h2>
	<div class="col-lg-12" style="height: 50px;">&nbsp;</div>
	<div class="card">
		<div class="container">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
		
	</div>
</div>
</body>
</html>