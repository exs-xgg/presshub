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
		<small>Total Articles: <?php echo ((DB::raw("select count(*) as ct from article where issue_id=".$uri[3]))); ?></small><br>
		<small>Deadline: <?php echo explode(" ",$deadline)[0] ?></small><br><br>
		<span class="btn btn-sm btn-warning">Edit Details</span><span class="btn btn-sm btn-success" onclick="$('#addArticlePanel').show(750)">Add Article</span><a href="/layout" class="btn btn-sm btn-info">Proceed to Layout</a>
		<hr>
		<div class="container" id="addArticlePanel">
			<div class="row">
				
				<div class="col-6 order-1">
<span class="badge badge-danger pull-right"  onclick="$('#addArticlePanel').hide(750)" style="cursor: pointer;">x</span>
					<label for="article_name">Article Name</label>
					<input class="form-control form-control-alternative" type="text" id="article_name">
					<label for="deadline">Deadline</label>
					<input class="form-control form-control-alternative" type="date" id="deadline_1">

					<label for="category">Category</label>
					<select class="form-control" type="text" id="category" list="userList">
							            <datalist id="userList">
										  <option value="News">News</option>
										  <option value="Feature">Feature</option>
										  <option value="Sports">Sports</option>
										  <option value="Literary">Literary</option>
										  <option value="Editorial">Editorial</option>
										</datalist>
					</select><br>
					<button class="btn btn-primary" onclick="saveNewArticle()">Submit</button><br><br>
				</div>
				
			</div><hr>
		</div>
		<?php if (isset($uri[4]) && $uri[4]!=="") {
			?>


<div class="container">
	<div class="col-3"><a href="./" class="btn btn-outline-primary"><i class="fa fa-chevron-up"></i>&nbsp;&nbsp;Back</a></div>
</div>
			<?php
		}?>


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

<?php 
} 
?>

<script type="text/javascript">
	$("#addArticlePanel").hide();
	getProjFiles();
	function goIssue(e){
		window.location.href = "/dashboard/proj-file/" + e;
		localStorage.setItem("issue_id",e);
	}
	function getProjFiles(){
		$.ajax({
			url: '/api/issue',
			success: function(result){
				// console.log(result);
				var issues = jQuery.parseJSON(result);
				$.each(issues,function(idx,value){
					$("#projFileContainer").append('<div class="col-4 p-3 align-self-center"><div class="container"><div class="card" onclick="goIssue(' + value.id + ')"  style="cursor: pointer"><div class="card-header"><i class="fa fa-folder"></i><b>&nbsp;&nbsp;' + value.nickname + '</b></div></div></div></div>');
				});
			}
		});
	}

	function saveNewArticle(){
		var deadline = $("#deadline_1").val();
		var title = $("#article_name").val().replace(/(<([^>]+)>)/ig,"");
		var art_data = [{
			"issue_id" : localStorage.getItem("issue_id"),
			"name" : "'" + title + "'",
			"deadline" : "date('" + deadline + "')",
			"cat_id" : "'" + $("#category").val() + "'"
		}];
		art_data = JSON.stringify(art_data);
		$.ajax({
			url: "/api/article",
			type: "post",
			data: art_data,
			success: function(result){
				// console.log(result);
				toastr.success("Successfully Added Article");
				$("#article_name").val("");
				$("#deadline").val("");

			}
		});
	}
</script>