<?php

$sql = "select * from team order by id asc";
$query = mysql_query($sql);

while($rows = mysql_fetch_array($query)){
	$team = array();
	
	$team['id'] = $rows['id'];
	$team['name'] = $rows['name'];
	$team['text'] = $rows['text'];
	$team['picID'] = $rows['picID'];
	$picID = $rows['picID'];
	
	$sql2 = "select * from images where id = '$picID'";
	$query2 = mysql_query($sql2);
	while($rows2 = mysql_fetch_array($query2)){
		$team['h'] = $rows2['h'];
		$team['w'] = $rows2['w'];
		$team['image'] = $rows2['name'];
	}
	
	$teamList[] =  $team;
}

//print_array($testimonialList);

$tpl->assign('teamLoop',$teamList);

?>