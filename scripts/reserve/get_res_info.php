<?php

if(!$resID){
	$resID = $_SESSION['resID'];
}

$sql = "SELECT cust_id AS custID, trip_id, type_id, type, DATE_FORMAT(start_date,'%b %D, %Y') AS start_date, DATE_FORMAT(end_date,'%b %D, %Y') AS end_date, hunters, observers, hunters + observers AS totalGuests, price, conf from reservations, trips, trip_types WHERE reservations.id = '$resID' AND reservations.trip_id = trips.id AND type_id = trip_types.id";

$query = mysql_query($sql) or die (mysql_error());
$result = mysql_fetch_array($query);
extract($result);

//get price
$observerPrice = __CFG_Observer_Price;

$sql = "select $price AS hunterPrice, ($price * $hunters) + ($observers * $observerPrice) AS totalPrice from trip_types WHERE id = '$type_id'";

$query = mysql_query($sql) or die ($sql . "<br>" .mysql_error());
$result = mysql_fetch_array($query);
extract($result);

//caluclate 50%
$minPayment = $totalPrice/2;
//create variables to reaassign template values
//trip price is {trip_id}_{'price1' or 'price2'}
$price = $type_id . "_" . $price;
//trip is {type_id}_{trip_id}
$trip = $type_id . "_" . $trip_id;

$tpl->assign('custID',$custID);
$tpl->assign('tripID',$trip_id);
$tpl->assign('resID',$resID);
$tpl->assign('type',$type);
$tpl->assign('startDate',$start_date);
$tpl->assign('endDate',$end_date);
$tpl->assign('hunters',$hunters);
$tpl->assign('observers',$observers);
$tpl->assign('totalGuests',$totalGuests);
$tpl->assign('hunterPrice',$hunterPrice);
$tpl->assign('observerPrice',$observerPrice);
$tpl->assign('totalPrice',$totalPrice);
$tpl->assign('minPayment',$minPayment);
$tpl->assign('price',$price);
$tpl->assign('trip',$trip);
$tpl->assign('conf',$conf);

?>