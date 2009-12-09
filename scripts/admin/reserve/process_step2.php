<?php

	$sql = "update cust set first_name = '$firstName', last_name = '$lastName', address_1 = '$address', address_2 = '$address2', city = '$city', state = '$state', zip = '$zip', tel_1 = '$tel1', tel_2 = '$tel2', fax = '$fax', email = '$email' WHERE id = '$custID'";
	
	$query = mysql_query($sql) or die (mysql_error());

?>
