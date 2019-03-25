
			<div class="container">
				<div class="row">
					<div class="col-6">
						<div class="card">
						<div class="card-header">
							<b><span id="wat">Create New</span> User</b>
						</div>
						<div class="card-body">
							<div class="form" action="/api/user" method="post" id="createUserForm_">
								<div class="row">
									<div class="col-lg-4">
										<label>First Name</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="text" id="first_name" placeholder="First Name">
									</div>
									<div class="col-lg-4">
										<label>Middle Name</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="text" id="middle_name" placeholder="Middle Name">
									</div>
									<div class="col-lg-4">
										<label>Last Name</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="text" id="last_name" placeholder="Last Name">
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-4">
										<label>Contact No.</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="text" id="contact_no" placeholder="Contact No." data-toggle="tooltip" data-placement="bottom" maxlength="11" onkeypress="return isNumber(event)" >
									</div>
									<div class="col-lg-4">
										<label>Email Address</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="email" id="email_addr" placeholder="Email Address">
									</div>
									<div class="col-lg-4">
										<label>Is Assistant Admin?</label>
										<select class="form form-control form-control-alternative" id="is_admin" placeholder="--">
											
											<option id="NO">NO</option>
											<option id="YES">YES</option>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-4">
										<label>Username</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="text" id="username" placeholder="username"  data-toggle="tooltip" data-placement="bottom" title="up to 32 characters only" maxlength="10">
									</div>
									<div class="col-lg-4">
										<label>Password</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="password" id="password" placeholder="Password"  data-toggle="tooltip" data-placement="bottom" title="Preferrably 8-32 characters with a combination of Numbers, Uppercase and Lowercase letters" onkeyup="confirmPass()">
									</div>
									<div class="col-lg-4">
										<label id="conff">Confirm Password</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="password" id="conf_password" placeholder="Password" onkeyup="confirmPass()">
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<label>Designation</label>
										<select class="form form-control form-control-alternative" id="designation" placeholder="Designation">
											<option>
												Choose Designation
											</option>
<?php 
	$result = DB::select("designation",null,"description not in (select distinct(designation) from users)");
	// echo "$result";
	if ($result!=='[]') {
		$result = json_decode($result,true);
		foreach ($result as $key) {
			echo '<option value="'.$key['description'].'">'.$key['description']."</option>";
		}
	}
?>
											<option value="CORRESPONDENT">
												CORRESPONDENT
											</option>
											<option value="NONE">
												NONE
											</option>
											<span id="illegal">
												asd
											</span>
										</select>
									</div>
									<!-- <div class="col-lg-5">
										<label>Department</label>
										<select class="form form-control form-control-alternative" id="designation" placeholder="Designation">
											<option>
												Sports
											</option>
									</select>
									</div> -->
								</div><input type="text" id="is_active" value="Y" hidden>
								<div class="row">
									<div class="col-12">
										<label>Secret Question</label>
										<select class="form-control form-control-alternative" id="question" placeholder="">
											<option>
												Choose Secret Question
											</option>
<?php 
	$result = DB::raw("select * from questions");
	// echo "$result";
	if ($result!=='[]') {
		$result = json_decode($result,true);
		foreach ($result as $key) {
			echo '<option value="'.$key['id'].'">'.$key['question']."</option>";
		}
	}
?>
											
										</select>
									</div>
									
									
								</div>
								<div class="row">
										<div class="col-12">
										<label>Answer</label>
										<input class="form-control form-control-alternative" type="text" name="" id="answer">
									</div>
									</div>
								<br>
								<button class="btn btn-primary" id="submiter" onclick="submitForm()">SUbmit</button>
							</div>
						</div>
						
					</div>
					</div>
					<div class="col-6">
						<table class="table" id="userTable">
							<thead>
								<tr><th>Name</th><th>Designation</th><th>Is Active</th></tr>
								
							</thead><tbody></tbody>
						</table>
					</div>
				</div>
			</div>
