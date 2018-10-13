<?php if (!isset($_SESSION['user'])) {
  header("location: /login");
  echo $_SESSION['idx'];
} 

$art_id = $uri[2];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Article Name</title>
 <link href="/img/brand/favicon1.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <link href="/node_modules/datatables/media/css/jquery.datatables.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="/css/argon.css?v=1.0.0" rel="stylesheet">
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/popper/popper.min.js"></script>
  <script src="/vendor/headroom/headroom.min.js"></script>
<script src="/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <link type="text/css" href="/node_modules/toastr/build/toastr.min.css" rel="stylesheet">
  <script src="/node_modules/toastr/build/toastr.min.js"></script>
  <script src="/node_modules/datatables/media/js/jquery.datatables.min.js"></script>
  <script src="/vendor/bootstrap/bootstrap.min.js"></script>
  <!-- Argon JS -->
  <script src="/js/argon.js?v=1.0.0"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https:///cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<body>
	<div class="">
		<h3>COPYREADING - <span id="article_title">title</span></h3>
		<div class="row">
			<span class="col-12 btn btn-primary" onclick="copyread()" id="startBtn">START COPYREADING</span>
			<div class="col-12 mx-auto">

				<div id="box0">
					
				</div>
			</div>
		</div>
		<hr>
		<div class="col-12" id="penPanel">
                  <div class="row">
                    <div class="col-1 text-dark">Pick Pen color</div>
                      <div class="col-1" style="height:50px;background:red;" id="red" onclick="color(this)"></div>
                      <div class="col-1" style="height:50px;background:black;" id="black" onclick="color(this)"></div>
                  </div>
                  <div class="row">
                  	<div class="col-6 mx-auto pull-right">
                  		<button class="btn btn-success" onclick="save()">SAVE</button>
						<a href="/article/<?php echo $art_id; ?>" class="btn btn-warning">BACK</a>
                  	</div>
                  	
                  </div>
                </div><br>
		<div id="box1"></div>
	
	</div>



</body>
<script type="text/javascript">
	loadArt();
	$("#penPanel").hide();
	 function copyread(){
       html2canvas(document.getElementById('box0'), {
          onrendered: function(canvas) {
          $('#box1').html("");
          $('#box1').append(canvas);
     		$("#box0").hide(500);
$("#penPanel").show(750);
     		init();
     		$("#startBtn").hide(750);
          }
      });
    }

var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;

    var x = "black",
        y = 2;
   
    function init() {
    	htm = document;
        canvas = document.getElementById('box1');
        ctx = canvas.getElementsByTagName('canvas')[0].getContext("2d");
        w = canvas.width;
        h = canvas.height;
    
        canvas.addEventListener("mousemove", function (e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function (e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function (e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function (e) {
            findxy('out', e)
        }, false);
    }
    
    function color(obj) {
        switch (obj.id) {
           
            case "red":
                x = "red";
                break;
           
            case "black":
                x = "black";
                break;
   
        }
        if (x == "white") y = 14;
        else y = 2;
    
    }
    
    function draw() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = y;
        ctx.stroke();
        ctx.closePath();
    }
    
    function erase() {
        var m = confirm("Want to clear");
        if (m) {
            ctx.clearRect(0, 0, w, h);
            document.getElementById("canvasimg").style.display = "none";
        }
    }
    
    function save() {
        document.getElementById("canvasimg").style.border = "2px solid";
        var dataURL = canvas.toDataURL();
        document.getElementById("canvasimg").src = dataURL;
        document.getElementById("canvasimg").style.display = "inline";
    }
    
    function findxy(res, e) {
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - canvas.offsetLeft;
            currY = e.clientY - canvas.offsetTop;
    
            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - canvas.offsetLeft;
                currY = e.clientY - canvas.offsetTop;
                draw();
            }
        }
    }





	function loadArt(argument) {
		$.ajax({
			url: '/api/article/' + <?php echo $art_id; ?>,
			success: function(result){
				result = jQuery.parseJSON(result);
				$.each(result,function(idx,value){
					$("#article_title").text(value.name);
					$("#box0").html('<div class="col-12">'+atob(value.body)+'</div>')
				});
				$('.ql-clipboard').remove();
  					$('.ql-tooltip').remove();
				
			}
		});


	}
	function save(){
		var dataURL = canvas.getElementsByTagName('canvas')[0].toDataURL('image/png', 1);
		dataa = [{
			"copyread" : "'" + dataURL + "'"
		}];
		dataa = JSON.stringify(dataa);
		$.ajax({
			url: '/api/article/cp/' + <?php echo $art_id; ?>,
			type: 'put',
			data: dataa,
			success: function(result){
				toastr.success("Copyread Saved!");
			}
		});
	}

</script>
<style type="text/css">

#box0{
	 text-align: justify;
}
	#box1 {
  max-width: 100%;
  border-style: solid;
  border-width: 2px;
}
canvas {
    max-width: 100%;
    max-height: 100%;
}
</style>