<?php
///get variables from page
$hunters = $_POST['hunters'];
$observers = $_POST['observers'];
	//$trip_trip and $price_price are taken from split() in error_check.php
$trip_id = $trip_trip;
$price = $price_price;

//get session id to use as conformation number
$conf =  substr(session_id(),0,10);

if(!$_SESSION['resID']){
	//if there is no session yet start one and do the insert.
	//insert into reservations
	$sql = "insert into reservations (trip_id, price, hunters, observers, t_c, date_time, conf) values ('$trip_id', '$price', '$hunters', '$observers','1', now(), '$conf')";
	$query= mysql_query($sql) or die (mysql_error());
	
	$_SESSION['resID'] =  mysql_insert_id();
	$resID = $_SESSION['resID'];
}else{

	$resID = $_SESSION['resID'];
	
	$sql = "update reservations set trip_id = '$trip_id', price = '$price', hunters = '$hunters', observers = '$observers', date_time = now(), conf = '$conf' WHERE id = '$resID'";
	$query= mysql_query($sql);
}



?>
