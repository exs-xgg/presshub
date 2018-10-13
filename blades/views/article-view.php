<?php if (!isset($_SESSION['user'])) {
  header("location: /login");
  echo $_SESSION['idx'];
} 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Article Name</title>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https:///cdn.quilljs.com/1.3.6/quill.min.js"></script>
  <?php include 'dependencies.php'; ?>
 <?php 
$id=($uri[2]);
$is_he_here = DB::raw("select * from user_article where user=" . $_SESSION['idx']. " and article=$id");

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
        <a class="navbar-brand mr-lg-5" href="/dashboard">
          <h3 id="article_header">Article Name</h3>
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
          <input class="form-control form-control-alternative" type="text" id="article_name">
          <label for="category">Category</label>
          <select class="form-control" type="text" id="category" list="userList">
                          <datalist id="userList">
                      <option value="News">News</option>
                      <option value="Feature">Feature</option>
                      <option value="Sports">Sports</option>
                      <option value="Literary">Literary</option>
                      <option value="Editorial">Editorial</option>
                    </datalist>
          </select>
          <label>Deadline</label>
              <input class="form-control datepicker" placeholder="Select date" type="text" id="deadline" <?php echo (true) ? "disabled" : null; ?>>
          
        </div>

 
        <div class="col-md-6">
          <nav class="alert alert-dark">Assign Users</nav>
          <div class="col-lg-10 ">
          <label>Assign Users</label>
                      <input class="form-control" type="text" id="userAssigned" list="userList">
                            <datalist id="userList">
                        <option value="7">Rain</option>
                        <option value="8">Josh</option>
                        <option value="9">Therese</option>
                        <option value="10">Calvin</option>
                        <option value="11">Maam Danica</option>
                      </datalist>
          
          </div>
          <div class="col-lg-2">
            <label class="col-lg-12">&nbsp;</label>
            <span onclick="addUserToArticle()" class="btn btn-primary"><i class="fa fa-plus"></i> Add</span>
          </div>
          <div class="row">
                    <table class="table table-striped" id="user_article_list">
                      <thead>
                        <tr><th>Name</th><td></td></tr>
                      </thead>
                      <tbody>
                        <tr><td>Test</td><td class="col-md-1 chev"><i class="fa fa-close"></i></td></tr>
                      </tbody>
                    </table>
                  </div>
        </div>
<?php if ($is_he_here!=="[]" || $_SESSION['is_admin']=="Y") {
  ?>
      <hr>
        <div class="col-md-12">
           <nav class="alert alert-dark">Content </nav>
           <div class="container">
            <div class="row">
              
              
              <div class="col-3">
                <span class="col-md-12 btn btn-success" onclick="saveArticle()"><i class="fa fa-save"></i> Save</span>
              </div>
              <div class="col-3">
                <span class="col-md-12 btn btn-primary"><i class="fa fa-check"></i> Finished</span>
              </div> <?php  
 }       ?>  
<?php if ($_SESSION['designation']!=="EIC") {

?>
              <div class="col-3">
                <span class="col-md-12 btn btn-warning"><i class="fa fa-search"></i> Copyread</span>
              </div>

              <div class="col-3">
                <span class="col-md-12 btn btn-danger" data-toggle="modal" data-target="#md_1"><i class="fa fa-trash"></i> Delete</span>
              </div>



              <div class="modal fade" id="md_1" tabindex="-1" role="dialog" aria-labelledby="modal-notification" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                      <div class="modal-content bg-gradient-danger">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-notification">DELETE ARTICLE</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         <h1>ARE YOU SURE YOU WANT TO DELETE THIS ARTICLE?</h1>
                         <h3>This action can't be undone.</h3>
                        </div>
                        <div class="modal-footer"> 
                          <button class="btn btn-danger" data-dismiss="modal" onclick="deleteArticle()">yes, delete</button>
                          <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Go Back</button>
                        </div>
                      </div>
                    </div>
                  </div>




  <?php } ?>            
            </div>  
          </div>
           <br><div id="editor">
  <p>Hello World!</p><h1>asdasdasda</h1>
  <p>Some initial <strong>bold</strong> text</p>
  <p><br></p>
</div>
           

<!-- Include the Quill library -->


           <!-- <textarea class="form-control form-control-alternative"></textarea> -->
        </div>
    </div></div>
