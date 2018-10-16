<?php if (!isset($_SESSION['user']) && $_SESSION['is_admin']!=='Y') {
  header("location: /login");
  echo $_SESSION['idx'];
} 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin - Presshub</title>

  <?php include 'dependencies.php'; ?>

</head>
<body>
<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="/dashboard">
          <h3>Presshub Admin Panel</h3>
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

<body>


  <?php 

$page = $uri[2];
switch ($page) {
  case 'issue':
    require 'views/admin/view-issue.php';
  // echo "aaaa";
    break;
  case 'logs':
    require 'views/logs.php';
    break ;
  default:
    require 'main-admin.php';
    break;
}

  ?>
    
    
</section>
</body>

  <?php
  include 'footer.php';
  ?>
</html>
<style type="text/css">
  
</style>