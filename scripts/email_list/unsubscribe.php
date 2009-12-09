<?php
$text = "Hello $name,
$lostName with email: $lostEmail has removed them self from the list.
That sucks but whatever.
-Computer
http://www.dinshaw.us/admin.php";

$html = "Hello $name,<br />
$lostName with email: $lostEmail has removed them self from the list.<br />
That sucks but whatever.<br />
-Computer<br />
<a href=''http://www.dinshaw.us/admin.php'>DINSHAW.us</a><br />";
				
if($_REQUEST['action'] == "unsubscribe"){

	if($_REQUEST['id']){
		$id = $_REQUEST['id'];
		
		$sql ="select * from users where id = '$id'";
		$query = mysql_query($sql);
		$rows = mysql_fetch_array($query);
		$removeEmail = $rows['email'];
		$lostName = $rows['username'];
		$tpl->assign('removeEmail',$removeEmail);
		
		$sql = "delete from users where id = '$id'";
		$query = mysql_query($sql);
		
		//notify admin users
		$sql = "select * from adminlogin";
		$query = mysql_query($sql);
		while($rows = mysql_fetch_array($query)){
			$name = $rows['username'];
			$email = $rows['email'];
			$id = 'dummy_id';
			
			$text = "Hello $name,
			$lostName with email: $removeEmail has removed them self from the list.
			That sucks but whatever.
			-Computer
			http://www.dinshaw.us/admin.php";
			
			$html = "Hello $name,<br />
			<b>$lostName</b> with email: <b>$removeEmail</b> has removed them self from the list.<br />
			That sucks but whatever.<br />
			-Computer<br />
			<a href=''http://www.dinshaw.us/admin.php'>DINSHAW.us</a><br />";

			mail_multi_alt($email,"==1234wahsnid4321","Someone has unsubscribed...",$text,$html,$id);
		}
		$tpl->display('email/unsubscribe_confirm.tpl');
		exit;
	}elseif($_REQUEST['removeEmail']){
	
		$removeEmail = $_REQUEST['removeEmail'];
		
		$sql ="select * from users where email = '$removeEmail'";
		$query = mysql_query($sql);
		$num = mysql_num_rows($query);
		$rows = mysql_fetch_array($query);
		if($num>=1){
			$id = $rows['id'];
			$lostName = $rows['username'];
			$lostEmail = $rows['lostEmail'];
			$sql = "delete from users where id = '$id'";
			$query = mysql_query($sql);
			
			//notify admin users
			$sql = "select * from adminlogin";
			$query = mysql_query($sql);
			while($rows = mysql_fetch_array($query)){
				$name = $rows['username'];
				$email = $rows['email'];
				$id = 'dummy_id';
				
				$text = "Hello $name,
				$lostName with email: <b>$removeEmail</b> has removed them self from the list.
				That sucks but whatever.
				-Computer
				http://www.dinshaw.us/admin.php";
				
				$html = "Hello $name,<br />
				<b>$lostName</b> with email: <b>$removeEmail</b> has removed them self from the list.<br />
				That sucks but whatever.<br />
				-Computer<br />
				<a href=''http://www.dinshaw.us/admin.php'>DINSHAW.us</a><br />";

				mail_multi_alt($email,"==1234wahsnid4321","Someone has unsubscribed...",$text,$html,$id);
			}
			
			$tpl->assign('removeEmail',$removeEmail);
			$tpl->display('email/unsubscribe_confirm.tpl');
			exit;
		}else{
			$tpl->assign('error','That email is not in our database.
			It may have been removed already or you may have typed it wrong.');
			$tpl->display('email/unsubscribe.tpl');
			exit;
		}
		
	}else{
		$tpl->display('email/unsubscribe.tpl');
		exit;
	}
}

?>