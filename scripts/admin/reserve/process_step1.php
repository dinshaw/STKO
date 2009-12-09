<?php

//$trip_trip and $price_price are taken from split() in error_check.php
$trip_id = $trip_trip;
$price = $price_price;


$sql = "update reservations set trip_id = '$trip_id', price = '$price', hunters = '$hunters', observers = '$observers' where id = '$resID'";
$query= mysql_query($sql) or die(mysql_error());




?>
