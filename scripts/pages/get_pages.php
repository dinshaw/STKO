<?php
$sql = "select * from pages";
$result = mysql_query($sql);

while($rows = mysql_fetch_array($result)){

	$pageList = array();

	$pageList['page'] = $rows['page'];
	$pageList['id'] = $rows['id'];
	$pageList['title'] = $rows['title'];
	
	$pageLoop[] = $pageList;
}


$tpl->assign('pageLoop',$pageLoop);

?>
