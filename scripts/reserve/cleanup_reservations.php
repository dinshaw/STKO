<?php
$sql = "delete from reservations where date_time < now() - INTERVAL 1 DAY AND cust_id = 0";
$query= mysql_query($sql);
?>
