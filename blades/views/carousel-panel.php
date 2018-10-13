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
					<button class="btn btn-primary col-lg-4" onclick="submitAnnouncement()">Submit</button>
				</div>
				<div class="card-footer">
					<label>Announcements</label>
					<table class="table" id="announcementTable">
						<thead>
							<tr><th>Title</th><th>Body</th><th>Date</th><th>Actions</th></tr>
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
					 $('#announcementTable > tbody:last-child').append('<tr><td id="t_' + value.id + '">' + value.title + '</td><td data-toggle="tooltip" data-placement="bottom" title="' + value.body + '" >' + value.body.substring(0,20) + '</td><td>' + value.date_created + '</td><td> <button class="btn btn-danger" onclick="deleteAnnouncement(' +value.id +')">Delete</button><button class="btn btn-info" onclick="editAnnouncement(' +value.id +')">Edit</button></td></tr>');
				});
				
		           
		        }
				
			});
		
	}
	
	function deleteAnnouncement(id){
		var action = confirm("Are you sure you want to delete annoucement #" + id + "?");
		if (action) {
			$.ajax({
				type: "DELETE",
				url: "/api/announcement/" + id,
				success: function(result){
					toastr.info("Delete succesful");
					getAnnouncement();
				}
			});
		}
		
	}
	function editAnnouncement(e){
		 localStorage.setItem("ann_id",e);
		 $.ajax({
		 	url: '/api/announcement/' + e,
		 	success: function(result){
		 		result = jQuery.parseJSON(result);
		 		$.each(result,function(idx,value){

		 			$("#title").val(value.title);
		 			$("#body").val(value.body);
		 		});
		 	}
		 })
		getAnnouncement();
    }
		
	
	function submitAnnouncement(){
		if (localStorage.getItem("ann_id")) {
			var dataa = [{
				'title': "'" + $("#title").val() + "'",
				'body': "'" + $("#body").val() + "'",
				'author' : "'" + <?php echo $_SESSION['idx']; ?> + "'"
			}];
			dataa = JSON.stringify(dataa);
			// console.log(dataa);
			$.ajax({
				type: "put",
				data: dataa,
				url: "/api/announcement/"+localStorage.getItem("ann_id"),
				success: function(result){
					toastr.success("Succesfully updated announcement");
				}
			});
			$("#title").val('');
			$("#body").val('');
			localStorage.remoteItem("ann_id");
		}else{
		var dataa = [{
				'title': "'" + $("#title").val() + "'",
				'body': "'" + $("#body").val() + "'",
				'author' : "'" + <?php echo $_SESSION['idx']; ?> + "'"
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
			 getAnnouncement();
	}
</script>
