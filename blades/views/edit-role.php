<div class="container">
	<div class="row">
		<div class="col-lg-6 col-sm-12 mx-auto">
			<div class="card">
				<div class="card-header">
					Add Role
				</div>
				<div class="card-body">
					<label>Role Name</label>
					<input type="text" id="role" class="form-control col-8">
					<br>
					<button class="btn btn-primary col-4" onclick="submitRole()">Add Role</button>
				</div>
				<div class="card-footer">
					<label>Currently Available Designation</label>
					<table class="table" id="roleTable">
						<thead>
							<tr><th>Designation</th><th>Action</th></tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	getRoles();
	function getRoles(){
		$("#roleTable > tbody").empty();
		$.ajax({
			url: "/api/role",
			success: function(result){
				console.log(result);
				r = jQuery.parseJSON(result);
				$.each(r,function(idx,value){
					 $('#roleTable > tbody:last-child').append('<tr><td contenteditable="true" id="t_' + value.id + '">' + value.description + '</td><td> <button class="btn btn-danger" onclick="deleteRole(' + "'" +value.id +  "'" +')">Delete</button></td></tr>');
				});
			
		           
		        }
				
			});
		
	}
	
	function deleteRole(id){
		var action = confirm("Are you sure you want to delete " + id + "?");
		if (action) {
			$.ajax({
				url: "/api/role/" + id,
				type: "DELETE",
				success: function(result){
					toastr.info("Delete succesful");
					getRoles();
				}
			});
		}
		
	}
	function submitRole(){
		var role = [{ 
			"id": "'" + $("#role").val().substring(0,3).toUpperCase()+ "'", 
			"description": "'" + $("#role").val().toUpperCase() + "'"}];
		role = JSON.stringify(role);
		$.ajax({
			url: "/api/role",
			type: "post",
			data: role,
			success: function(result){
					toastr.info("Succesfully added Designation");
					// console.log(JSON.stringify(role));
					// console.log(result);
					$("#role").val("");
					getRoles();
				}
		});
	}
</script>