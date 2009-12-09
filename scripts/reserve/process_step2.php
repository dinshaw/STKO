<?php
if(!$_SESSION['custID']){
	$sql = "insert into cust (first_name, last_name, address_1, address_2, city, state, zip, tel_1, tel_2, fax, email) values ('$firstName', '$lastName', '$address', '$address2','$city','$state', '$zip', '$tel1', '$tel2', '$fax', '$email')";
	
	$query = mysql_query($sql) or die ("QUERY:" . $sql . '<BR>' . mysql_error());
	
	$custID = mysql_insert_id();
	
	$_SESSION['custID'] = $custID;
}else{
	$custID = $_SESSION['custID'];
	$sql = "update cust set first_name = '$firstName', last_name = '$lastName', address_1 = '$address', address_2 = '$address2', city = '$city', state = '$state', zip = '$zip', tel_1 = '$tel1', tel_2 = '$tel2', fax = '$fax', email = '$email' WHERE id = '$custID'";
	
	$query = mysql_query($sql) or die (mysql_error());
}

//update the res table with cust info
$resID = $_SESSION['resID'];
$sql = "update reservations set cust_id = '$custID' where id = '$resID'";
$query = mysql_query($sql);

?>
