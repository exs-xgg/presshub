<?php
if (isset($uri[3])) {
	$file_desc = json_decode(DB::select("files",null,"deleted=0 and id=".$uri[3]));
	foreach ($file_desc as $key) {
		$file_name = $key->{"file_name"};
		$file_author = $key->{"user_id"};
		$date_uploaded = $key->{"date_uploaded"};
	}
	?>
<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto" id="fileCard">
			<div class="card bg-info">
				<div class="card-header">
					<span class="pull-right" onclick="$('#fileCard').hide(750);" style="cursor: pointer">x</span>
					<label>File Name: </label> <span class="text-uppercase font-weight-bold"><?php echo $file_name; ?></span><br>
					<label>Date Uploaded: </label> <small class="small"><?php echo $date_uploaded; ?></small><br>
					<label>Uploaded by:</label> <small class="small"><?php
$person = json_decode(DB::select("users",null,"id=".$file_author));
foreach ($person as $key) {
	echo $key->{"first_name"} . ' ' . $key->{"last_name"};
}
					?></small><hr>
					<a class="btn btn-primary" href="/uploads/<?php echo $file_name; ?>" target="_blank">Download</a>
					<a class="btn btn-danger pull-right" href="delete">Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>


	<?php
}
?>

<div class="container">
	<div class="row">
		<div class="col-4 align-self-center p-3">
			<a href="/dashboard/file" class="text-white">
				<div class="card-header bg-gradient-warning col-6 mx-auto" align="center">
					<i class="fa fa-chevron-left"></i><strong class=""> Back</strong>
				</div>
			</a>
		</div>
	<div class="col-4 align-self-center p-3">
		<div class="btn" data-toggle="modal" data-target="#md_1">
			<div class="card-header bg-primary text-white col-12 mx-auto">
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
                    	<label>Description</label><textarea name="desc" class="form-control"></textarea>
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
$result = DB::select("files",null," deleted=0 and (private='N' or (private='Y' and user_id=".$_SESSION['idx'].")) ");
// echo "$result";
$result = json_decode($result);
if ($result==[]) {

	echo '<div class="col-4 align-self-center">
	<div class="card bg-secondary">
		<div class="card-header">'; echo "No uploaded files yet.";
			echo '</small>
		</div>
	</div>
</div>';
	
}
foreach ($result as $key) {
 echo '<div class="col-4 align-self-center p-3"><div class="container">
	<div class="card bg-secondary" onclick="getFile(' . $key->{"id"} . ')" style="cursor:pointer">
		<div class="card-header">
			<i class="fa fa-file"></i><b>&nbsp;&nbsp;'; echo $key->{"file_name"}; 
			echo '</b>
		</div><div class="card-footer">'; echo $key->{"date_uploaded"}; 
			echo '</small>
		</div>
	</div></div>
</div><br>';


}
?>

	
	</div>
	
</div>             


<script type="text/javascript">
	function getFile(e){
		window.location.href = "/dashboard/myfile/" + e;
	}
	<?php
if (isset($_REQUEST['success'])) {
	if ($_REQUEST['success']=='y') {
		?>
toastr.success("File Uploaded Successfully!");
	<?php
	}else{
		?>
toastr.error("File Upload Failed!");
	<?php
	}
	
}

	?>
</script>