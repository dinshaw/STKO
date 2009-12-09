<?php
$sql = "SELECT r.id AS resID, r.trip_id, r.cust_id, r.hunters, r.observers, (r.hunters + r.observers) AS totalGuests, r.total_price, r.amount_paid, (r.total_price - r.amount_paid) AS amount_due, r.conf, r.date_time, tt.id, tt.type, t.type_id, t.start_date, t.end_date, c.id, CONCAT(c.first_name,' ',c.last_name) AS name, c.email,  r.date_time,
CASE r.payment_type
	WHEN 'cc'
	THEN 'Credit Card'
	WHEN 'ck'
	THEN 'Ckeck'
	ELSE 'Unknown'
END AS paymentType, 
CASE r.status
	WHEN 0
	THEN 'INCOMPLETE'
	WHEN 1
	THEN 'DEPOSIT PENDING'
	WHEN 2
	THEN 'RESERVED'
	WHEN 3
	THEN 'PAID'
	WHEN 4
	THEN 'FULFILLED'
	ELSE 'Unknown'
END AS status
FROM reservations r, trips t, trip_types tt, cust c
WHERE r.trip_id = t.id AND t.type_id = tt.id AND r.cust_id = c.id
ORDER BY r.date_time desc";

$query = mysql_query($sql) or die(mysql_error());

while($rows = mysql_fetch_array($query)){
	$res = array();
	
	$res['resID'] = $rows['resID'];
	$res['name'] = $rows['name'];
	$res['email'] = $rows['email'];
	$res['hunters'] = $rows['hunters'];
	$res['observers'] = $rows['observers'];
	$res['totalGuests'] = $rows['totalGuests'];
	$res['total_price'] = $rows['total_price'];
	$res['amount_paid'] = $rows['amount_paid'];
	$res['amount_due'] = $rows['amount_due'];
	$res['paymentType'] = $rows['paymentType'];
	$res['date_time'] = $rows['date_time'];
	$res['status'] = $rows['status'];
	$res['type'] = $rows['type'];
	$res['start_date'] = $rows['start_date'];
	$res['end_date'] = $rows['end_date'];
	
	$reservations[] = $res;
}


$tpl->assign('resLoop',$reservations);

?>