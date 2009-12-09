<?php
$currentYear = __CFG_Reservation_Year;
$sql = "SELECT tt.id AS typeID, type, description, price1, price1_desc, price2, price2_desc,
t.id AS tripID, start_date, end_date, spots
FROM trip_types tt, trips t
WHERE tt.id = type_id AND year(start_date) = $currentYear AND status = 1 ORDER BY type";

$query = mysql_query($sql) or die (mysql_error());
//$num = mysql_num_rows($query);
//echo $num;

while($rows = mysql_fetch_array($query)){
	$trip = array();
	
	$trip['tripID'] = $rows['tripID'];
	$tripID  = $rows['tripID'];
	
	// $spotsSql = "SELECT SUM(hunters) AS spots_reserved FROM reservations WHERE trip_id = '$tripID' and id != '$resID'";
	$spotsSql = "SELECT SUM(hunters) AS spots_reserved FROM reservations WHERE trip_id = '$tripID'";

	//echo $spotsSql;
	$spotsQuery = mysql_query($spotsSql);
	$spotsRow = mysql_fetch_array($spotsQuery);
	$spots_reserved = $spotsRow['spots_reserved'];
	$spots_available = $rows['spots'] - $spots_reserved;
	if($spots_available>0){
		$trip['spots'] = "Room for " . $spots_available;
	}else{
		$trip['spots'] = "UNAVAILABLE";
	}
	
	$trip['start_date'] = $rows['start_date'];
	$trip['end_date'] = $rows['end_date'];
	$trip['typeID'] = $rows['typeID'];
	
	if(!isset($typeID) || $typeID != $rows['typeID']){
	
		$typeID = $rows['typeID'];
		$trip['type'] = $rows['type'];
		$trip['description'] = $rows['description'];
		$trip['price1'] = $rows['price1'];
		$trip['price1_desc'] = $rows['price1_desc'];
		$trip['price2'] = $rows['price2'];
		$trip['price2_desc'] = $rows['price2_desc'];
	}
	
	$trips[] = $trip;
}

//print_array($trips);
$tpl->assign('tripLoop', $trips);

$tpl->assign('currentYear', $currentYear);

?>
