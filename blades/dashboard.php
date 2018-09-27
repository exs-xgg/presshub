<?php if (!isset($_SESSION['user'])) {
	header("location: /login");
  // echo $_SESSION['user'];
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
        <a class="navbar-brand mr-lg-5" href="/home">
          <h3>Presshub</h3>
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
          <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">My Profile</span>  (<small><?php
                  echo $_SESSION['user'];
                  ?></small>)
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="/about" class="nav-link">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">User Settings</span>
              </a>
            </li>
            <?php
if (!$_SESSION['is_admin']=="Y") {


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
          </ul>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item d-none d-lg-block ml-lg-4">
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
          <div class="card">
            <div class="card-header">
              Announcements
            </div>
            <div class="card-body">
              <?php include 'views/announcement-carousel.php'; ?>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
              <!-- Tabs with icons -->
              <div class="mb-3">
                <small class="text-uppercase font-weight-bold">My Dashboard</small>
              </div>
              <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active show" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Current Assignments</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Calendar</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Meetings</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Files</a>
                  </li>
                </ul>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                      <table class="table table-striped" id="assignedTable">
                        <thead>
                          <tr><th>Date Started</th><th>Issue</th><th>Article</th><th>Deadline</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                          <tr class="text-danger"><td>2018-06-09</td><td>CCS 2nd Sem Red if late</td><td>News</td><td>2018-07-31</td><td><a class="link" href="/view/asd"><i class="fa fa-eye"></i> <b> View</b></a></td></tr>
                          <tr><td>2018-06-09</td><td>CCS 2nd Sem</td><td>Editorial</td><td>2018-10-31</td><td><a class="link" href="/view/asd"><i class="fa fa-eye"></i> <b> View</b></a></td></tr>
                          <tr class="text-primary"><td>2018-06-09</td><td>CCS 2nd Sem Blue if less than a week assigned</td><td>Feature</td><td>2018-10-31</td><td><a class="link" href="/view/asd"><i class="fa fa-eye"></i> <b> View</b></a></td></tr>
                        </tbody>
                      </table>
                      <div class="small bg-secondary">
                        <small> • LEGEND •</small>
                        <ul>
                          <li>Default</li>
                          <li class="text-danger">Nearing Deadline / Overdue</li>
                          <li class="text-primary">Fresh; less than a week since assigned</li>
                        </ul>
                      </div>
                    </div>
                   <!--  <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                     <div class="alert alert-primary" onclick="$(this).hide(1000)"><span class="fa fa-circle mr-2"> </span> An article has been assigned to you.</div>
                     <div class="alert alert-primary" onclick="$(this).hide(1000)"><span class="fa fa-circle mr-2"> </span> An article has been assigned to you.</div>
                     <div class="alert alert-primary" onclick="$(this).hide(1000)"><span class="fa fa-circle mr-2"> </span> An article has been assigned to you.</div>
                    </div> -->
                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                     <?php include "views/create-issue.php"; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
        <div class="col-lg-4 col-md-4 col-xs-6">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>
  </main>
</body>
<script>
    $('#assignedTable').DataTable();

</script>
</html>
