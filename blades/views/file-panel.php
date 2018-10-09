<?php ?>
<div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
<div class="container">
	<div class="row">
	<div class="col-lg-4">
		<div class="card" data-toggle="modal" data-target="#md_1">
			<div class="card-header bg-primary text-white">
				<i class="fa fa-plus"></i><strong class=""> Upload a file</strong>
			</div>
		</div>
	</div>
	<div class="modal fade" id="md_1" tabindex="-1" role="dialog" aria-labelledby="modal-notification" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-info">
                  <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Upload a File</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form" method="post" action="/api/upload" enctype="multipart/form-data">
                    	<label>Choose File</label>
                    	<input class="form" type="file" name="fileToUpload" id="fileToUpload"><br>
                    	<label>Private?</label>
                    	<select name="private" class="form-control form-control-alternative" value="N">
                    		<option>N</option>
                    		<option>Y</option>
                    	</select>
                    	
                    
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-success" name="submit" value="Upload File">
                    </form>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Go Back</button>
                  </div>
                </div>
              </div>
            </div>

<?php
$result = DB::select("files",null," private='N' or (private='Y' and user_id=".$_SESSION['idx'].") ");
// echo "$result";
$result = json_decode($result);
if ($result==[]) {

	echo '<div class="col-lg-4">
	<div class="card bg-secondary">
		<div class="card-header">'; echo "No uploaded files yet.";
			echo '</small>
		</div>
	</div>
</div>';
	
}
foreach ($result as $key) {
 echo '<div class="col-lg-4">
	<div class="card bg-secondary" onclick="getFile(' . $key->{"id"} . ')">
		<div class="card-header">
			<i class="fa fa-file"></i><b>&nbsp;&nbsp;'; echo $key->{"file_name"}; 
			echo '</b>
		</div><div class="card-footer">'; echo $key->{"date_uploaded"}; 
			echo '</small>
		</div>
	</div>
</div>';


}
?>

	
	</div>
	
</div>             
</div>

<script type="text/javascript">
	function getFile(e){
		window.location.href = "/dashboard/file/" + e;
	}
</script>