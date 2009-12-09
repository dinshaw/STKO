<?php
$sql = "select * from pages where page = '$page'";
$query = mysql_query($sql);
while($rows = mysql_fetch_array($query)){
	$title = $rows['title'];
	$teaser = $rows['teaser'];
	$body = $rows['body'];
	$pageID = $rows['id'];
}

//if it has a $pageID then it only returns that page's images
include 'scripts/pages/get_images.php';


$tpl->assign('title',$title);
$tpl->assign('teaser',$teaser);
$tpl->assign('body',$body);
$tpl->assign('page',$page);

?>