 <?php ?>

<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<div class="card bg-secondary text-center" onclick="go('myfile')"  style="cursor: pointer">
				<div class="card-body text-white">
					<h3>Document Files</h3>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card bg-secondary text-center" onclick="go('proj-file')"  style="cursor: pointer">
				<div class="card-body text-white">
					<h3>Project Files</h3>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-6">
			<div class="card bg-secondary text-center" onclick="go('archive')"  style="cursor: pointer">
				<div class="card-body text-white">
					<h3>Archived Projects</h3>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function go(e){
		window.location.href = "/dashboard/" + e;
	}
</script>