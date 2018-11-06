<?php

include 'dependencies.php';

?>
<main>
<div class="container">
	<h1 class="text-white">Forgot Password</h1>
	<hr>
	<div class="row">
		<div class="col-10 mx-auto">
			<div class="card card-shadow">
				<div class="card-body">
					<?php if (isset($_REQUEST['pass']) && $_REQUEST['pass']=="true"): ?>
						<nav class="alert alert-success">Password reset has been succesful and has been reset to blank.</nav>
						<?php else: ?>
							<?php if (isset($_REQUEST['pass']) && $_REQUEST['pass']=="fail"): ?>
						<nav class="alert alert-danger">Invalid Answer.</nav>
					<?php endif ?>
					<?php endif ?>
				<label>Enter Username:</label>
				<input type="text" name="" id="username" class="form-control form-control-alternative">
				<br>
				<button class="btn btn-primary pull-right" onclick="searchUser()">Submit</button>
				</div>
				<div class="card-footer" id="questionSection">
					<b>Answers are case-sensitive</b><br>
				<label id="question"></label><input type="text" name="" id="answer" class="form-control form-control-alternative">
				<br>
				<button class="btn btn-primary pull-right" onclick="checkAnswer()">Submit</button>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
</main>
<script type="text/javascript">
	$("#questionSection").hide();
	var answer = "";
	function searchUser() {
		$.ajax({
			url: "/api/searchuser/" + $("#username").val() ,
			success: function(result){
				
				if (result !== "[]") {
					result = jQuery.parseJSON(result);
					var qid = 0;
					
					$.each(result, function(idx,value){
						$("#question").text(value.question);
						$("#questionSection").show(500);
						answer = value.answer;

					});
				}else{
					alert("No username matched or no secret question set yet. Please contact your system administrator");
				}
				console.log(result);
			}
		});
	}
	function checkAnswer(){
		window.location.href = "/api/forget/" + $("#username").val() + "/" + btoa($("#answer").val() );
	}
</script>