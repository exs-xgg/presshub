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
					<input type="hidden" name="author" value="<?php echo $_SESSION['id'];?>">
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
	 getAnnouncement();
	function getAnnouncement(){
		$("#announcementTable > tbody").empty();
		$.ajax({
			url: "/api/announcement",
			success: function(result){
				console.log(result);
				r = jQuery.parseJSON(result);
				$.each(r,function(idx,value){
					 $('#announcementTable > tbody:last-child').append('<tr><td id="t_' + value.id + '">' + value.title + '</td><td data-toggle="tooltip" data-placement="bottom" title="' + value.body + '" >' + value.body.substring(0,20) + '</td><td>' + value.date_created + '</td><td id="ac_' + value.id + '" contenteditable="true" onkeypress="editActiveAnnouncement(event,' + value.id + ')">' + value.is_active + '</td><td> <button class="btn btn-danger" onclick="deleteAnnouncement(' + "'" +value.id +  "'" +')">Delete</button><button class="btn btn-info" onclick="editAnnouncement(' + "'" +value.id +  "'" +')">Edit</button></td></tr>');
				});
				
		           
		        }
				
			});
		
	}
	
	function deleteAnnouncement(id){
		var action = confirm("Are you sure you want to delete annoucement #" + id + "?");
		if (action) {
			$.ajax({
				url: "/api/announcement/" + id,
				type: "DELETE",
				success: function(result){
					toastr.info("Delete succesful");
					getAnnouncement();
				}
			});
		}
		
	}
	function editActiveAnnouncement(e,id){
		 if (e.keyCode == 13) {
	        $.get({
				url: "/api/carouselActive/" +id+"/" + $("ac_" + id).text() ,
				success: function(result){
					toastr.success("Succesfully created announcement");
					console.log($("ac_" + id).text());
				}
			});
			 // timeout(1000,getAnnouncement());
		getAnnouncement();
    }
		
	}
	function submitAnnouncement(){
		var dataa = [{
				'title': "'" + $("#title").val() + "'",
				'body': "'" + $("#body").val() + "'",
				'author' : "'" + $("#author").val() + "'"
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
			 timeout(1000,getAnnouncement());
	}

</script>
