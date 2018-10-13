<?php
$id = $uri[3];
DB::delete("article",$id);
DB::raw("delete from user_article where article = " . $id);

?>