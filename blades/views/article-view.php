<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <title>Article Name</title>

  <?php include 'dependencies.php'; ?>
 <?php 
(isset($uri[2]) && ($uri[2])!=="") ? $id = $uri[2] : header("location: /admin");
?>
<script>
  localStorage.setItem("art_id","<?php echo $id; ?>");
</script>
</head>
<body>
<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="/home">
          <h3 id="article_header">Article Name</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="/home">
                  <img src="/img/brand/blue.png">
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
          
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item d-none d-lg-block ml-lg-4">
              <a href="/login" class="btn btn-danger btn-icon">
                <span class="btn-inner--icon">
                  <i class="fa fa-sign-out mr-2"></i>
                </span>
                <span class="nav-link-inner--text">Logout</span>
              </a>  
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
  </header>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <nav class="alert alert-dark">Article Information</nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
          <label>Article Name</label>
          <input class="form-control form-control-alternative" type="text" id="article_name">
          <label>Article Title</label>
          <input class="form-control form-control-alternative" type="text" id="article_title">
          <label>Deadline</label>
          <div class="form-group focused">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
              </div>
              <input class="form-control datepicker" placeholder="Select date" type="text" name="article_name" <?php echo (!true) ? "disabled" : null; ?>>
            </div>
          </div>
          
        </div>
        <div class="col-md-6">
          <nav class="alert alert-dark">Actions</nav>
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <span class="col-md-12 btn btn-warning"><i class="fa fa-pencil"></i> Edit</span>
              </div>
              
              <div class="col-lg-6">
                <span class="col-md-12 btn btn-success"><i class="fa fa-save"></i> Save</span>
              </div>

            </div>  
            <br>
            <div class="row">
              <div class="col-lg-6">
                <span class="col-md-12 btn btn-primary"><i class="fa fa-check"></i> Finished</span>
              </div>
              
              <div class="col-lg-6">
                <span class="col-md-12 btn btn-danger"><i class="fa fa-trash"></i> Delete</span>
              </div>
              
            </div>  
          </div>
          
          
        </div>
        <div class="col-md-12">
           <nav class="alert alert-dark">Content <div class="pull-right">Select column Preview:&nbsp;&nbsp;<select id="numberOfColumns"><option id="2">2</option><option id="3">3</option><option id="4">4</option></select>&nbsp;&nbsp;<button class="btn btn-sm btn-primary" onclick="changeColumn()">Go</button></div></nav>
           <br>
           <p contenteditable="true" id="article_content" class="p2c"></p>
           <!-- <textarea class="form-control form-control-alternative"></textarea> -->
        </div>
    </div>
</div>

    

</body>
<script>
  getWholeArticle();
  function snapArticle(){
    var article_body = $("#article_body");
    
  }
  function getWholeArticle(){
    $.ajax({
      url: '/api/article/' + localStorage.getItem("art_id"),
      success: function(result){
        console.log(result);
        var article_result = jQuery.parseJSON(result);
        $.each(article_result, function(idx, value){
          $("#article_header").text(value.name);
          $("#article_name").val(value.name);
          $("#article_content").text(value.body);
        });
      }
    });
  }



  function changeColumn(){
    var numberOfColumns = $("#numberOfColumns").val();
    $("#article_content").removeClass();
    $("#article_content").addClass("p" + numberOfColumns + 'c');
  }
</script>
<style type="text/css">
  .p2c{
    text-align: justify;
    -webkit-column-gap: 20px;
       -moz-column-gap: 20px;
            column-gap: 20px;
    -webkit-column-count: 2;
       -moz-column-count: 2;
            column-count: 2;
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
.p4c{
    text-align: justify;
    -webkit-column-gap: 20px;
       -moz-column-gap: 20px;
            column-gap: 20px;
    -webkit-column-count: 4;
       -moz-column-count: 4;
            column-count: 4;
}
</style>
</html>