<?php
$logs = json_decode(DB::raw("select (concat(first_name, (concat(' ', last_name)))) as name, method, module, date_added from actions inner join users on actions.user=users.id order by actions.id desc limit 100"));
// var_dump($logs);
?>
<div class="container">
	<div class="row">
		<div class="col-8 mx-auto">
			<table id="logsTable" class="table">
				<thead>
					<tr><td>Timestamp</td><td>User</td><td>Action</td><td>Module</td></tr>
				</thead>

				<tbody>
					<?php foreach ($logs as $key1): ?>

						
							<tr><td><?php echo $key1->{"date_added"} ?></td>
								<td><?php echo $key1->{"name"} ?></td>
								<td><?php switch ($key1->{"method"}){
									case 'PUT':
										echo "UPDATE";
										break;
										case 'GET':	
										echo "RETRIEVE";
										break;
										case 'POST':
										echo "CREATE";
										break;
										case 'LOGIN':
										echo "LOGGED IN";
										break;
										case 'FILE':
										echo "UPLOAD";
										break;
										case 'DELETE':
										echo "DELETE";
										break;
								} ?></td>
								<td><?php echo $key1->{"module"} ?></td>
								
							</tr>
						
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#logsTable").DataTable({
        "order": [[ 1, "desc" ]]
    });
</script>