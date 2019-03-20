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
  <!-- <script src="/js/argon.js?v=1.0.0"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https:///cdn.quilljs.com/1.3.6/quill.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.22/fabric.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<body>
	<div class="">
		<h3>COPYREADING - <span id="article_title">title</span></h3>
		<div class="row">
			<span class="col-12 btn btn-primary" onclick="copyread()" id="startBtn">START COPYREADING</span>
			<div class="col-lg-8 col-md-10 col-xs-12 mx-auto">

				<div id="box0">
					
				</div>
			</div>
		</div>
        <hr>
		<div class="col-lg-8 col-md-10 col-xs-12 mx-auto"  id="penPanel"><div class="col-10 text-dark">Click to add a symbol to the copyreading canvas</div>
                  <div class="row">
                    
                    <div id="images" class="furniture">
            <img class="c_img" draggable="true" src="/img/cp_symbols/transpose.png" width="250" height="250" onclick="addToCanvas('/img/cp_symbols/transpose.png')"></img>
            <img class="c_img" draggable="true" src="/img/cp_symbols/Omit.gif" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/Omit.gif')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/italics.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/italics.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/hashtag.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/hashtag.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/closeup.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/closeup.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/bf.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/bf.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/cap.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/cap.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/colon.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/colon.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/fl.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/fr.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/inser_comma.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/inser_comma.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/insert_emph_L.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/insert_emph_L.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/insert_emph_R.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/insert_emph_R.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/insert_hyphen.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/insert_hyphen.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/add_period.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/add_period.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/add_space.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/add_space.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/add_sumthing.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/add_sumthing.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/capital_this.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/capital_this.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/check_pls.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/check_pls.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/delete_close.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/delete_close.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/ins_comma.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/ins_comma.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/new_par.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/new_par.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/no_par.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/no_par.png')"></img>
                <img class="c_img" draggable="true" src="/img/cp_symbols/smol_letter.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/smol_letter.png')"></img>
            


                    <!-- <img class="c_img" draggable="true" src="/img/cp_symbols/.png" width="252" height="295" onclick="addToCanvas('/img/cp_symbols/.png')"></img> -->
                    <!-- https://www.sfep.org.uk/assets/files/general/bsi-symbols-d1-closeup.png -->

        </div>
                        
                  </div>
                
                <div class="col-10" id="box1"></div>
        <div class="drafter"></div>
        <canvas id="cvdrafter" width="1280" height="720" style="border: 1px solid black"></canvas>
        
       
         </div><br> <label>Notes:</label><textarea id="comment" class="form-control" placeholder="Notes here..."></textarea>
         <br><br>
		<div class="container">
                    <div class="row">
                      <button class="btn btn-success" onclick="save()">SAVE</button>
            <a href="/article/<?php echo $art_id; ?>" class="btn btn-warning">BACK</a>
                    </div>
                    
                </div>
        
</body>

<script>
loadArt();
	$("#penPanel").hide();

    var global_URL = "";


    var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;

    var x = "black",
        y = 2;
   
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

//=================
// saveCanvas();
        //==================


    }

    
    function init() {
    	htm = document;
        canvas = document.getElementById('box1');
        ctx = canvas.getElementsByTagName('canvas')[0].getContext("2d");
        w = canvas.width;
        h = canvas.height;
        saveCanvas();
       
    }
    
   





	function loadArt(argument) {
		$.ajax({
			url: '/api/article/' + <?php echo $art_id; ?>,
			success: function(result){
				result = jQuery.parseJSON(result);
				$.each(result,function(idx,value){
                    document.title = value.name;
					$("#article_title").text(value.name);
					$("#box0").html('<div class="col-12">'+atob(value.body)+'</div>')
				});
				$('.ql-clipboard').remove();
  					$('.ql-tooltip').remove();
				
			}
		});


	}
    var canvas_main = ""
    function saveCanvas(){
        var dataURL =  document.getElementsByTagName("canvas")[0].toDataURL('image/png', 1);
        //set canvas
        var img = new Image();
        img.src = dataURL;
        console.log(img.width);
        var canvass = document.getElementById('cvdrafter');
        canvass.width = $("#box0").width();
            canvass.height = $("#box0").height();



        $("canvas").first().remove();
        $(".drafter").attr('data-floorplan', dataURL);
        
        
        canvas_main = new fabric.Canvas('cvdrafter');

       
        // fabric.Image.fromURL($(".drafter").attr('data-floorplan'), function(myImg) {
        // //i create an extra var for to change some image properties
        // var img1 = myImg.set();

        
        // canvas.add(img1); 
    // });
        canvas_main.setBackgroundImage($(".drafter").attr('data-floorplan'), canvas_main.renderAll.bind(canvas_main));





    }




	function save(){
        var canvas = document.getElementById('cvdrafter');
		var dataURL = canvas.toDataURL('image/png', 1);
        // console.log(dataURL);
		dataa = [{
			"copyread" : "'" + dataURL + "'"
		}];
		dataa = JSON.stringify(dataa);
    console.log( dataa);
		$.ajax({
			url: '/api/article/cp/' + <?php echo $art_id; ?>,
			type: 'put',
			data: dataa,
			success: function(result){
				
        dt = JSON.stringify([{"comment" : "'" + $("#comment").val() + "'"}]);

        $.ajax({
          url: '/api/article/'+ <?php echo $art_id; ?>,
          type: 'put',
          data: dt,
          success: function(result){
            toastr.success("Copyread Saved!");
          }
        });
			}
		});
	}
    function addToCanvas(e){

        var imgObj = new Image();
        imgObj.src = e;
        imgObj.onload = function() {
        var image = new fabric.Image(imgObj);
        image.set({
            left: 10,
            top: 10,
        }).scale(0.2);
        
        canvas_main.add(image);
        }
    }
</script>
<style type="text/css">
.c_img{
    max-height: 50px;
    max-width: 50px;
}
[draggable] {
    -moz-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    -khtml-user-drag: element;
    -webkit-user-drag: element;
    cursor: move;
}
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