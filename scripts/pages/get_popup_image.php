<?php
$id = $_GET['id'];

$sql = "select * from images where id = '$id'";

$query = mysql_query($sql);

$rows = mysql_fetch_array($query);
$image = $rows['name'];
$page = $rows['page'];
$title = $rows['title'];
$caption = $rows['caption'];

if($rows['w'] > 600){
	$w = 600;
}else{
	$w = $rows['w'];
}


$tpl->assign('image',$image);
$tpl->assign('page',$page);
$tpl->assign('caption',$caption);
$tpl->assign('title',$title);
$tpl->assign('w',$w);
// $tpl->assign('h',$h);

?>