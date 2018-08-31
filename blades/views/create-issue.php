<div class="container">
	<div class="row">
		<div class="col-lg-12">
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
	</div>
</div>
<script>
	function createIssueConfirm(){
		var confirm_ = confirm("You are about to create a new issue, and this action can't be undone. Continue?");
		if (confirm_) {
			submitFormIssue();
		}
	}

	function submitFormIssue(){
			var dataa = [{
				'nickname': "'" + $("#nickname").val() + "'",
				'date_started': "'" + $("#date_started").val() + "'",
				'deadline': "'" + $("#deadline").val() + "'",
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
				}
			})
	}
</script>