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
          <h3 id="article_name">Article Name</h3>
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
          <input class="form-control form-control-alternative" type="text" name="article_name">
          <label>Article Title</label>
          <input class="form-control form-control-alternative" type="text" name="article_name">
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
           <nav class="alert alert-dark">Content</nav>
           <br>
           <p contenteditable="true" id="article_content" class="twoColumns">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
           <!-- <textarea class="form-control form-control-alternative"></textarea> -->
        </div>
    </div>

</div>

    

</body>
<style type="text/css">
  .twoColumns{
    text-align: justify;
    -webkit-column-gap: 20px;
       -moz-column-gap: 20px;
            column-gap: 20px;
    -webkit-column-count: 3;
       -moz-column-count: 3;
            column-count: 3;
}
</style>
</html>