<?php if (!isset($_SESSION['user'])) {
	header("location: /login");
  echo $_SESSION['idx'];
} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Dashboard - Presshub</title>
  <?php include 'dependencies.php'; ?>

</head>
<body>
<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="/dashboard">
          <h3>Presshub</h3>
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
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">(<small><?php
                  echo $_SESSION['user'];
                  ?></small>)</span>  
              </span>
            </li>

         
            <li class="nav-item dropdown">
              <a href="/dashboard/settings" class="nav-link">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">User Settings</span>
              </a>
            </li>
            <?php
if ($_SESSION['is_admin']=="Y") {


  ?>
<li class="nav-item dropdown">
              <a href="/admin" class="nav-link">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">Admin</span>
              </a>
            </li>

  <?php
}


            ?>
            <li class="nav-item pull-right">
              <a href="/login" class="btn btn-warning btn-icon">
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
  <main>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="mb-3">
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                  <li class="nav-item"  onclick="go('assignment')">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Current Assignments</a>
                  </li>
                   <li class="nav-item"  onclick="go('file')">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Files</a>
                  </li>
                </ul>
              </div>
            <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-uppercase font-weight-bold" href="/dashboard">My Dashboard</a></li>
    
    <?php 
    if ((isset($uri[2]))) {
     switch ($uri[2]) {
  case 'assignment':
    echo '<li class="breadcrumb-item active text-uppercase" aria-current="page">assignments</li>';
    break;
  case 'meeting':
    echo '<li class="breadcrumb-item active text-uppercase" aria-current="page">meetings</li>';
    break;
  case 'events':
    echo '<li class="breadcrumb-item active text-uppercase" aria-current="page">events</li>';
    break;
  case 'file':
   echo '<li class="breadcrumb-item active text-uppercase" aria-current="page">files</li>';
  case 'proj-file':
    echo '<li class="breadcrumb-item active text-uppercase" aria-current="page"><a href="/dashboard/proj-file">project files</a></li>';
    if (isset($uri[3])) {
    echo '<li class="breadcrumb-item active text-uppercase" aria-current="page">'. $uri[3].'</li>';
   }
    break;
    break;
  default:
    # code...
    break;
}//end switch
    }//end if isset uri2
    
    ?>
    
  </ol>
                
              </div>
              

        </div>
        <div class="col-lg-12">
             <div class="container">
               <?php 
if (!isset($uri[2]) || $uri[2]=="") {
 ?>

          <div class="card">
            <div class="card-header">
              Announcements
            </div>
            <div class="card-body">
              <?php include 'views/announcement-carousel.php'; ?>
              
            </div>
          </div>

 <?php
}else{

switch ($uri[2]) {
  case 'assignment':
    require 'assignments.php';
    break;
  case 'meeting':
    require 'view-meeting.php';
    break;
  case 'events':
    require 'events.php';
    break;
  case 'file':
   require 'file-cat.php';
    break;
  case 'myfile':
   require 'file-panel.php';
    break;
  case 'proj-file':
    require 'proj-files.php';
    break;
  case 'settings':
    require 'user-settings.php';
    break;
  default:
    # code...
    break;
}//end switch
}//end isset uri2
?>
             </div>
              
            
            </div>
            
      </div>
    </div>
  </main>
</body>
<script>
  function fetchMyArticles(){
    $.ajax({
      url: '/api/assignment/' + <?php echo $_SESSION['idx']; ?>,
      success: function(result){
        // console.log(result);
        assign_result = jQuery.parseJSON(result);
        $("#assignedTable").empty();
        $("#assignedTable").append('<thead><tr><th>Date Started</th><th>Issue</th><th>Article</th><th>Deadline</th><th>Action</th></tr></thead><tbody>');
        $.each(assign_result,function(idx,values){
          // var id_art = values.article;
          $("#assignedTable").append('<tr class="text-danger"><td>'+ values.date_created +'</td><td>'+ values.article_name +'</td><td>'+ values.issue +'</td><td>'+ values.deadline +'</td><td><a class="link" href="/article/'+ values.id +'"><i class="fa fa-eye"></i> <b> View</b></a></td></tr>');
        });
        $("#assignedTable").append('</tbody>');
    $('#assignedTable').DataTable();
      }
    });
  }
  fetchMyArticles();
function go(e){
  window.location.href = "/dashboard/" + e;
}
</script>
</html>
