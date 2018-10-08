<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="container">
				<div class="row">
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
											
											<option id="N">NO</option>
											<option id="Y">YES</option>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-3">
										<label>Username</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="text" id="username" placeholder="username"  data-toggle="tooltip" data-placement="bottom" title="4-10 characters only" maxlength="10">
									</div>
									<div class="col-lg-4">
										<label>Password</label>
										<input class=" col-lg-12 form form-control form-control-alternative" type="password" id="password" placeholder="Password"  data-toggle="tooltip" data-placement="bottom" title="Preferrably 8-10 characters with a combination of Numbers, Uppercase and Lowercase letters">
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
			echo '<option id="'.$key['id'].'">'.$key['description']."</option>";
		}
	}
?>
											<
										</select>
									</div>
								</div>
								<br>
								<button class="btn btn-primary" onclick="submitForm()">SUbmit</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function submitForm(){
			var dataa = [{
				'first_name': "'" + $("#first_name").val().replace(/<>/ig,"") + "'",
				'middle_name': "'" + $("#middle_name").val().replace(/<>/ig,"") + "'",
				'last_name': "'" + $("#last_name").val().replace(/<>/ig,"") + "'",
				'designation': "'" + $("#designation").val().replace(/<>/ig,"").substring(0,3) + "'",
				'contact_no': "'" + $("#contact_no").val().replace(/<>/ig,"") + "'",
				'email_addr': "'" + $("#email_addr").val().replace(/<>/ig,"") + "'",
				'username': "'" + $("#username").val().replace(/<>/ig,"") + "'",
				'password': "'" + $("#password").val().replace(/<>/ig,"") + "'",
				'is_admin':"'" + $("#is_admin").val().replace(/<>/ig,"").substring(0,1) + "'"
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
	// toastr.info("Succesfully created user");
</script>