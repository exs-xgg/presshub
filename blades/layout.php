<?php if (!isset($_SESSION['user'])) {
	header("location: /login");
  echo $_SESSION['idx'];
} 
if (!($_SESSION['is_admin']=='Y' || $_SESSION['designation']=="EDITOR IN CHIEF")) {
	header("location: /dashboard");
}

$count_art = 0;
$rex = json_decode(DB::raw("select count(*) as ct from layout where issue_id=".$uri[2]));
foreach ($rex as $key) {
  $count_art = $key->{'ct'};
}
if ($count_art == 0) {
  DB::raw("insert into layout (issue_id,date_added) values(".$uri[2].",now())");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Layout Editing - Presshub</title>
  

<link type="text/css" href="/css/argon.css?v=1.0.0" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/bootstrap.min.js"></script>

  <link type="text/css" href="/node_modules/toastr/build/toastr.min.css" rel="stylesheet">
  <script src="/node_modules/toastr/build/toastr.min.js"></script>
  <!-- Argon JS -->
  <script src="/js/argon.js?v=1.0.0"></script>
<?php include 'loader.php'; ?>

</head>
<body>
<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg">
      <div class="container">
        <img src="/img/brand/favicon1.png" width="50"> &nbsp;
          <a class="navbar-brand mr-lg-5" href="/dashboard">
            <h3 class="">PRESSHUB</h3>
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                 <a class="navbar-brand mr-lg-5" href="/dashboard">
          <h3>Presshub</h3>
        </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
		 <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item dropdown">
              <span class="">
                LAYOUT PAGE
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <hr>

  <hr>
  <div class="container">
  	<div class="row">
  		<div class="col-12 align-content-center">
        <input type="file" id="headerpic" onchange="previewFile()" name="headerpic"><button class="btn btn-sm btn-success" onclick="upload()">Upload</button><br>
        <img src="https://i.ibb.co/0mbJHgV/image.png" width="870"><br>
<img src="" id="headerpic_container" width="870" alt="Image preview...">
<script>
  function upload(){
    $.ajax({
    url: '/api/rcvheader',
    type: "POST",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (result) {
         toastr.success("Header image uploaded");
    }
});
  }
   function previewFile(){
       var preview = document.getElementById('headerpic_container'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }
  
  $('#headerpic').change(function(){    
    //on change event  
    formdata = new FormData();
    if($(this).prop('files').length > 0)
    {
        file =$(this).prop('files')[0];
        formdata.append("headerpic", file);
        formdata.append("id",localStorage.getItem("layout_id"));
    }
});

  previewFile();  //calls the function named previewFile()
  </script>
  			<table class="table" id="layoutMaster">
           				
  			</table>
  			<div class="col-6 mx-auto">
  				
					<br><br>
          <div class="row">
            <button  class="col-3 btn btn-primary" data-toggle="modal" data-target="#md_1" title="Add Articles">
            <strong class="fa fa-plus"></strong>
          </button>
          <button class="col-3 btn btn-success" onclick="saveLayout()" title="Save">
            <strong class="fa fa-save"></strong>
          </button>
           <!-- <button class="col-3 btn btn-warning" onclick="printMe()" title="Print Preview">
            <strong class="fa fa-print"></strong>
          </button> -->
          </div>
					
					
				
				<div class="modal fade" id="md_1" tabindex="-1" role="dialog" aria-labelledby="modal-notification" style="display: none;" aria-hidden="true">
			              <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
			                <div class="modal-content bg-gradient-info">
			                  <div class="modal-header">
			                    <h6 class="modal-title" id="modal-title-notification">Add Section</h6>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">×</span>
			                    </button>
			                  </div>
			                  <div class="modal-body">
			                    <label>Number of columns</label>
			                    <select class="form-control" id="numberOfColumns">
			                    	<option>1</option>
			                    	<option>2</option>
			                    	<option>3</option>
			                    </select>
			                    <label>Article</label>
			                    <select class="form-control" id="articleToPlace" list="articlelist">
			                    	
										 
									
			                    </select>
			                    
			                  </div>
			                  <div class="modal-footer"> 
			                  	<button class="btn btn-primary" data-dismiss="modal" onclick="generateColumn()">add section</button>
			                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Go Back</button>
			                  </div>
			                </div>
			              </div>
			            </div>
  			</div>
  		</div>

  	</div>
  </div>
  </body>

  <script type="">
    var all_articles = [];
<?php if (isset($uri[2])): ?>
    localStorage.setItem("layout_id",<?php echo $uri[2];?>)
  <?php endif ?>
    
init();
function printMe(){
  window.location.href = "/api/pdf/" + localStorage.getItem("layout_id");
}
function init(){
  $.ajax({
    url: '/api/layout/'+localStorage.getItem("layout_id"),
    success: function(result){
      result = jQuery.parseJSON(result);
      if (result==[]) {return 0;}
      $.each(result,function(idx,value){
        // $("#layoutMaster").append(atob(value.body));
        console.log(value.body);
        $("#headerpic_container").attr("src",value.img_url);
        all_articles = value.body.split(",");
        console.log(all_articles);
        var rowInit = 1;
        $.each(all_articles, function(idz, art_value){
            var generatedId = "sec_" + rowInit;
            var art_id = art_value;
            if (art_id!=="") {
              console.log(art_id);
              $.ajax({
                url: '/api/article/' + art_id,
                success: function(result){
                  console.log(result);
                  result = jQuery.parseJSON(result);
                  $.each(result,function(idx,value){

                  var numberOfColumns = value.cols;

                  $("#layoutMaster").append('<tr class="secb" id="secc_'+rowInit + '"><td><div class="row"><div class="col-12 p' + numberOfColumns + 'c" id="sec_'+rowInit + '"></div></div></td><td class="btnn"><button class="btn bg-gray" onclick="rm('+rowInit + ",'" + art_id + "'" + ')">Delete</button></td></tr>');



                   $('#sec_'+rowInit).html(atob(value.body));
                    $('.ql-clipboard').remove();
                    $('.ql-tooltip').remove();

                rowInit +=1;
                  })
                }
              });
            }
            
            
        });
      });
    }
  })
}
  	loadArticles();
  	function loadArticles() {
  		var issue_id = localStorage.getItem("issue_id");
  		$.ajax({
  			url: '/api/article/' + issue_id,
  			type: 'post',
  			success: function(result){
  				// console.log(result);
  				result = jQuery.parseJSON(result);
  				$.each(result,function(idx,value){
  					$("#articleToPlace").append('<option id="cx_'+value.id+'" value="'+value.id+'">'+value.name+'</option>');
  				});
  			}
  		});
  	}
    function rm(e,id){
      $('#secc_'+e).remove(); 
      for( var i =0; i < all_articles.length; i++){
        if ( all_articles[i] == id) all_articles.splice(i, 1);
      }
      console.log(all_articles);
    }
  	function generateColumn(){
  		var rowInit = $('#layoutMaster tr').length + 1;
  		var generatedId = "sec_" + rowInit;
  		var art_id = $("#articleToPlace").val();
  		var numberOfColumns = $("#numberOfColumns").val();
  		// 
  		$("#layoutMaster").append('<tr class="secb" id="secc_'+rowInit + '"><td><div class="row"><div class="col-12 p' + numberOfColumns + 'c" id="sec_'+rowInit + '"></div></div></td><td class="btnn"><button class="btn btn-danger" onclick="rm('+rowInit + ')">Delete</button></td></tr>');
  		$.ajax({
  			url: '/api/article/' + art_id,
  			success: function(result){
  				result = jQuery.parseJSON(result);
  				$.each(result,function(idx,value){
  					$('#sec_'+rowInit).html(atob(value.body));
  					$('.ql-clipboard').remove();
  					$('.ql-tooltip').remove();
  				});
          var dtt = JSON.stringify([{
              'cols' : numberOfColumns
            }]);
          $.ajax({
            url:'/api/article/' + art_id,
            type: 'put',
            data : dtt,
            success: function(result) {
              toastr.success("Article Temporarily Added to Layout");
              all_articles.push(art_id);
            }
          });
  			}
  		});
  	}
    function saveLayout(){
      var dataa = [{
        "body" : "'" + all_articles.join(",") + "'"
      }];
      dataa = JSON.stringify(dataa);
      $.ajax({
        url: '/api/layout/' + localStorage.getItem("layout_id"),
        type: 'put',
        data: dataa,
        success: function(result){
          alert("Layout Saved Successfully");
        }
      })
    }
  </script>
  <style type="text/css">
  @media print  
{
    div{
    }
}
  .table{

      border: 13px !important;
      border-color: gray;
  }
  
  	.p2c{
    text-align: justify;
    -webkit-column-gap: 30px;
       -moz-column-gap: 30px;
            column-gap: 30px;
    -webkit-column-count: 2;
       -moz-column-count: 2;
            column-count: 2;
}
.p1c{
    text-align: justify;
    -webkit-column-gap: 20px;
       -moz-column-gap: 20px;
            column-gap: 20px;
    -webkit-column-count: 1;
       -moz-column-count: 1;
            column-count: 1;
}
.p3c{
    text-align: justify;
    -webkit-column-gap: 20px;
       -moz-column-gap: 20px;
            column-gap: 20px;
    -webkit-column-count: 3;
       -moz-column-count: 3;
            column-count: 3;
}




  </style>

  <?php
  include 'footer.php';
  ?>