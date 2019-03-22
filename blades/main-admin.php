<div class="contaier">
        <div class="nav-wrapper">
          <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
            <?php if ($_SESSION['designation']=="ADVISER"): ?>
              
           
            <li class="nav-item">
              <a class="nav-link mb-sm-3 mb-md-0 active show" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fa fa-user mr-2"></i>User Accounts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="true"><i class="fa fa-book mr-2"></i>Roles</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link mb-sm-3 mb-md-0"  href="/admin/logs" ><i class="fa fa-align-right mr-2"></i>Logs</a>
            </li>

            <?php endif ?> 
<?php if ($_SESSION['designation']=="EDITOR IN CHIEF" || $_SESSION['designation']=="ASSOCIATE EDITOR"): ?>



            <li class="nav-item">
              <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fa fa-newspaper-o mr-2"></i>Create Issue</a>
            </li>




 <?php endif ?>
            <?php 
 $des = $_SESSION['designation'];
  $des = split(" ", $des);
  $des0 = $des[0];
  $des1 = $des[1];
  $des2 = $des[2];
if ($des2=="EDITOR" || $des1=="EDITOR" || $des0=="EDITOR"): ?>


            <li class="nav-item">
              <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fa fa-users mr-2"></i>Create Announcement</a>
            </li>

            
          <?php endif ?>



          </ul>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="tab-content" id="myTabContent">
               <?php if ($_SESSION['designation']=="ADVISER"): ?>
              <div class="tab-pane fade active show" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <?php include 'views/create-user.php';?>
              </div>
              <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                <?php include 'views/edit-role.php';?>
              </div>

            <?php endif ?>

            <?php if ($_SESSION['designation']=="EDITOR IN CHIEF" || $_SESSION['designation']=="ASSOCIATE EDITOR"): ?>
              <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
               <?php include "views/create-issue.php"; ?>
              </div>

            <?php endif ?>


              <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
              <?php include 'views/carousel-panel.php';?>
              </div>
            </div>
          </div>
        </div>
     
    </div>