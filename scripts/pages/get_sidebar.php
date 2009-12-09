<?php

$sql = "SELECT * from sidebar ORDER by display asc";
$query = mysql_query($sql);
$totalCount = mysql_num_rows($query);

while($rows = mysql_fetch_array($query)){
	$sidebar = array();
	$sidebar['title'] = $rows['title'];
	$sidebar['body'] = $rows['body'];
	$sidebar['id'] = $rows['id'];
	$sidebar['status'] = $rows['status'];
	$sidebar['display'] = $rows['display'];

	$sidebarList[] = $sidebar;
}

$tpl->assign('sidebarLoop',$sidebarList);
$tpl->assign('totalCount',$totalCount);
?>
