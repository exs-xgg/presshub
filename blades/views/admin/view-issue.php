<?php 

(isset($uri[3]) && ($uri[3])!=="") ? $id = $uri[3] : header("location: /admin");
?>
<script>
	localStorage.setItem("issue_id","<?php echo $id; ?>");
</script>

<div class="card bg-secondary">
	<div class="card-body">
		<div class="container">
<nav class="alert alert-dark"><h4 class="text-white">Issue</h4></nav>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="container" id="form">
						<div class="row">
							<div class="col-md-12 mx-auto">
								<label>Issue Name*</label>
								 <input class="form-control form-control-alternative" type="text" id="issue_name">
							</div>
							<div class="col-lg-6 col-md-6">
								
							</div>
						</div>
						<br>
						<div class="container">
							<div class="input-daterange datepicker row align-items-center">
				              <div class="col">
				                <div class="form-group focused">
				                	<label>Start Date*</label>
				                  <div class="input-group">
				                    <div class="input-group-prepend">
				                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
				                    </div>
				                   <input class="form-control datepicker" id="date_started" placeholder="Start date" type="text" required>
				                  </div>
				                </div>
				              </div>
				              <div class="col">
				                <div class="form-group focused">
				                	<label>Deadline*</label>
				                  <div class="input-group">
				                    <div class="input-group-prepend">
				                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
				                    </div>
				                   <input class="form-control datepicker" id="deadline" placeholder="Select date" type="text" required>
				                  </div>
				                </div>
				              </div>
				            </div>
						</div>
						
						<div class="container">
							 <span class="btn btn-primary pull-right" id="issueupdatebtn" onclick="saveIssue()"><i class="fa fa-save"></i> Save</span> <a href="/admin" class="btn btn-warning" ><i class="fa fa-chevron-left"></i> Go Back</a>
						</div>
					</div>
				</div>
			</div>
			<br><br>
			<nav class="alert alert-dark"><h4 class="text-white">Articles</h4></nav>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<nav class="alert alert-success"><b><span class="text-white">New Article</span></b></nav>
						<label>Article Name</label>
						<div class="row">


							<div class="col-lg-8 col-md-8">
								<input class="form-control form-control-alternative" type="text" id="article_name">
							</div>
							<div class="col-lg-4 col-md-4">
								<button class="btn btn-primary" onclick="addArticle()"><i class="fa fa-plus"></i> Add</button>
							</div>



						</div>
						<br>
						<div class="row">
							<table class="table table-striped" id="article_list">
								<thead>
									<tr><th>Article Name</th><th>Date Added</th><td></td></tr>
								</thead>
								<tbody>
									<tr><td>Head ARticle</td><td>2018-09-09</td><td class="chev" onclick="loadArticlePage(2)"><i class="fa fa-chevron-right"></i></td></tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<section id="drawer">
							<div class="row">
								<div class="col-lg-12">
									<nav class="alert alert-dark" id="article_name_header">Article Name here</nav>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<a class="btn btn-primary text-white" onclick="goToArticle()">View Article</a>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<nav class="alert alert-warning">Assigned User(s)</nav>
								</div>
							</div>
							<div class="row">
								<div class="container">
									<div class="row">
			 							<div class="col-lg-10 ">
							                <label>Assign Users</label>
									 		<input class="form-control" type="text" id="userAssigned" list="userList">
								            <datalist id="userList">
											  <option value="7">Rain</option>
											  <option value="8">Josh</option>
											  <option value="9">Therese</option>
											  <option value="10">Calvin</option>
											  <option value="11">Maam Danica</option>
											</datalist>
										</div>
										<div class="col-lg-2">
											<label class="col-lg-12">&nbsp;</label>
											<span onclick="addUserToArticle()" class="btn btn-primary"><i class="fa fa-plus"></i> Add</span>
										</div>
			 						</div>
			 						<br>
									<div class="row">
										<table class="table table-striped" id="user_article_list">
											<thead>
												<tr><th>Name</th><td></td></tr>
											</thead>
											<tbody>
												<tr><td>Test</td><td class="col-md-1 chev"><i class="fa fa-close"></i></td></tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>	
	</div>

</div>


