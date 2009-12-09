<?php

$resID = $_SESSION['resID'];

$sql = "SELECT trip_id, type_id, type, start_date, end_date from reservations, trips, trip_types WHERE reservations.id = '$resID' AND reservations.trip_id = trips.id AND type_id = trip_types.id";

$query = mysql_query($sql) or die (mysql_error());
$result = mysql_fetch_array($query);
extract($result);

$tpl->assign('type',$type);
$tpl->assign('startDate',$start_date);
$tpl->assign('endDate',$end_date);
?>