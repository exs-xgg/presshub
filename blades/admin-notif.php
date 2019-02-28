<div class="tab-pane fade active show" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
  <?php 
  $des = $_SESSION['designation'];
  $des = split(" ", $des);
  $des = $des[0];




  // echo "select concat(concat(name , '_'), article.id) as name from article inner join issue on issue.id=article.issue_id where is_archived='N' and r_location='" . $_SESSION['designation'] . "'";


  $notif = json_decode(DB::raw("select concat(concat(name , '_'), article.id) as name from article inner join issue on issue.id=article.issue_id where is_archived='N' and r_location='" . $_SESSION['designation'] . "'"));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert bg-gradient-purple">FORWARDED -  <?php 
        $keymaster = explode("_",$key3);
        echo "<a class='text-white' href='/article/" . $keymaster[1] . "'>" . $keymaster[0] . '</a>'; ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>  <?php 



$notif = json_decode(DB::raw("select concat(concat(name , '_'), article.id) as name from article where date(date_created) > DATE_SUB(NOW(), INTERVAL 5 DAY) and cat_id like '$des'"));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert alert-info">NEW - <?php 
        $keymaster = explode("_",$key3);
        echo "<a href='/article/" . $keymaster[1] . "'>" . $keymaster[0] . '</a>'; ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>  <?php 


$notif = json_decode(DB::raw("select concat(concat(name , '_'), article.id) as name from article where is_done='Y' and cat_id like '$des'"));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert alert-success">DONE - <?php 
        $keymaster = explode("_",$key3);
        echo "<a href='/article/" . $keymaster[1] . "'>" . $keymaster[0] . '</a>'; ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>  

    <?php 
$notif = json_decode(DB::raw("select concat(concat(name , '_'), article.id) as name from article where deadline < now() and is_done='N' and cat_id like '$des'"));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert alert-danger">OVERDUE/DEADLINE - <?php 
        $keymaster = explode("_",$key3);
        echo "<a href='/article/" . $keymaster[1] . "'>" . $keymaster[0] . '</a>'; ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>       


    <?php 
$notif = json_decode(DB::raw("select concat(concat(name , '_'), article.id) as name from article where copyread is null and body is null and cat_id like '$des'"));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert alert-warning">Blank Article - <?php 
        $keymaster = explode("_",$key3);
        echo "<a href='/article/" . $keymaster[1] . "'>" . $keymaster[0] . '</a>'; ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>                


</div>

