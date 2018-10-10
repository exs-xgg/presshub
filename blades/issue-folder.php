<?php
if (isset($uri[4]) && $uri[4]!=="") {
	require $uri[4].'-page.php';
}else{
?>
<div class="row">
	

<div class="col-md-4 p-3">
	<div class="container">
		<div class="card" onclick="go('news')"  style="cursor: pointer">
			<div class="card-header"><i class="fa fa-newspaper-o"></i>
				&nbsp;&nbsp;News
			</div>
		</div>
	</div>
</div>
<div class="col-md-4 p-3">
	<div class="container">
		<div class="card" onclick="go('sports')"  style="cursor: pointer">
			<div class="card-header"><i class="fa fa-futbol-o"></i>
				&nbsp;&nbsp;Sports
			</div>
		</div>
	</div>
</div>
<div class="col-md-4 p-3">
	<div class="container">
		<div class="card" onclick="go('editorial')"  style="cursor: pointer">
			<div class="card-header"><i class="fa fa-user"></i>
				&nbsp;&nbsp;Editorial
			</div>
		</div>
	</div>
</div>
<div class="col-md-4 p-3">
	<div class="container">
		<div class="card" onclick="go('literary')"  style="cursor: pointer">
			<div class="card-header"><i class="fa fa-pencil"></i>
				&nbsp;&nbsp;Literary
			</div>
		</div>
	</div>
</div>
<div class="col-md-4 p-3">
	<div class="container">
		<div class="card" onclick="go('feature')"  style="cursor: pointer">
			<div class="card-header"><i class="fa fa-star"></i>
				&nbsp;&nbsp;Feature
			</div>
		</div>
	</div>
</div>
</div>
<script>
	function go(e) {
		window.location.href = "/dashboard/proj-file/" + localStorage.getItem("issue_id") + "/" + e;
	}
</script>
<?php 
}
?>