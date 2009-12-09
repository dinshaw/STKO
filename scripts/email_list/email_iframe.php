<?php
require_once("../../inc/functions.php");

db_connect();

if($_POST['errorCheck'] =="on"){
	$errors = array(
	'email' => "Enter your email address.\n",
	'validEmail' => "That does not appear to be a valid email address.\n",
	'emailDouble' => "That email address is already in our database.\n"
	);
		
	if (!$_POST['email'])
	{
		$error .= $errors['email'];
	}
	else
	{
		$goodEmail = valid_email($_POST['email']);
		if (!$goodEmail)
		{
			$error .= $errors['validEmail'];
		}
	
		$email = $_POST['email'];
		$name = $_POST['name'];
		
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
	}
	
	if (!$error)
	{
		if($listStatus == '0'){
			$sql = "update users set email_list = '1' where id = '$id'";
			$result = mysql_query($sql) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			unset($name);
			unset($email);
			$msg = "Thank you, your account has been updated.\n You will now receive the emails.";
		}else{
			$sql = "insert into users (username, email, status, email_list, dateTime) values ('$name', '$email','0','1',NOW())";
			$result = mysql_query($sql) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			
			$id = mysql_insert_id();
			
			$text = "Hello $name,
			Thanks for signing up for the DINSHAW.us email list.  You are officially dialed in  now so sit back and enjoy the whatever....
			If you got this by mistake there are instructions at the bottom to get off.
			-Uncle Din
			http://www.dinshaw.us";
			$html = "Hello $name,<br />
			Thanks for signing up for the <a href='http://www.dinshaw.us'>DINSHAW.us</a> email list.  You are officially dialed in now so sit back and enjoy the whatever....<br />
			If you got this by mistake there are instructions at the bottom to get off.<br />
			-Uncle Din<br />
			<a href=''http://www.dinshaw.us'>DINSHAW.us</a><br />";
			
			$msg = "Thank you, your email address has been added to the list.";
			mail_multi_alt($email,"==1234wahsnid4321","Welcome to the party!",$text,$html,$id);
			
			unset($name);
			unset($email);
		}
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>DINSHAW Email list - Sign-Up / Join</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../inc/css/basic.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="window.focus()">

<div id="content">

<div id="emailForm">

<p class="error"><? echo $msg; echo $error;?></p>

	<form action="email_iframe.php" method="post">
	<input type="hidden" name="mode" value="emailIframe">
	<input type="hidden" name="errorCheck" value="on">


	<table>
	 <tr>
		<td colspan="5">Join the email list and party like a rock star:</td>
	</tr>
	
	<tr>
		<td class="lbl">Name:</td>
		<td class="fld"><input name="name" type="text" value="<? echo $name;?>" id="email"></td>
		<td class="lbl">Email:</td>
		<td class="fld"><input name="email" type="text" value="<? echo $email;?>" id="email"></td>
		<td class="btn"><input name="submit" type="submit" value="Join Now" id="email"></td>
	 </tr>
	</table>
	
	</form>
		<p class="small">This email list will send you invites to  all the coolest parties. You can <a href="http://www.dinshaw.us/index.php?mode=email&action=unsubscribe">remove yourself</a> from our list at any time and we will never share or sell your information (<a href="#" onClick="window.open('http://www.dinshaw.us/index.php?mode=pp','www.dinshaw.us&nbsp;Privacy&nbsp;Policy','width=550,height=600,scrollbars=yes,resizable=yes')">read our privacy policy</a>).</p>
		</div>
	</div>
 </BODY>
</HTML>