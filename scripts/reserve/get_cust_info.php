<?php

if(!$custID){
	$custID = $_SESSION['custID'];
}

$sql = "SELECT * FROM cust WHERE id = '$custID'";
$query = mysql_query($sql);
$result = mysql_fetch_array($query);
extract($result);

$tpl->assign('firstName',$first_name);
$tpl->assign('lastName',$last_name);
$tpl->assign('address',$address_1);
$tpl->assign('address2',$address_2);
$tpl->assign('city',$city);
$tpl->assign('state',$state);
$tpl->assign('zip',$zip);
$tpl->assign('tel1',$tel_1);
$tpl->assign('tel2',$tel_2);
$tpl->assign('fax',$fax);
$tpl->assign('email',$email);

?>