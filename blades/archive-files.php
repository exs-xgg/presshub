
<div class="card">
	
	<div class="card-body">
		 <table class="table table-striped">
		 	<thead>
		 		<tr>
		 			<th>ID</th>
		 			<th>Issue Name</th>
		 			<th>Date Archived</th>
		 			<th></th>
		 		</tr>
		 	</thead>
		 	<tbody>
		 		<tr>
		 		<?php
		 		$result = DB::select("issue",null,"is_archived='Y'");
		 		 $result = json_decode($result);

		 		foreach ($result as $key1) {
		 			
		 				echo '<tr><td>'.$key1->{'id'}.'</td>';
		 				echo '<td>'.$key1->{'nickname'}.'</td>';
		 				echo '<td>'.$key1->{'date_finished'}.'</td><td><span class="badge badge-warning" onclick="unarch('. $key1->{'id'} .')">UNARCHIVE</span></td></tr>';
		 			
		 		}
		 		?>
		 	</tbody>
		 </table>
	</div>
</div>
	

<div class="container">
	<div class="row" id="projFileContainer">
		
	</div>
</div>


<script type="text/javascript">
	function unarch(e){
		var is_true = confirm("Unarchive this issue?");
		if (is_true) {
			$.ajax({
				url: '/api/unarch/' + e,
				success: function(result){
					toastr.success("Issue Unarchived");
					window.location.href=("/dashboard");
				}
			});
		}
	}

	
</script>
