<?php

$sql = "select * from press order by display asc";
$query = mysql_query($sql);
$totalCount = mysql_num_rows($query);
while($rows = mysql_fetch_array($query)){
	$press = array();
	
	$press['id'] = $rows['id'];
	$press['title'] = $rows['title'];
	$press['body'] = $rows['body'];
	$press['picID'] = $rows['picID'];
	$press['display'] = $rows['display'];
	$picID = $rows['picID'];
	
	$sql2 = "select * from images where id = '$picID'";
	$query2 = mysql_query($sql2);
	while($rows2 = mysql_fetch_array($query2)){
		$press['h'] = $rows2['h'];
		$press['w'] = $rows2['w'];
		$press['image'] = $rows2['name'];
	}
	
	$pressList[] =  $press;
}

//print_array($testimonialList);

$tpl->assign('pressLoop',$pressList);
$tpl->assign('totalCount',$totalCount);
?>