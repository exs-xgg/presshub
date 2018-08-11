<!DOCTYPE html>
<html>
<head>
	<title>Resource Not Found</title>
	<link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/js/bootstrap.min.js">
	<script src="/node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="jumbotron">
	<h1>Oops!</h1>
	<P>We can't find the page or resource you are trying to request. Please verify the link or address you are trying to visit!</P>
	<p>Stack Trace:
		HTTP_REFERRER: <?php  echo $_SERVER['HTTP_REFERER'];?></p>
</div>
</body>
</html>