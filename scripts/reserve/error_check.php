<?php
if($_POST['step1'] || $_POST['save1']){
	if(!$_POST['hunters']){
		$error .= "Please enter the number of hunters who will be in your group.\n";
	}
	
	if(!$_POST['observers'] && $_POST['observers'] !== "0"){
		$error .= "Please indicate the number of non-hunting observers that will be in your group.\n";
	}
	
	if(!$_POST['trip']){
		$error .= "Please select a trip.\n";
	}
	
	if(!$_POST['price']){
		$error .= "Please select the hunter to guide ratio that you would like.\n";
	}

	if($_POST['trip'] && $_POST['price']){
	//check if the selected trip and trip type are fromm the same trip by striping down the type ID that must match
		list($price_type,$price_price) = split("_",$_POST['price']);
		list($trip_type,$trip_trip) = split("_",$_POST['trip']);
		if($price_type != $trip_type){
			$error .= "Please select a 'Hunter to guide ratio' and trip dates from the same trip.\n";
		}
	}	
	
	if(($_POST['observers'] || $_POST['observers'] === '0') && $_POST['hunters'] && $_POST['trip'] && $_POST['price']){
		//are ther enought spots left
		$totalGuests = $_POST['observers'] + $_POST['hunters'];
		
		$sql = "SELECT spots FROM trips WHERE id = '$trip_trip'";
		$query = mysql_query($sql) or die (mysql_error());
		$result = mysql_fetch_array($query);
		$spots = $result['spots'];
		
		$sql = "SELECT SUM(hunters) AS spots_reserved FROM reservations WHERE trip_id = '$trip_trip' and id != '$resID'";
		$query = mysql_query($sql) or die (mysql_error());
		$result = mysql_fetch_array($query);
		$spots_reserved = $result['spots_reserved'];
		$spots_remaining = $spots - $spots_reserved;
		echo $spots_remaining . " = " . $spots . " - " .$spots_reserved;
		if($spots_remaining < $_POST['hunters'] || $totalGuests > __CFG_Max_Guests){
			 $error .= "There are not enough spots left on that trip to accomodate your entire party.\n
			 Please contact us via phone or email to book large parties.\n";
		}
	}
	
	$trip = $_POST['trip'];
	$price = $_POST['price'];
	$hunters = $_POST['hunters'];
	$observers = $_POST['observers'];
	
	$tpl->assign('trip',$trip);
	$tpl->assign('price',$price);
	$tpl->assign('hunters',$hunters);
	$tpl->assign('observers',$observers);
	
}elseif($_POST['step2'] || $_POST['save2']){

	$errors = array(
	'firstName' => "Please enter your first name.\n",
	'lastName' => "Please enter your last name.\n",
	'address' => "Please enter your street address.\n",
	'city' => "Please enter your city.\n",
	'state' => "Please enter your state.\n",
	'zip' => "Please enter your zip.\n",
	'tel' => "Please enter a telephone number.\n",
	'email' => "Please enter a email address.\n",
	'dates' => "Please enter a arival and departure dates.\n",
	'invalidEmail' => "That does not appear to be a valid email address.\n",
	'tc' => "You must accept Stockton Outfitters' Terms &amp; Conditions before you continue.\n",
	// this functionality is not implemented 'emailDouble' => "That email address is already in our database.\n"
	);
	
	if(!$_POST['firstName']){ $error .= $errors['firstName'];}
	if(!$_POST['lastName']){ $error .= $errors['lastName'];}
	if(!$_POST['address']){ $error .= $errors['address'];}
	if(!$_POST['city']){ $error .= $errors['city'];}
	if(!$_POST['state']){ $error .= $errors['state'];}
	if(!$_POST['zip']){ $error .= $errors['zip'];}
	if(!$_POST['email']){ $error .= $errors['email'];}
	if(!$_POST['tel1'] && !$_POST['tel2']){ $error .= $errors['tel'];}
	
	//check for valid email address if one has been entered
	if ($_POST['email'])
	{
		$goodEmail = valid_email($_POST['email']);
		if(!$goodEmail){$error .= $errors['invalidEmail'];}
	}
	if(!$_POST['tc']){ $error .= $errors['tc'];}
	if(!$_POST['h2g']){ $error .= $errors['h2g'];} 
	//REMOVED BY CLIENT REQUEST if(!$_POST['month_arr'] || !$_POST['month_dpt'] || !$_POST['day_arr'] ||  !$_POST['day_dpt']){ $error .= $errors['dates'];}
	
/*this functionality is not implemented 
	$sql = "select * from users where email = '$email'";
	$result = mysql_query($sql);
	$rows = mysql_fetch_array($result);		
	$listStatus = $rows['email_list'];
	$id = $rows['id'];
	
	if (mysql_num_rows($result)>0)
	{
		//are they already getting the email? If so, show the found double msg
		if($listStatus == '1'){		
			unset($email);
			$error .= $errors['emailDouble'];
		}
	}
*/
	 $firstName = $_POST['firstName'];
	 $lastName = $_POST['lastName'];
	 $address = $_POST['address'];
	 $address2 = $_POST['address2'];
	 $city = $_POST['city'];
	 $state = $_POST['state'];
	 $zip = $_POST['zip'];
	 $email = $_POST['email'];
	 $tel1 = $_POST['tel1'];
	 $tel2 = $_POST['tel2'];
	 $fax = $_POST['fax'];
	 $tc = $_POST['tc'];
	 $dates = $_POST['dates'];
	 $h2g = $_POST['h2g'];
	 
	 //dates
	 $month_arr =  $_POST['month_arr'];
	 $month_dpt = $_POST['month_dpt'];
	 $day_arr = $_POST['day_arr'];
	 $day_dpt = $_POST['day_dpt'];
	 
	 $tpl->assign('firstName',$firstName);
	 $tpl->assign('lastName',$lastName);
	 $tpl->assign('address',$address);
	 $tpl->assign('address2',$address2);
	 $tpl->assign('city',$city);
	 $tpl->assign('state',$state);
	 $tpl->assign('zip',$zip);
	 $tpl->assign('tel1',$tel1);
	 $tpl->assign('tel2',$tel2);
	 $tpl->assign('fax',$fax);
	 $tpl->assign('tc',$tc);
	 $tpl->assign('dates',$dates);
	 $tpl->assign('h2g',$h2g);
	 $tpl->assign('email',$email);
	 $tpl->assign('observers',$observers);
	 
	 //dates
	 $tpl->assign('month_arr',$month_arr);
	 $tpl->assign('month_dpt',$month_dpt);
	 $tpl->assign('day_arr',$day_arr);
	 $tpl->assign('day_dpt',$day_dpt);
	 
}elseif($_POST['cc']){
	$errors = array(
	'ccName' => "Please enter the name on you crdit card.\n",
	'ccType' => "Please indicate a card type.\n",
	'ccNum' => "The card number you entered does not appear to be valid.\n",
	'cvn' => "The cvn number you entered does not appear to be valid.\n",
	'amount_too_low' => "You must pay a minimum of 50% of your total charge to make a online reservation.\n");
	 
	if(!$_POST['ccName']){$error .= $errors['ccName'];}
	if(!$_POST['ccType']){$error .= $errors['ccType'];}
	if(!$_POST['ccNum']){$error .= $errors['ccNum'];}
	if(!$_POST['cvn']){$error .= $errors['cvn'];}
	if(!$_POST['amountPaid'] || $_POST['amountPaid'] > ($_POST['totalPrice']/2)){$error .= $errors['amount_too_low'];}
	
	$tpl->assign('ccName',$_POST['ccName']);
	$tpl->assign('ccType',$_POST['ccType']);
	$tpl->assign('ccNum',$_POST['ccNum']);
	$tpl->assign('cvn',$_POST['cvn']);
	$tpl->assign('amountPaid',$_POST['amountPaid']);
}
?>