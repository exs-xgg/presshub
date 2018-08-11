<!DOCTYPE html>
<html>
<head>
	<title>Resource Not Found - Presshub</title>
	<link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/js/bootstrap.min.js">
	<script src="/node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="jumbotron">
	<h1>404 - Oops!</h1>
	<P>We can't find the page or resource you are trying to request. Please verify the link or address you are trying to visit!</P>
	<p>Stack Trace:<br>
		<b>HTTP_REFERRER:</b> <?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?><br>
		<b>Your IP: <?php echo $_SERVER['REMOTE_ADDR'];?></p>
			<small>(c) <a href="/">Presshub</a></small>
</div>
</body>
</html>