<!DOCTYPE html>
<html>
<head>
	<title>Request Invalid - Presshub</title>
	<link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/js/bootstrap.min.js">
	<script src="/node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="jumbotron">
	<h1>500 - Oops!</h1>
	<P>Something went wrong on our end; either the request you send was invalid or an internal error has occurred.</P>
	<p>Stack Trace:<br>
		<b>HTTP_REFERRER:</b> <?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?><br>
		<b>Your IP: <?php echo $_SERVER['REMOTE_ADDR'];?></p>
			<small>(c) <a href="/">Presshub</a></small>
</div>
</body>
</html>