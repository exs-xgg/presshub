<?php

?>
<div class="container">
		<h3>User Settings</h3>
	<div class="row">
		
		<div class="col-6">
			<div class="card-body bg-secondary">
				<label>First Name</label>
			<input class="form-control form-control-alternative" type="text" id="first_name">
				<label>Middle Name</label>
			<input class="form-control form-control-alternative" type="text" id="middle_name">
				<label>Last Name</label>
			<input class="form-control form-control-alternative" type="text" id="last_name">
				<label>Contact Number</label>
			<input class="form-control form-control-alternative" type="text" id="contact" maxlength="11" onkeypress="return isNumber(event)">
				<label>Email Address</label>
			<input class="form-control form-control-alternative" type="email" id="email_addr">
				
			</div>
			
		</div>
		<div class="col-6">
			<div class="card-body bg-secondary">
				<label>Username</label>
			<input class="form-control form-control-alternative" type="text" id="username" required>
				<label>New Password</label>
			<input class="form-control form-control-alternative" type="password" id="password" required onkeyup="confirmPass()">
				<label>Confirm Password</label>
			<input class="form-control form-control-alternative" type="Password" id="conf_password" required onkeyup="confirmPass()">
			<hr>
			<button class="btn btn-primary" onclick="saveUserDetails()" id="submiter">Submit</button>
			</div>
		</div>
	</div>
</div>
<script>
loadUserDetails();
function confirmPass(){
		if ($("#password").val() !== $("#conf_password").val()) {
			 $("#conf_password").addClass("text-danger border-danger");
			 $("#conff").addClass("text-danger");
		return false;
		}else{
			$("#conf_password").removeClass("text-danger border-danger");
			 $("#conff").removeClass("text-danger");
			 $("#conf_password").addClass("text-success border-success");
			 $("#conff").addClass("text-success");
		return true;
		}
	}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
	function loadUserDetails(){


		$.ajax({
			url: '/api/user/' + <?php echo $_SESSION['idx']; ?>,
			success: function(result){
				result = jQuery.parseJSON(result);
				$.each(result,function(idx,value){
					$("#last_name").val(value.last_name);
					$("#first_name").val(value.first_name);
					$("#middle_name").val(value.middle_name);
					$("#email_addr").val(value.email_addr);
					$("#contact").val(value.contact_no);
					$("#username").val(value.username);
					$("#realpw").val(value.password);

				});
			}
		});
	}
	function saveUserDetails(){

		if (confirmPass()) {
		var pw1 = $("#password").val();
		var pw2 = $("#c_password").val();
		var rp = $("#realpw").val();
		if (!(pw1=="" || pw2=="")) {
			var dataa = [{
				"first_name" : "'" + $("#first_name").val() + "'",
				"last_name" : "'" + $("#last_name").val() + "'",
				"middle_name": "'" + $("#middle_name").val() + "'",
				"email_addr" : "'" +$("#email_addr").val() + "'",
				"contact_no" : "'" + $("#contact").val() + "'",
				"username" : "'" + $("#username").val() +"'",
				"password" : "'" + pw1 + "'"
			}];
			dataa = JSON.stringify(dataa);
			$.ajax({
				url: '/api/user/' + <?php echo $_SESSION['idx']; ?>,
				data: dataa,
				type: 'PUT',
			success: function(result){
					// console.log(result);
					toastr.success("User succesfully updated");

				}
			});
		}else{
		toastr.error("Password not set");
	}
		}else{
			toastr.error("Passwords do not match");
		}

	
	}
</script>