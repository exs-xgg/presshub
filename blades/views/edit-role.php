<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Add Role
				</div>
				<div class="card-body">
					<label>Role Name</label>
					<input type="text" id="role" class="form-control col-lg-4">
					<br>
					<button class="btn btn-primary col-lg-2" onclick="submitRole()">Add Role</button>
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
			url: "/api/role/",
			success: function(result){
				console.log(result);
				r = jQuery.parseJSON(result);
				$.each(r,function(idx,value){
					 $('#roleTable > tbody:last-child').append('<tr><td contenteditable="true" id="t_' + value.id + '">' + value.description + '</td><td><button onclick="editRole(' + "'" +value.id +  "'" +')">Save</button> <button onclick="deleteRole(' + "'" +value.id +  "'" +')">Delete</button></td></tr>');
				});
				for (var i = 0; i < r.length; i++) {
				    
				    
				}
		           
		        }
				
			});
		
	}
	function editRole(id){
		$.ajax({
			url: "/api/role/" + id,
			type: "PUT",
			success: function(result){
				toastr.info("Delete succesful");
				getRoles();
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
		var role = $("#role").val();
		$.ajax({
			url: "/api/role",
			type: "post",
			data: JSON.stringify(role),
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