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
							 <span class="btn btn-primary pull-right" onclick="saveIssue()">Save</span> <a href="/admin" class="btn btn-warning" >Go Back</a>
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
							<div class="col-lg-8">
								<input class="form-control form-control-alternative" type="text" id="article_name">
							</div>
							<div class="col-lg-4">
								<button class="btn btn-primary">Add</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<section>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</section>
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
		var date_started = $("#date_started").val().split("/");
		date_started = date_started[2] + "-" + date_started[0] + "-" + date_started[1];

		var deadline = $("#deadline").val().split("/");
		deadline = deadline[2] + "-" + deadline[0] + "-" + deadline[1];

var dataa = [{
				'nickname': "'" + $("#issue_name").val() + "'",
				'date_started': "date('" + date_started + "')",
				'deadline': "date('" + deadline + "')",
				'status': "'" + $("#status").val() + "'"
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
