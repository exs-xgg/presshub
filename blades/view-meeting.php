<?php ?>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<?php
			if ($_SESSION['is_admin']=='Y') {
				?>
<div class="card p-3">
				<div class="card-header">
					<span class="text-uppercase font-weight-bold">Add meeting</span>
				</div>
				<div class="card-body bg-secondary">
					<label>Meeting Title</label>
					<div class="row">
						<div class="col-md-8">
							<input class="form-control form-control-alternative" type="text" id="name">
						</div>
						<div class="col-md-4">
							<span class="btn btn-primary" onclick="addMeeting()"><i class="fa fa-plus"></i>Add</span>
						</div>
					</div>
					
				</div>
			</div>

				<?php
			}
?>

			
			<div class="card p-3">
				<div class="card-header">
					<span class="text-uppercase font-weight-bold">Meeting History</span>
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr><th>Meeting Title</th><th>Date</th><th></th></tr>
						</thead>
						<tbody>
							<?php
$meetings = json_decode(DB::select("meeting"));
if ($meetings==[]) {
	echo "<tr><td>No meetings recorded yet</td></tr>";
}else{
foreach ($meetings as $key) {
	echo "<tr><td>" . $key->{"name"} . "</td><td>" . $key->{"date_of_meeting"} . '</td><td class="chev"  onclick="getMinutes(' . $key->{"id"} .')"><span><i class="fa fa-chevron-right"</span></td></tr>';
}
}
?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<section id="drawer">
				<div class="container">
					<label>Minutes</label>
					<div class="row">

						<div class="col-md-12">
							<label>Meeting Title</label>
							<input class="form-control form-control-alternative" type="text" id="minute_name">
						</div>
						<div class="col-md-12">
							<label>Meeting Description</label>
							<textarea class="form-control form-control-alternative" type="text" id="minute_desc"></textarea>
						</div>
						<div class="col-md-12">
							<label>Meeting Date</label>
							<input class="form-control form-control-alternative" type="date" id="meeting_date">
						</div>
							<span class="btn btn-primary" onclick="addMinute()"><i class="fa fa-plus"></i>Add</span>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<script type="text/javascript">
	function getMinutes(e){
		$.ajax({
			url: '/api/meeting/' + e,
			success: function(result){
				result = jQuer
			}
		});

		$.ajax({
			url: '/api/meeting-minutes/' + e,
			success: function(result){

			}
		});
	}
	function addMeeting(){
		var meeting_data = [{
			"name" : "'" + $("#name").val() + "'"
		}];
		meeting_data = JSON.stringify(meeting_data);
		$.ajax({
			url: '/api/meeting',
			data: meeting_data,
			type: 'post',
			success: function(result){
				console.log(result);

			}
		});
	}
</script>




<style type="text/css">
	tr:hover{
		background-color: #ddd;
	}
	.chev:hover{
		cursor: pointer;
		background-color: gray;
		color: white
	}
	
</style>