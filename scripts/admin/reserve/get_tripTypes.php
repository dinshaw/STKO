<?php
$sql = "SELECT type, id FROM trip_types";
$query = mysql_query($sql);

while($rows = mysql_fetch_array($query)){
	$tripType = array();
	
	$tripType['id'] = $rows['id'];	
	$tripType['type'] = $rows['type'];
	
	$tripTypes[] = $tripType;
}


$tpl->assign('tripTypeLoop',$tripTypes);

?>