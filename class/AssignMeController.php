<?php
$conn = DB::db_init();
$query = "select id from article order by id desc limit 1";
$last_id = 0;
$res = $conn->query($query);
while ($row = $res->fetch_assoc()) {
	$last_id = $row['id'];
}
DB::raw("insert into user_article (article,user) values(".$last_id.",".$_SESSION['idx'].")");
?>