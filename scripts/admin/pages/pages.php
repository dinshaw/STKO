<?php
if($_POST['action'] == "add"){
	if(!$_POST['newPage']){
		$error .= "Please enter a page value for the new page.\n";
	}
	if(!$_POST['title']){
		$error .= "Please enter a Title value for the new page.\n";
	}
	
	if(!$error){
		$newPage = $_POST['newPage'];
		$newTitle = $_POST['title'];
		$sql =  "insert into pages (page, title) values ('$newPage','$newTitle')";
		$qurey = mysql_query($sql) or die (mysql_error());
		$error = "Page added";
	}
}elseif($_POST['action'] == "delete"){
echo shit;
	$pageID = $_POST['pageID'];
	$sql =  "delete from pages where id = '$pageID'";
	$qurey = mysql_query($sql);
	$error = "Page deleted";
}
$tpl->assign('errors',$error);

?>