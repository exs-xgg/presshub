<?php 

(isset($uri[3]) && ($uri[3])!=="") ? $id = $uri[3] : header("location: /admin");
?>
<script>
	localStorage.setItem("issue_id","<?php echo $id; ?>");
</script>

<div class="card bg-secondary">
	<div class="card-body">
		<div class="container">
		<h1>Issue Panel</h1>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="container" id="form">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<label>Issue Name*</label>
								 <input class="form-control form-control-alternative" type="text" id="issue_name">
							</div>
							<div class="col-lg-6 col-md-6">
								<small class="d-block text-uppercase font-weight-bold mb-3">Status</small>
			             <select class="form-control" id="status" required>
			             	<option value="O">ONGOING</option>
			             	<option value="H">ON HOLD</option>
			             	<option value="D">DISMISSED</option>
			             </select>
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
				                   <input class="form-control form-control datepicker" id="date_started" placeholder="Start date" type="text" required>
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
				                   <input class="form-control form-control datepicker" id="deadline" placeholder="Select date" type="text" required>
				                  </div>
				                </div>
				              </div>
				            </div>
						</div>
						<div class="container">
							<span class="btn btn-primary pull-right" onclick="saveIssue()">Save</span>
						</div>
					</div>
				</div>
			</div>
			
		</div>	
	</div>

</div>


<script type="text/javascript">
	loadIssue();
	function loadIssue(){
		// alert(localStorage.getItem("issue_id"));
		$.ajax({
			url: "/api/issue/" + localStorage.getItem("issue_id"),
			success: function(result){
				result = jQuery.parseJSON(result);
				$.each(result,function(idx,value){
					$("#issue_name").val(value.nickname);
					$("#date_started").val(value.date_started);
					$("#deadline").val(value.deadline);
				});
			}
		});
	}
	function saveIssue(){
var dataa = [{
				'nickname': "'" + $("#issue_name").val() + "'",
				'date_started': "'" + $("#date_started").val() + "'",
				'deadline': "'" + $("#deadline").val() + "'",
				'status': "'" + $("#status").val() + "'"
			}];
			dataa = JSON.stringify(dataa);
			// console.log(dataa);
			$.ajax({
				type: "put",
				data: dataa,
				url: "/api/issue/" + localStorage.getItem("issue_id"),
				success: function(result){
					toastr.success("Issue Succesfully Added!");
					console.log(dataa);
				}
			})
	}
	
</script>
