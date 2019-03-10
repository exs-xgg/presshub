
<?php
$result = DB::select("announcement",null," is_active='Y' order by date_created desc");

?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="max-height: 50vh;min-height: 50vh;">
  <div class="carousel-inner">
    <div class="carousel-item active">
       <div class="d-block w-100" >
        <div class="container">
          <div class="col-lg-12">
            
             <h1 align="center" class="jumbotron">2019 Announcements</h1>
            
          </div>
        </div>
      </div>
   </div>

<?php 
$result = json_decode($result);
foreach ($result as $key) {
  

echo '<div class="carousel-item">
      <div class="d-block w-100" >
        <div class="container">
          <div class="col-lg-12">
            <div class="jumbotron">
              <h3>';
                echo $key->{"title"}; 
                  
             echo   '</h3>
                
                              <p>';
               echo $key->{"body"};
         echo   '</p><small>';
          echo $key->{"date_created"};
         echo '</small>
                        </div>
                        
                      </div>
                    </div>
                  </div>
            </div>';

   
}

?>

    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<hr>
