<?php if (!isset($_SESSION['user'])) {
	header("location: /login");
  echo $_SESSION['idx'];
} 

$count_assigned = 0;
$re = json_decode(DB::raw("select count(*) as ct from user_article inner join article on article.id=user_article.article where is_done='N' and user=" . $_SESSION['idx'] ));
foreach ($re as $key) {
  $count_assigned = $key->{"ct"};
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
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg text-white">
      <div class="container">
        <img src="/img/brand/favicon1.png" width="50"> &nbsp;
        <a class="navbar-brand mr-lg-5" href="/home">
          <h3 class="text-white">PRESSHUB</h3>
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
                <button type="button" class="navbar-toggler fa fa-circle" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""></span>
                  
                </button>
              </div>
            </div>
          </div>
 <ul class="navbar-nav navbar-nav-hover align-items-lg-center text-white">
            <li class="nav-item dropdown">
              <span class="">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text"><small><?php
                  echo $_SESSION['user'];
                  ?>&nbsp;&nbsp;(<?php echo $_SESSION['designation'] ?>)</small></span>  
              </span>
            </li>
 <li class="nav-item dropdown">
              <a href="/dashboard/settings" class="nav-link text-white">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="">User Settings</span>
              </a>
            </li>
         
            
                       <?php 
 $des = $_SESSION['designation'];
  $des = split(" ", $des);
  $des0 = $des[0];
  $des2 = $des[2];
  $des1 = $des[1];
if ($des2=="EDITOR" || $des1=="EDITOR" || $des0=="EDITOR" || $_SESSION['is_admin']=="Y"): ?>


<li class="nav-item dropdown">
              <a href="/admin" class="nav-link text-white">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="">Admin</span>
              </a>
            </li>

  <?php endif ?>

           
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
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Current Assignments (<?php echo $count_assigned ?>)</a>
                  </li>
                  <?php  $des = $_SESSION['designation'];
  $des = split(" ", $des);
  $des0 = $des[0];
  $des1 = $des[1];
if ($des2=="EDITOR" || $des1=="EDITOR" || $des0=="EDITOR"): ?>
                    <li class="nav-item"  onclick="go('admin-notif')">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Editor Notifications</a>
                  </li>
                  <?php endif ?>
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
  case 'file':
   echo '<li class="breadcrumb-item active text-uppercase" aria-current="page">files</li>';
   break;
  case 'proj-file':
    echo '<li class="breadcrumb-item active text-uppercase" aria-current="page"><a href="/dashboard/proj-file">project files</a></li>';
    break;
  case 'archive':
    echo '<li class="breadcrumb-item active text-uppercase" aria-current="page"><a href="/dashboard/archive">archived projects</a></li>';
    break;

    if (isset($uri[3])) {
    echo '<li class="breadcrumb-item active text-uppercase" aria-current="page">'. $uri[3].'</li>';
   }
    break;
  default:
    # code...
    break;
}//end switch
    }//end if isset uri2
    
    ?>
    
  </ol>
                
              </div>
              

        </div></section>
        <div class="col-lg-12">
             <div class="container">
               <?php 
if (!isset($uri[2]) || $uri[2]=="") {
 ?>
<div class="container">
  <h4>Notifications</h4>
  <br>
  <div class="row">


 <?php 
$notif = json_decode(DB::raw("select concat(concat(name , '_'), article.id) as name from article left join user_article on user_article.article=article.id where (is_final='Y') and user_article.user = ".$_SESSION['idx'] ));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert bg-gradient-info">Finalized - <?php 
        $keymaster = explode("_",$key3);
        echo "<a class='text-white' href='/article/" . $keymaster[1] . "'>" . $keymaster[0] . '</a>'; ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>
 <?php 

 $notif = json_decode(DB::raw("select concat(concat(name , '_'), article.id) as name from article inner join issue on issue.id=article.issue_id where r_location='" . $_SESSION['designation'] . "'"));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert bg-gradient-purple">FORWARDED -  <?php 
        $keymaster = explode("_",$key3);
        echo "<a class='text-white' href='/article/" . $keymaster[1] . "'>" . $keymaster[0] . '</a>'; ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>  <?php 

$notif = json_decode(DB::raw("select nickname from issue where id not in (select distinct(issue_id) from article) and date(date_created) > DATE_SUB(NOW(), INTERVAL 5 DAY) and is_archived='N'"));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert alert-success">New Issue - <?php echo $key3 ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>

 <?php 
$notif = json_decode(DB::raw("select concat(concat(name , '_'), article.id) as name from article left join user_article on user_article.article=article.id where (is_done='N' and body is null) and user_article.user = ".$_SESSION['idx'] ));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert alert-info">New Article Available - <?php 
        $keymaster = explode("_",$key3);
        echo "<a class='text-white' href='/article/" . $keymaster[1] . "'>" . $keymaster[0] . '</a>'; ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>

    <!-- <?php 
$notif = json_decode(DB::raw("select concat(concat(name , '_'), article.id) as name from article left join user_article on user_article.article=article.id where (is_done='N' and copyread is not null) and user_article.user = ".$_SESSION['idx'] ));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert alert-warning">Revision Available - <?php 
        $keymaster = explode("_",$key3);
        echo "<a class='text-white' href='/article/" . $keymaster[1] . "'>" . $keymaster[0] . '</a>'; ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?> -->
    
  </div>
</div>
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
  case 'archive':
    require 'archive-files.php';
    break;
  case 'proj-file':
    require 'proj-files.php';
    break;
  case 'settings':
    require 'user-settings.php';
    break;
  case 'admin-notif':
    require 'admin-notif.php';
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

  <?php
  include 'footer.php';
  ?>
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
          var today = new Date(); 
  var targetDate= new Date();
  targetDate.setDate(today.getDate() + 7);



  var deadline = new Date();
  deds=(values.deadline).split("-");
  deadline.setDate(deds[2]);
  deadline.setMonth(deds[1]);
  deadline.setYear(deds[0]);

color = '';

if (Date.parse(targetDate) >= Date.parse(deds)) {
    color = "bg-danger text-white" ;
  }
          $("#assignedTable").append('<tr class="text-primary '+color+'"><td>'+ values.date_created +'</td><td>'+ values.article_name +'</td><td>'+ values.issue +'</td><td>'+ values.deadline +'</td><td><a class="link" href="/article/'+ values.id +'"><i class="fa fa-eye"></i> <b> View</b></a></td></tr>');
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
localStorage.removeItem("user_id");

      localStorage.removeItem("ann_id");
</script>
</html>
<style type="text/css">
   
</style>
