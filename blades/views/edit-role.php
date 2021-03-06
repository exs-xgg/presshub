<div class="container">
	<div class="row">
		<div class="col-lg-6 col-sm-12 mx-auto">
			<div class="card">
				<div class="card-header">
					<label>Currently Vacant Designations</label>
				</div>
				
				<div class="card-footer">
					
					<table class="table" id="roleTable">
						<thead>
							<tr><th>Designation</th></tr>
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
					 $('#roleTable > tbody:last-child').append('<tr><td id="t_' + value.id + '">' + value.description + '</td></tr>');
				});
			
		           
		        }
				
			});
		
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