<script type="text/javascript">
	var article_name_init = '';
	$("#drawer").hide(0);
	loadIssue();
	loadArticle();
	function loadArticlePage(page){
		$("#drawer").hide(0);
		$.ajax({
			url: '/api/article/' + page,
			success: function(result){
				var art_page = jQuery.parseJSON(result);
				$.each(art_page,function(idx,value){
					localStorage.setItem("art_id", value.id);
					$("#article_name_header").text(value.name);
				});

				getUserList();
				loadUserArticle();
			}
		});
		$("#drawer").show(1000);

	}
	function addArticle(){
		article_name = $("#article_name").val();
		var dataaa = [{
				'name' : "'"+ article_name.replace(/(<([^>]+)>)/ig,"") +"'",
				'date_created': "now()",
				'status': "'H'",
				'body': "'" + btoa(('Insert content here').replace(/(<([^>]+)>)/ig,"")) + "'"
				}];
		dataaa = JSON.stringify(dataaa);
		$.ajax({
			url: "/api/article/" + localStorage.getItem("issue_id"),
			type: 'post',
			data: dataaa,
			success: function(result){
				toastr.success("Succesfully Added Article!");
				console.log(dataaa);
				console.log(result);
			}
		});
	}
	function getUserList(){
		$.ajax({
			url: '/api/user',
			success: function(result){
				var user_list = jQuery.parseJSON(result);
				$("#userList").empty();
				$.each(user_list,function(idx,value){
					$("#userList").append('<option value="' + value.id + '">' + value.first_name + ' ' + value.last_name + '</option>');
				});
			}
		});
	}
	function loadUserArticle(){
		var user_id = $("#userList").val();
		$.ajax({
			url: "/api/userList/" + localStorage.getItem("art_id"),
			success: function(result){
				console.log(result);
				var user_list = jQuery.parseJSON(result);
				$("#user_article_list").empty();
				$.each(user_list,function(idx,value){
					$("#user_article_list").append('<tr><td>'+ value.first_name +' ' + value.last_name + '</td><td class="col-md-1 chev"><i class="fa fa-close"></i></td></tr>');
				});
			}
		});
	}
	function addUserToArticle(){
		var user_id = $("#userAssigned").val();
		dataa = [{
			'user' : user_id,
			'article' : localStorage.getItem("art_id")
		}]
		dataa = JSON.stringify(dataa);
		$.ajax({
			url: "/api/userList",
			method: 'post',
			data: dataa,
			success: function(result){
				console.log(result);
				toastr.success("User Succesfully assigned to this Article!");
				loadUserArticle();
			}
		});
	}
	function goToArticle(){
		window.location.href = "/article/" + localStorage.getItem("art_id");
	}
	function loadArticle(){
		//<tr><td>Head ARticle</td><td>2018-09-09</td><td class="chev" onclick="loadArticlePage(2)"><i class="fa fa-chevron-right"></i></td></tr>
		$.ajax({
			url: "/api/article/" + localStorage.getItem("issue_id"),
			type: 'post',
			success: function(result){
				$("#article_list").empty();
				var res_art = jQuery.parseJSON(result);
				$.each(res_art,function(idx,value){
					$("#article_list").append('<tr><td>'+ value.name +'</td><td>'+ value.date_created +'</td><td class="chev" onclick="loadArticlePage('+ value.id +')"><i class="fa fa-chevron-right"></i></td></tr>');
				});
				
			}
		});
	}
	function loadIssue(){
		// alert(localStorage.getItem("issue_id"));
		$.ajax({
			url: "/api/issue/" + localStorage.getItem("issue_id"),
			success: function(result){
				result = jQuery.parseJSON(result);
				$.each(result,function(idx,value){
					$("#issue_name").val(value.nickname);
					var date_started = value.date_started.split(" ");
					date_started = date_started[0].split("-");
					date_started =  date_started[1] + "/" + date_started[2] + "/" + date_started[0];
					$("#date_started").val(date_started);
					var deadline = value.deadline.split(" ");
					deadline = deadline[0].split("-");
					deadline =  deadline[1] + "/" + deadline[2] + "/" + deadline[0];
					$("#deadline").val(deadline);
				});
			}
		});
	}
	function saveIssue(){
		if (!$("#date_started").val() || !$("#deadline").val()) {
			toastr.error("Date areas should not be empty!");
			$("#issueupdatebtn").addClass("btn-danger");
			return 0;
		}
		var date_started = $("#date_started").val().split("/");
		date_started = date_started[2] + "-" + date_started[0] + "-" + date_started[1];

		var deadline = $("#deadline").val().split("/");
		deadline = deadline[2] + "-" + deadline[0] + "-" + deadline[1];

var dataa = [{
				'nickname': "'" + $("#issue_name").val().replace(/(<([^>]+)>)/ig,"") + "'",
				'date_started': "date('" + date_started + "')",
				'deadline': "date('" + deadline + "')"
			}];
			dataa = JSON.stringify(dataa);
			// console.log(dataa);
			$.ajax({
				type: "put",
				data: dataa,
				url: "/api/issue/" + localStorage.getItem("issue_id"),
				success: function(result){
					toastr.info("Issue Succesfully Updated!");
					console.log(dataa);
				}
			})
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