<?php
$emailID = $_SESSION['emailID'];


if($_POST['preview']){
	if(!$_POST['subject'] || !$_POST['html'] && !$_POST['text']){
		$tpl->assign('error', "Please enter a Subject and a Body.");
		$tpl->assign('subject', $subject);
		$tpl->assign('html', $html);
		$tpl->assign('text', $text);
		$tpl->display('admin/email/post_email.tpl');
	}else{
		if(!$_SESSION['emailID']){
			$sql = "insert into emails (subject, html, text, dateTime) values ('$subject', '$html', '$text', NOW())";
			$query = mysql_query($sql);
			$_SESSION['emailID'] = mysql_insert_id();
			$emailID = $_SESSION['emailID'];
		}else{
			$sql = "update emails set subject = '$subject', html = '$html', text = '$text' where id = '$emailID'";
			$query = mysql_query($sql);
		}
		
		$sql = "select * from emails where id = '$emailID'";
		$query = mysql_query($sql);
		$rows = mysql_fetch_array($query);
		$subject = $rows['subject'];
		$html = $rows['html'];
		$text = $rows['text'];
		$dateTime = $rows['dateime'];
		
		$tpl->assign('subject', $subject);
		$tpl->assign('html', $html);
		$tpl->assign('text', $text);
		$tpl->display('admin/email/preview_email.tpl');
	}
}elseif($_POST['edit']){
	$sql = "select * from emails where id = '$emailID'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);
	$subject = $rows['subject'];
	$subject = ereg_replace('"','&quot;',$subject);
	$html = $rows['html'];
	$text = $rows['text'];
	$dateTime = $rows['dateime'];
	
	$tpl->assign('subject', $subject);
	$tpl->assign('html', $html);
	$tpl->assign('text', $text);
	$tpl->display('admin/email/post_email.tpl');
}elseif($_POST['post']){
	$sql = "select * from emails where id = '$emailID'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);
	$subject = $rows['subject'];
	$html = $rows['html'];
	$text = $rows['text'];
	$dateTime = $rows['dateime'];
	
	$i=0;
	
	$boundary = "==Multipart_Boundary_xxc75885";
	$sql = "select * from users where email_list = '1'";
	$result = mysql_query($sql);
	
	while($rows = mysql_fetch_array($result)){
		$email = $rows['email'];
		$id = $rows['id'];
		++$i;
		
		mail_multi_alt($email,$boundary,$subject,$text,$html,$id);
	}
	unset($_SESSION['emailID']);
	$tpl->assign('count',$i);
	$tpl->display('admin/email/confirm_post.tpl');	
}else{
	$tpl->display('admin/email/post_email.tpl');
}
?>