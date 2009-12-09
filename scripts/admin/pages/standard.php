<?php
$dest = __CFG_Image_Path.'pages/'.$page.'/';
$pageID = get_id('pages','page',$page);

if($_POST['action'] == "edit"){
	
	if(!$_POST['title']){
		$error .= "Please enter a title.\n";
	}
	
	if(!$_POST['body']){
		$error .= "Please enter body text.\n";
	}
		
	if(!$error){
		$title = str_replace('"','&quot;',addslashes($_POST['title']));
		$teaser = addslashes($_POST['teaser']);
		$body = addslashes($_POST['body']);
		$sql = "update pages set title = '$title', teaser = '$teaser', body = '$body' where page = '$page'";
		$query = mysql_query($sql) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
	}else{
		$tpl->assign('error',$error);
	}
}

include 'scripts/pages/get_details.php';
include 'scripts/pages/get_standard.php';

?>