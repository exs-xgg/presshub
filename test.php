<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Presshub - Home</title>
  <!-- Favicon -->
  <link href="/img/brand/favicon1.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="/css/argon.css?v=1.0.0" rel="stylesheet">
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/popper/popper.min.js"></script>
  <script src="/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="/vendor/headroom/headroom.min.js"></script>
  
  <link type="text/css" href="/node_modules/toastr/build/toastr.min.css" rel="stylesheet">
  <script src="/node_modules/toastr/build/toastr.min.js"></script>
  <!-- Argon JS -->
  <script src="/js/argon.js?v=1.0.0"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light">
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
                <a class="navbar-brand mr-lg-5" href="/home">
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
              <a href="#" class="nav-link">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Members</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="/about" class="nav-link">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">About Us</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://www.facebook.com/CCSTheBrowser" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                <i class="fa fa-facebook-square"></i>
                <span class="nav-link-inner--text d-lg-none">Facebook</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="/ig" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                <i class="fa fa-instagram"></i>
                <span class="nav-link-inner--text d-lg-none">Instagram</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="/tw" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
                <i class="fa fa-twitter-square"></i>
                <span class="nav-link-inner--text d-lg-none">Twitter</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/login" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                  <i class="fa fa-key mr-2"></i>
                </span>
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="position-relative"  id="printme">
      <!-- shape Hero -->
      <section class="section-shaped my-0">
        <div class="shape shape-style-1 shape-default shape-skew">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container shape-container d-flex">
          <div class="col px-0">
            <div class="row">
              <div class="col-lg-7" >
                <h1 class="display-3  text-white">Presshub
                  <span>The Official Website Publication Portal for CCS - The Browser</span>
                </h1>
                
                <div class="btn-wrapper">
                  <a href="/members"  class="btn btn-info btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="fa fa-group"></i></span>
                    <span class="btn-inner--text">Members</span>
                  </a>
                  <a href="/about" class="btn btn-white btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="fa fa-question"></i></span>
                    <span class="btn-inner--text">About Us</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
  </main>
  <footer class="footer has-cards">
    <div class="container">
      <button onclick="print()">Print THis fucker</button>
      <a id="test"></a>
      <div id="box1"></div>
      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; 2018
            <a href="/" target="_blank">CCS Presshub</a>.
          </div>
        </div>
       
      </div>
    </div>
  </footer>
  <script type="text/javascript">
  	function print(){
  		 html2canvas(document.getElementById('printme'), {
		      onrendered: function(canvas) {
		      $('#box1').html("");
					$('#box1').append(canvas);
		      
		      if (navigator.userAgent.indexOf("MSIE ") > 0 || 
							navigator.userAgent.match(/Trident.*rv\:11\./)) 
					{
		      	var blob = canvas.msToBlob();
		        window.navigator.msSaveBlob(blob,'Test file.png');
		      }
		      else {
		        $('#test').attr('href', canvas.toDataURL("image/png"));
		        $('#test').attr('download','Test file.png');
		        $('#test')[0].click();
		      }
		      
		      
		      }
	    });
  	}
  </script>
</body>
<style type="text/css">
	#box1 {
  
  border-style: solid;
  border-width: 2px;
}
canvas {
    max-width: 100%;
    max-height: 100%;
}
</style>
</html>