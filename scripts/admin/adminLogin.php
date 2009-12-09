<?php

if ($_REQUEST['mode'] == 'forgot'){

	if (!$_POST['email']){

		if ($_POST['action']){
			$tpl->assign('errors','Please enter your email address.');
		}

		$tpl->display('admin/login/forgot.tpl');

	}else{

		$email = $_POST['email'];
		$sql = "select * from adminlogin where email = '$email'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		$rows = mysql_fetch_array($result);
		$username = $rows['username'];
		$email = $rows['email'];
		$id = $rows['id'];

		if ($num < 1){
			$tpl->assign('errors','That email does not exist in the admin database.');
			$tpl->display('admin/login/forgot.tpl');

		}else{
			//create new password and update
			$password = random_string(6,13);
			error_log($password);
			$sql ="update adminlogin set passwd = password('$password') where id = '$id'";
			$query = mysql_query($sql);

			$adminEmail = 'Hello,<br>
				Your admin username is: <b>'.$username.'</b>.<br />
				Your admin new password is: <b>'.$password.'</b><br />
				<a href="'.__CFG_URL.'/admin.php">Click here to return to the Admin login area</a>.<br>
				Thanks,<br>
				-'.__CFG_EMAIL_SIG;

			$adminHeaders .= "MIME-Version: 1.0\r\n";
			$adminHeaders .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$adminHeaders .= "From:".__CFG_Admin_EmailName." <".__CFG_Admin_Email.">\r\n";
			$adminHeaders .= "Return-Path: ".__CFG_Admin_Email."\r\n";

			mail($_POST['email'],'Your new admin password',$adminEmail,$adminHeaders);
			//echo $adminEmail;
			$tpl->assign('email',$email);
			$tpl->display('admin/login/forgot_thankyou.tpl');
		}
	}
	}elseif ($_REQUEST['mode'] == 'login'){

		if (!$_POST['username'] || !$_POST['password']){
			$tpl->assign('errors','Please enter your login details.');
			$tpl->display('admin/login/login.tpl');
			exit;

		}else{	

			$password = $_POST['password'];
			$username = $_POST['username'];

			$sql = "select * from adminlogin where username = '$username' and passwd = password('$password')";
			$result = mysql_query($sql);
			$num = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			$id = $row['id'];

			if ($num < 1){
				$tpl->assign('errors','Login failed.');
				$tpl->display('admin/login/login.tpl');
				exit;

			}else{

				$_SESSION['dinshaw_admin_ses'] = $username;
				$_SESSION['dinshaw_admin_id'] = $id;
				$tpl->display('admin/login/success.tpl');
			}	
		}
	}else{
		$tpl->display('admin/login/login.tpl');
	}



	?>
