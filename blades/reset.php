<?php

include 'dependencies.php';
?>
<main>
<div class="container">
	<h1 class="text-white">New Password</h1>
	<hr>
	<div class="row">
		<div class="col-10 mx-auto">
			<div class="card card-shadow">
				<div class="card-body">
					
						<nav class="alert alert-info">Enter new password</nav>
					
				<label>Password:</label>
				<input type="password" name="" id="pw1" class="form-control form-control-alternative">
				<br>
				<button class="btn btn-primary pull-right" id="bt1" onclick="show2()">Submit</button>
				</div>
				<div class="card-footer" id="retype">
					<b>Re-type password</b><br>
				<label id="question"></label><input type="password" name="" id="pw2" class="form-control form-control-alternative">
				<br>
				<button class="btn btn-primary pull-right" onclick="goMe()">Submit</button>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
</main>
<script type="text/javascript">
	$("#retype").hide();
	function show2(){
		$("#retype").show(500);
		$("#bt1").hide();
	}
	function goMe(){
		if ($("#pw1").val()==$("#pw2").val()) {
			var dataa = [{
				"password" : "'" + $("#pw1").val()+ "'"
			}];
			dataa = JSON.stringify(dataa);
			$.ajax({
				url: '/api/user/' + <?php echo $_SESSION['idx']; ?>,
				type: 'put',
				data: dataa,
				success: function(result){
					toastr.success("Password Changed!");
					window.location.href=("/dashboard");
				}
			});

		}
		
	}
</script>