<?php
$id = $uri[3];
DB::delete("article",$id);
DB::raw("delete from user_article where article = " . $id);

DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (".$_SESSION['idx'].",'DELETE','ARTICLE". (isset($uri[3]) ? "(".$uri[3].")" : "")."')");
?>