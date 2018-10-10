<?php
if (isset($uri[3]) && $uri[3]!=="") {
	$is_res = json_decode(DB::select("issue",null,"id=".$uri[3]));
	foreach ($is_res as $key) {
		$issue_name = $key->{"nickname"};
		$deadline = $key->{"deadline"};
	}
	?>
<div class="card">
	<div class="card-header">
		<h2><?php echo $issue_name ?></h2>
		<small>Deadline: <?php echo explode(" ",$deadline)[0] ?></small>
	</div>
	<div class="card-body">
		 <?php
	include 'issue-folder.php';
	?>
	</div>
</div>
	<?php
}else{
?>

<div class="container">
	<div class="row" id="projFileContainer">
		
	</div>
</div>

<script type="text/javascript">
	getProjFiles();
	function goIssue(e){
		window.location.href = "/dashboard/proj-file/" + e;
		localStorage.setItem("issue_id",e);
	}
	function getProjFiles(){
		$.ajax({
			url: '/api/issue',
			success: function(result){
				console.log(result);
				var issues = jQuery.parseJSON(result);
				$.each(issues,function(idx,value){
					$("#projFileContainer").append('<div class="col-md-4 p-3"><div class="container"><div class="card" onclick="goIssue(' + value.id + ')"  style="cursor: pointer"><div class="card-header"><i class="fa fa-folder"></i><b>&nbsp;&nbsp;' + value.nickname + '</b></div></div></div></div>');
				});
			}
		});
	}
</script>

<?php 
} 
?>