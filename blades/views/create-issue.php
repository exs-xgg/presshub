
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					Create New Issue
				</div>
				<div class="card-body">
					 <small class="d-block text-uppercase font-weight-bold mb-3">Issue Name</small>
						<input class="form-control form-control-alternative" type="text" id="nickname" required="">
						
						<br>
			            
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

			            <br>
			             <small class="d-block text-uppercase font-weight-bold mb-3">Status</small>
			             <select class="form-control" id="status" required>
			             	<option value="O">ONGOING</option>
			             	<option value="H">ON HOLD</option>
			             	<option value="D">DISMISSED</option>
			             </select>
			             <br>
			             <span id="issueSubmitBtn" class="btn btn-primary" onclick="createIssueConfirm()">Create Issue</span>
					
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					Issues Registered
				</div>
				<div class="card-body">
					<table class="table" id="issuesTable">
						<thead>
							<tr><th>ID</th><th>Issue Name</th><th>Date Started</th><th>Status</th><th>Deadline</th></tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<script>
	getIssues();
	function getIssues(){
		$("#issuesTable > tbody").empty();
		$.ajax({
			url: "/api/issue",
			success: function(result){
				console.log(result);
				r = jQuery.parseJSON(result);
				$.each(r,function(idx,value){
					 $('#issuesTable > tbody:last-child').append('<tr onclick="navIssue(' + value.id + ')"><td><a href="/admin/issue/' + value.id + '">' + value.id + '</a></td><td id="t_' + value.id + '">' + value.nickname + '</td><td>' + value.date_started + '</td><td>'+value.status +'</td><td>' + value.deadline + '</td>></tr>');
					 
				});
				}
		           
		        
				
			});
	}
	function navIssue(e){
		window.location.href = "/admin/issue/" + e;
	}
	function createIssueConfirm(){
		var confirm_ = confirm("You are about to create a new issue, and this action can't be undone. Continue?");
		if (confirm_) {
			submitFormIssue();
		}
	}

	function submitFormIssue(){
		var date_started = $("#date_started").val().split("/");
		date_started = date_started[2] + "-" + date_started[0] + "-" + date_started[1];

		var deadline = $("#deadline").val().split("/");
		deadline = deadline[2] + "-" + deadline[0] + "-" + deadline[1];

		var dataa = [{
				'nickname': "'" + $("#nickname").val() + "'",
				'date_started': "date('" + date_started + "')",
				'deadline': "date('" + deadline + "')",
				'status': "'" + $("#status").val() + "'"
			}];
			dataa = JSON.stringify(dataa);
			// console.log(dataa);
			$.ajax({
				type: "post",
				data: dataa,
				url: "/api/issue",
				success: function(result){
					toastr.success("Issue Succesfully Added!");
					$("#issueSubmitBtn").disabled = true;
					getIssues();
				}
			})
	}


</script>
<style type="text/css">
	tr:hover{
		background-color: #ddd;
		cursor: pointer;
	}
</style>