<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Add Announcement
				</div>
				<div class="card-body">
					<label>Title</label>
					<input type="text" id="title" class="form-control col-lg-4">
					<br>
					<label>Body</label>
					<textarea class="form-control" id="body"></textarea>
					<br>
					<button class="btn btn-primary col-lg-4" onclick="submitAnnouncement()">Add Announcement</button>
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
	function getAnnouncement(){
		$("#announcementTable > tbody").empty();
		$.ajax({
			url: "/api/announcement/",
			success: function(result){
				console.log(result);
				r = jQuery.parseJSON(result);
				$.each(r,function(idx,value){
					 $('#announcementTable > tbody:last-child').append('<tr><td id="t_' + value.id + '">' + value.title + '</td><td data-toggle="tooltip" data-placement="bottom" title="' + value.body + '" >' + value.body.substring(0,10) + '</td><td>' + value.date_created + '</td><td> <button onclick="deleteRole(' + "'" +value.id +  "'" +')">Delete</button></td<td>More buttons here</td></tr>');
				});
				
		           
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
	function submitAnnouncement(){
		var dataa = [{
				'title': "'" + $("#title").val() + "'",
				'body': "'" + $("#body").val() + "'"
			}];
			dataa = JSON.stringify(dataa);
			// console.log(dataa);
			$.ajax({
				type: "post",
				data: dataa,
				url: "/api/announcement",
				success: function(result){
					toastr.success("Succesfully created announcement");
				}
			});
	}
</script>