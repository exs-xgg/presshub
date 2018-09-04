<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Add Announcement
				</div>
				<div class="card-body">
					<label>Role Name</label>
					<input type="text" id="role" class="form-control col-lg-4">
					<br>
					<button class="btn btn-primary col-lg-2" onclick="submitRole()">Add Role</button>
				</div>
				<div class="card-footer">
					<label>Announcements</label>
					<table class="table" id="announcementTable">
						<thead>
							<tr><th>Title</th><th>Body</th><th>Date</th><th>Is Active</th><th>Actions</th></tr>
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
	 $('#announcementTable').DataTable();
	getRoles();
	function getRoles(){
		$("#roleTable > tbody").empty();
		$.ajax({
			url: "/api/announcement/",
			success: function(result){
				console.log(result);
				r = jQuery.parseJSON(result);
				$.each(r,function(idx,value){
					 $('#roleTable > tbody:last-child').append('<tr><td id="t_' + value.id + '">' + value.title + '</td><td data-toggle="tooltip" data-placement="bottom" title="' + value.body + '" >' + value.body.substring(0,10) + '</td><td>' + value.date_created + '</td><td> <button onclick="deleteRole(' + "'" +value.id +  "'" +')">Delete</button></td<td>More buttons here</td></tr>');
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
		var dataa = [{
				'first_name': "'" + $("#first_name").val() + "'",
				'middle_name': "'" + $("#middle_name").val() + "'",
				'last_name': "'" + $("#last_name").val() + "'",
				'designation': "'" + $("#designation").val().substring(0,3) + "'",
				'contact_no': "'" + $("#contact_no").val() + "'",
				'email_addr': "'" + $("#email_addr").val() + "'",
				'username': "'" + $("#username").val() + "'",
				'password': "'" + $("#password").val() + "'",
				'is_admin':"'" + $("#is_admin").val().substring(0,1) + "'"
			}];
			dataa = JSON.stringify(dataa);
			// console.log(dataa);
			$.ajax({
				type: "post",
				data: dataa,
				url: "/api/announcement",
				success: function(result){
					toastr.info("Succesfully created user");
				}
			});
	}
</script>