<script>
	localStorage.removeItem("user_id");
	getUserlist();
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
	function getUserDetails(e){
		localStorage.setItem("user_id",e);
		$("#wat").text("View");

			$("#submiter").attr('disabled','true');
		$.ajax({
			url: '/api/user/' + e,
			success: function(result){
				result = jQuery.parseJSON(result);
				$.each(result,function(idx,value){
					$(".dump").remove();
					$("#designation").append('<option class="dump" value="'+value.designation+'">'+value.designation+'</option>');
					$("#designation").val(value.designation);
					$("#last_name").val(value.last_name);
					$("#first_name").val(value.first_name);
					$("#middle_name").val(value.middle_name);
					$("#email_addr").val(value.email_addr);
					$("#contact_no").val(value.contact_no);
					$("#username").val(value.username);
					$("is_admin").val(value.is_admin);
					$("#question").val('*****');
					$("#answer").val('*****');
					$("#password").val("");
					$("#conf_password").val("");
				});
			}
		});
	}
	function getUserlist(){
		$.ajax({
			url: '/api/user',
			success: function(result){
				result = jQuery.parseJSON(result);
				$("#userTable > tbody").empty();
				$.each(result, function(idx,value){
					var r = (value.is_active=='N')?"bg-gray text-white" : "bg-info text-white"
					$("#userTable > tbody").append('<tr class=""><td>'+ value.first_name + ' ' + value.last_name+'</td><td>'+value.designation+'</td><td><label class="custom-toggle"><input id="ac_'+value.id+'" onchange="activate('+value.id+')" '+((value.is_active=='Y')? "checked" : "") +' type="checkbox"><span class="custom-toggle-slider rounded-circle"></span></label><td><button class="btn btn-gray" onclick="getUserDetails('+value.id+')">EDIT</button></td></td></tr>');
				})
			}
		});
	}


	// <label class="custom-toggle">
 //              <input checked="" type="checkbox">
 //              <span class="custom-toggle-slider rounded-circle"></span>
 //            </label>
	function activate(e){
		var conf = confirm("Do you really want to " + (($("#ac_" + e).is(':checked'))?"Activate":"Deactivate") + " this user?");
		if (conf) {
			var dataa = [{
				'is_active' : "'" + (($("#ac_" + e).is(':checked'))?"Y":"N") + "'"
				}];
			dataa = JSON.stringify(dataa);
			$.ajax({
				type: "PUT",
				data: dataa,
				url: "/api/user/" + e,
				success: function(result){
					toastr.success("Succesfully updated user");
				}
			});
		}else{
			$("#ac_" + e).prop('checked',(($("#ac_" + e).is(':checked')) ? false : true));
			}
		
	}
	function submitForm(){
		if (confirmPass()) {
		if ($("#password").val()=="") {
			toastr.error("No Password Input.");

		}else{
		
		if (localStorage.getItem("user_id")) {
			var dataa = [{
				'first_name': "'" + $("#first_name").val().replace(/<>/ig,"") + "'",
				'middle_name': "'" + $("#middle_name").val().replace(/<>/ig,"") + "'",
				'last_name': "'" + $("#last_name").val().replace(/<>/ig,"") + "'",
				'designation': "'" + $("#designation").val().replace(/<>/ig,"") + "'",
				'contact_no': "'" + $("#contact_no").val().replace(/<>/ig,"") + "'",
				'email_addr': "'" + $("#email_addr").val().replace(/<>/ig,"") + "'",
				'username': "'" + $("#username").val().replace(/<>/ig,"") + "'",
				'password': "'" + $("#password").val().replace(/<>/ig,"") + "'",
				'is_admin':"'" + $("#is_admin").val().substring(0,1) + "'",
				'is_active' : "'" + $("#is_active").val().substring(0,1) + "'",
				'question_id' : "'" + $("#question").val() + "'",
				'answer' : "'" + $("#answer").val().replace(/<>/ig,"") + "'"
			}];
			dataa = JSON.stringify(dataa);
			// console.log(dataa);
			$.ajax({
				type: "PUT",
				data: dataa,
				url: "/api/user/" + localStorage.getItem("user_id"),
				success: function(result){
					toastr.success("Succesfully updated user");
				}
			});

			localStorage.removeItem("user_id");
			$("#wat").text("Create New");
			$("#submiter").attr('disabled','false');
			emptyFields();
		}else{
			var dataa = [{
				'first_name': "'" + $("#first_name").val().replace(/<>/ig,"") + "'",
				'middle_name': "'" + $("#middle_name").val().replace(/<>/ig,"") + "'",
				'last_name': "'" + $("#last_name").val().replace(/<>/ig,"") + "'",
				'designation': "'" + $("#designation").val().replace(/<>/ig,"") + "'",
				'contact_no': "'" + $("#contact_no").val().replace(/<>/ig,"") + "'",
				'email_addr': "'" + $("#email_addr").val().replace(/<>/ig,"") + "'",
				'username': "'" + $("#username").val().replace(/<>/ig,"") + "'",
				'password': "'" + $("#password").val().replace(/<>/ig,"") + "'",
				'is_admin': "'" + $("#is_admin").val().replace(/<>/ig,"").substring(0,1) + "'",
				'is_active' : "'" + $("#is_active").val().substring(0,1) + "'",
				'question_id' : "'" + $("#question").val() + "'",
				'answer' : "'" + $("#answer").val().replace(/<>/ig,"") + "'"
			}];
			dataa = JSON.stringify(dataa);
			// console.log(dataa);
			$.ajax({
				type: "post",
				data: dataa,
				url: "/api/user",
				success: function(result){
					toastr.success("Succesfully created user");
				}
			});
		}
	}
		getUserlist();
		}
	}
	// toastr.info("Succesfully created user");
function emptyFields(){
	$("#last_name").val("");
					$("#first_name").val("");
					$("#middle_name").val("");
					$("#email_addr").val("");
					$("#contact_no").val("");
					$("#designation").val("");
					$("#username").val("");

					$("#password").val("");
					$("#conf_password").val("");
					$("is_admin").val("");
					$("#answer").val("");
					$("#question_id").val("");
}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<style type="text/css">
	.bg-warning{
		background-color: pink;
	}
</style>