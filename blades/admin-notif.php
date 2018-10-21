<div class="tab-pane fade active show" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
  <?php 
$notif = json_decode(DB::raw("select name from article where is_done='Y'"));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert alert-success">DONE - <?php echo $key3 ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>  

    <?php 
$notif = json_decode(DB::raw("select name from article where deadline < now() and is_done='N'"));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert alert-danger">OVERDUE/DEADLINE - <?php echo $key3 ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>       


    <?php 
$notif = json_decode(DB::raw("select name from article where copyread is null and body is null"));
    foreach ($notif as $key => $value): ?>
      <?php foreach ($value as $key3): ?>
        <nav class="col-12 alert alert-warning">Blank Article - <?php echo $key3 ?></nav>
      <?php endforeach ?>
      
    <?php endforeach ?>                


</div>