</div>

    

</body>
<script>
 


loadUserArticle();
getUserList();
  getWholeArticle();

  function deleteArticle(){
    $.ajax({
      url: '/api/deleteArt/' + localStorage.getItem("art_id"),
      success: function(result){
        window.location.href= "/dashboard/proj-file";
      }
    });
  }
  function getUserList(){
    $.ajax({
      url: '/api/user',
      success: function(result){
        var user_list = jQuery.parseJSON(result);
        $("#userList").empty();
        $.each(user_list,function(idx,value){
          $("#userList").append('<option value="' + value.id + '">' + value.first_name + ' ' + value.last_name + '</option>');
        });
      }
    });
  }
  function loadUserArticle(){
    var user_id = $("#userList").val();
    $.ajax({
      url: "/api/userList/" + localStorage.getItem("art_id"),
      success: function(result){
        console.log(result);
        var user_list = jQuery.parseJSON(result);
        $("#user_article_list").empty();
        $.each(user_list,function(idx,value){
          $("#user_article_list").append('<tr><td>'+ value.first_name +' ' + value.last_name + '</td><td class="col-md-1 chev"><i class="fa fa-close"></i></td></tr>');
        });
      }
    });
  }
  function addUserToArticle(){
    var user_id = $("#userAssigned").val();
    dataa = [{
      'user' : user_id,
      'article' : localStorage.getItem("art_id")
    }]
    dataa = JSON.stringify(dataa);
    $.ajax({
      url: "/api/userList",
      method: 'post',
      data: dataa,
      success: function(result){
        console.log(result);
        toastr.success("User Succesfully assigned to this Article!");
        loadUserArticle();
      }
    });
  }
  function saveArticle(){
    var art_id = localStorage.getItem("art_id");
    var deadline = $("#deadline").val().split("/");
    deadline = deadline[2] + "-" + deadline[0] + "-" + deadline[1];
    var art_data = [{
      'name' : "'" + $("#article_name").val().replace(/<>/ig,"") +"'",
      'cat_id': "'"+$("#category").val() + "'",
      'body' : "'" + btoa($("#editor").html()) + "'"
    }];
    art_data = JSON.stringify(art_data);

    $.ajax({
      url: '/api/article/' + art_id,
      type: 'put',
      data: art_data,
      success: function(result){
        console.log(result);
        toastr.success("Saved Succesfully!");

      },
      error: function(result){
        console.log(result);
        toastr.danger("Something went wrong. Connection timed out.");
      }
    });
  }
  function snapArticle(){
    var article_body = $("#article_body");
    
  }
  function getWholeArticle(){
    $.ajax({
      url: '/api/article/' + localStorage.getItem("art_id"),
      success: function(result){
        // console.log(result);
        var article_result = jQuery.parseJSON(result);
        $.each(article_result, function(idx, value){
          $("#article_header").text(value.name);
          $("#article_name").val(value.name);
          $("#deadline").val(value.deadline);
          $("#editor").html(atob(value.body));
          window.document.title = value.name + " - Edit Article";

        });
        var quill = new Quill('#editor', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image']
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
});
      }
    });
  }



  function changeColumn(){
    var numberOfColumns = $("#numberOfColumns").val();
    $("#article_content").removeClass();
    $("#article_content").addClass("p" + numberOfColumns + 'c');
  }
</script>
<style type="text/css">
  .p2c{
    text-align: justify;
    -webkit-column-gap: 20px;
       -moz-column-gap: 20px;
            column-gap: 20px;
    -webkit-column-count: 2;
       -moz-column-count: 2;
            column-count: 2;
}
.p1c{
    text-align: justify;
    -webkit-column-gap: 20px;
       -moz-column-gap: 20px;
            column-gap: 20px;
    -webkit-column-count: 1;
       -moz-column-count: 1;
            column-count: 1;
}
.p3c{
    text-align: justify;
    -webkit-column-gap: 20px;
       -moz-column-gap: 20px;
            column-gap: 20px;
    -webkit-column-count: 3;
       -moz-column-count: 3;
            column-count: 3;
}
.p4c{
    text-align: justify;
    -webkit-column-gap: 20px;
       -moz-column-gap: 20px;
            column-gap: 20px;
    -webkit-column-count: 4;
       -moz-column-count: 4;
            column-count: 4;
}
</style>
</html>