<?php
$sql = "SELECT t.id, start_date, end_date, type
FROM trips AS t, trip_types AS tt
WHERE t.type_id = tt.id order by type";
$query = mysql_query($sql);

while($rows = mysql_fetch_array($query)){
	$trip = array();
	
	$trip['id'] = $rows['id'];
	$trip['startDate'] = $rows['start_date'];	
	$trip['endDate'] = $rows['end_date'];
	//set type
	if($newType != $rows['type']){
		$trip['type'] = $rows['type']; 
		$newType = $rows['type'];
	}
	
	$trips[] = $trip;
}


$tpl->assign('tripLoop',$trips);

?>