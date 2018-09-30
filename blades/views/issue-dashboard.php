<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="card bg-secondary shadow border-0">
				<div class="card-header bg-white">
					Issue Dashboard
				</div>
				<div class="card-body">
					<legend>Issues</legend>
					<table class="table table-striped" id="issueListTable">
						<thead>
							<tr><th>#</th><th>Date Created</th><th>Nickname</th><th>Deadline</th><th>Status</th><th></th></tr>
						</thead>
						<tbody>
							
							
						</tbody>
					</table>
				</div>
			</div>
			<hr>
			<div id="issueCard" class="card bg-secondary shadow border-0">
				<div class="card-header bg-primary text-white">
					<span id="issueCardHeader">Issue Name here</span>
				</div>
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 ">
								<label>Issue Name</label>
								<input class="form-control form-control-alternative" type="text" id="nickname" value="">
							</div>
							<div class="col-lg-6 ">
								<label>Status</label>
								<select class="form-control" id="status" required>
					             	<option value="O">ONGOING</option>
					             	<option value="H">ON HOLD</option>
					             	<option value="D">DISMISSED</option>
					             </select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="input-daterange datepicker row align-items-center">
					              <div class="col">
					                <div class="form-group focused">
					                	<label>Start Date</label>
					                  <div class="input-group">
					                    <div class="input-group-prepend">
					                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
					                    </div>
					                   <input class="form-control form-control datepicker" id="date_started" placeholder="Start date" type="text" required>
					                  </div>
					                </div>
					              </div>
					              <div class="col">
					                <div class="form-group focused">
					                	<label>Deadline</label>
					                  <div class="input-group">
					                    <div class="input-group-prepend">
					                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
					                    </div>
					                   <input class="form-control form-control datepicker" id="deadline" placeholder="Select date" type="text" required>
					                  </div>
					                </div>
					              </div>
					            </div>
							</div>
						</div>
						<br><br>
						 <div class="alert alert-dark"><span class="text-white"><b>Add Articles</b></span></div>
						 <div class="card bg-secondary shadow border-0">
						 	<div class="card-body bg-white">
						 		<div class="row">
						 			<div class="col-lg-10 ">
						                <label>Article Name</label>
								 		<input class="form-control" type="text" id="name">
							            
									</div>
									
									<div class="col-lg-2">
										<label class="col-lg-12">&nbsp;</label>
										<button class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
									</div>
						 		</div>
						 		<hr>
						 		<div class="row">
						 			<div class="col-lg-4">
						 				<div class="list-group bg-secondary shadow border-0" id="articleList">
										 
										</div>
						 			</div>
						 			<div class="col-lg-8">
						 				<div class="card bg-secondary shadow border-0">
										 	<div class="card-body bg-warning text-white">
						 						Assigned Users
						 					</div>
						 					<div class="card-body">
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
														<button class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
													</div>
						 						</div>
						 						
						 						<ul class="list-group col-lg-12">
						 							<li class="list-group-item">
						 								Rain Pioquinto <button type="button" class="pull-right btn btn-sm btn-danger" data-toggle="modal" data-target="#md_1"><b>x</b></button>
						 							</li>
<div class="modal fade" id="md_1" tabindex="-1" role="dialog" aria-labelledby="modal-notification" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">
                  <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Delete User Assignment</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="py-3 text-center">
                      <i class="ni ni-bell-55 ni-3x"></i>
                      <h4 class="heading mt-4">WARNING!</h4>
                      <p>You are about to delete Rain Pioquinto from the article Article Name here. Continue?</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-white">Yes, Delete this user</button>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Go Back</button>
                  </div>
                </div>
              </div>
            </div>


						 							<li class="list-group-item">
						 								Rain Pioquinto
						 							</li>
						 							<li class="list-group-item">
						 								Rain Pioquinto
						 							</li>
						 						</ul>
						 					</div>
						 				</div>
						 			</div>
						 		</div>
						 		
						 		
						 	</div>
						 	
						 </div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<script>
	var issue_id = '';
	var article_id = '';
	var r = '';
	loadIssues();
	// loadUsers();
	function loadUsers(){
		$.ajax({
			url: "/api/user",
			success: function(result){
				console.log(result);
				r = jQuery.parseJSON(result);
				$.each(r,function(idx,value){
					switch(value.status){
						case 'O':value.status = "ONGOING";
						break;
						case 'H':value.status = "ON HOLD";
						break
						case 'D':value.status = "DISMISSED";
						break;
						default:break;
					}
					 $('#issueListTable > tbody:last-child').append('<tr><td>' +value.id + '</td><td>' +value.date_started + '</td><td>' +value.nickname +'</td><td>' +value.deadline + '</td><td>' +value.status + '</td><td><a href="#" class="link"><i class="fa fa-eye"></i> View</a></td></tr>');
					
				});
				
			}
		});
	}
	function loadIssues(){
	$("#issueCard").hide();

		$("#issueListTable > tbody").empty();
		$.ajax({
			url: "/api/issue",
			success: function(result){
				console.log(result);
				r = jQuery.parseJSON(result);
				$.each(r,function(idx,value){
					switch(value.status){
						case 'O':value.status = "ONGOING";
						break;
						case 'H':value.status = "ON HOLD";
						break
						case 'D':value.status = "DISMISSED";
						break;
						default:break;
					}
					 $('#issueListTable > tbody:last-child').append('<tr><td>' +value.id + '</td><td>' +value.date_started + '</td><td>' +value.nickname +'</td><td>' +value.deadline + '</td><td>' +value.status + '</td><td><a href="#" class="link" onclick="loadIssueArticle(' + value.id + ')"><i class="fa fa-eye"></i> View</a></td></tr>');
					 issue_id = value.id;
					
				});
				
			}
	});
			}
	function loadIssueArticle(e){
		$.ajax({
			url: "/api/issue/" + e,
			success: function(result){
				console.log(result);
				r = jQuery.parseJSON(result);
				$.each(r,function(idx,value){
					switch(value.status){
						case 'O':value.status = "ONGOING";
						break;
						case 'H':value.status = "ON HOLD";
						break
						case 'D':value.status = "DISMISSED";
						break;
						default:break;
					}
					var deadline = value.deadline.replace(" 00:00:00","").split("-");
					var date_started = value.date_started.replace(" 00:00:00","").split("-");
					console.log()

					$("#nickname").val(value.nickname);
					$("#status").val(value.status);
					$("#date_started").val(date_started[1] + '/' + date_started[2] + '/' + date_started[0]);
					$("#deadline").val(deadline[1] + '/' + deadline[2] + '/' + deadline[0]);
				});
				
			}
		});
		
		$("#issueCard").show("slow");
	}
	function loadArticle(e){
		$.ajax({
			url: "/api/issue-article/" + e,
			success: function(result){
				console.log(result);
				r = jQuery.parseJSON(result);
				$.each(r,function(idx,value){
					$("#articleList").append('<span class="list-group-item list-group-item-action" id="art_' + value.id + '" onclick="viewArticleUser(' + value.id + ')">' + value.name + '</span>');
				});
				
			}
		});
	}
</script>


