
			<div class="container">
				<div class="row">
					<div class="col-6">
						<div class="card">
						<div class="card-header">
							<span>Create New User</span>
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
										<input class=" col-lg-12 form form-control form-control-alternative" type="number" id="contact_no" placeholder="Contact No." data-toggle="tooltip" data-placement="bottom" title="Start with 9 (ex. 9174589972)" maxlength="10">
									</div>
									<div class="col-lg-4">
										<label>Email Address</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="email" id="email_addr" placeholder="Email Address">
									</div>
									<div class="col-lg-4">
										<label>Is Admin?</label>
										<select class="form form-control form-control-alternative" id="is_admin" placeholder="--">
											
											<option id="NO">NO</option>
											<option id="YES">YES</option>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-3">
										<label>Username</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="text" id="username" placeholder="username"  data-toggle="tooltip" data-placement="bottom" title="up to 32 characters only" maxlength="10">
									</div>
									<div class="col-lg-4">
										<label>Password</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="password" id="password" placeholder="Password"  data-toggle="tooltip" data-placement="bottom" title="Preferrably 8-32 characters with a combination of Numbers, Uppercase and Lowercase letters">
									</div>
									<div class="col-lg-5">
										<label>Designation</label>
										<select class="form form-control form-control-alternative" id="designation" placeholder="Designation">
											<option>
												Choose Designation
											</option>
<?php 
	$result = DB::select("designation");
	// echo "$result";
	if ($result!=='[]') {
		$result = json_decode($result,true);
		foreach ($result as $key) {
			echo '<option id="'.$key['description'].'">'.$key['description']."</option>";
		}
	}
?>
											<
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
								
								<br>
								<button class="btn btn-primary" onclick="submitForm()">SUbmit</button>
							</div>
						</div>
						
					</div>
					</div>
					<div class="col-6">
							<table class="table" id="userTable">
								<thead>
									<tr><th>Name</th><th>Designation</th><th>Is Active</th><th></th></tr>
									
								</thead><tbody></tbody>
							</table>
						</div>
				</div>
			</div>
<script>
	getUserlist();
	function getUserDetails(e){
		localStorage.setItem("user_id",e);
		$.ajax({
			url: '/api/user/' + e,
			success: function(result){
				result = jQuery.parseJSON(result);
				$.each(result,function(idx,value){
					$("#last_name").val(value.last_name);
					$("#first_name").val(value.first_name);
					$("#middle_name").val(value.middle_name);
					$("#email_addr").val(value.email_addr);
					$("#contact_no").val(value.contact_no);
					$("#designation").val(value.designation);
					$("#username").val(value.username);
					$("#realpw").val(value.password);
					$("is_admin").val(value.is_admin);

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
					$("#userTable > tbody").append('<tr class=""><td>'+ value.first_name + ' ' + value.last_name+'</td><td>'+value.designation+'</td><td><label class="custom-toggle"><input id="ac_'+value.id+'" onchange="activate('+value.id+')" '+((value.is_active=='Y')? "checked" : "") +' type="checkbox"><span class="custom-toggle-slider rounded-circle"></span></label></td><td><span class="btn  btn-primary" onclick="getUserDetails('+value.id+')">edit</span></td></tr>');
				})
			}
		});
	}


	// <label class="custom-toggle">
 //              <input checked="" type="checkbox">
 //              <span class="custom-toggle-slider rounded-circle"></span>
 //            </label>
	function activate(e){
		alert(e);
	}
	function submitForm(){
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
				'is_admin':"'" + $("#is_admin").val().replace(/<>/ig,"").substring(0,1) + "'",
				'is_active' : "'" + $("#is_active").val().substring(0,1) + "'"
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

			localStorage.removeItem("user_id")
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
				'is_admin':"'" + $("#is_admin").val().replace(/<>/ig,"").substring(0,1) + "'",
				'is_active' : "'" + $("#is_active").val().substring(0,1) + "'"
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
		getUserlist();
	}
	// toastr.info("Succesfully created user");
	
</script>
<style type="text/css">
	.bg-warning{
		background-color: pink;
	}
</style>