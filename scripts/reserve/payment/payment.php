<?php
$resID = $_SESSION['resID'];
$custID = $_SESSION['custID'];
$paymentType = $_POST['paymentType'];
$totalPrice = $_POST['totalPrice'];
$amountPaid = $_POST['amountPaid'];
$totalGuests = $_POST['totalGuests'];
$tripID = $_POST['tripID'];


if($_POST['success']){
	include 'scripts/reserve/error_check.php';
	//upadate reservation status and amount
	$sql = "update reservations set amount_paid = '$amountPaid', total_price = '$totalPrice', payment_type = '$paymentType', status = '1' where id = '$resID'";
	$query = mysql_query($sql) or die ($sql . "<br>" . mysql_error());
	
	session_destroy();
	
	//send email
	include 'scripts/reserve/payment/success_emails.php';
	
	$tpl->display('reserve/reciept.tpl');

}elseif($_POST['pay']){
		
	include 'scripts/reserve/error_check.php';
	//upadate reservation status and amount
	$sql = "update reservations set total_price = '$totalPrice', status = '1' where id = '$resID'";
	$query = mysql_query($sql) or die ($sql . "<br>" . mysql_error());

	session_destroy();
	
	//send email
	include 'scripts/reserve/payment/success_emails.php';
	
	$tpl->display('reserve/reciept.tpl');
	
}else{
	$tpl->assign('error','Payment gateway is not online');
	$tpl->display('reserve/step3.tpl');
}


?>