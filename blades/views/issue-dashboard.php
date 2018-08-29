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
						 		<div class="col-lg-6 ">
					                <label>Article Name</label>
							 		<input class="form-control" type="text" id="name">
						            
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

	$("#issueCard").show(500);

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
					 $('#issueListTable > tbody:last-child').append('<tr><td>' +value.id + '</td><td>' +value.date_started + '</td><td>' +value.nickname +'</td><td>' +value.deadline + '</td><td>' +value.status + '</td><td><a href="#" class="link"><i class="fa fa-eye"></i> View</a></td></tr>');
					
				});
				
			}
	});
			}
	function loadIssue(){

	}
</script>