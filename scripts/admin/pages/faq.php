<?php
//first do the category check
if($_POST['action'] == "addCat"){
	if(!$_POST['catTitle']){
		$error = "What is the name of the category called?";
	}
	
	if(!$error){
		$catTitle = $_POST['catTitle'];
		
		//remove spaces and lowercase it for db
		$catName = strtolower($catTitle);
		$catName = str_replace(" ","_",$catName);
		
		$sql = "insert into faq_cats (name, title) values ('$catName', '$catTitle')";
		$query = mysql_query($sql)or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
	}else{
		$tpl->assign('error',$error);
	}
}elseif($_POST['action'] == "deleteCat"){
	$id = $_POST['id'];
	$sql = "delete from faq_cats where id = '$id'";
	$query = mysql_query($sql)or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
	
}elseif($_POST['add'] || $_POST['update']){
	if (!$_POST['q'] || !$_POST['a'] || !$_POST['faqCatId']){
		$error .= "Please fill in all the fields.\n";
	}
	
	$a = str_replace('"','&quot;',$_POST['a']);
	$q = str_replace('"','&quot;',$_POST['q']);
	$faqCatId = $_POST['faqCatId'];
	$faqCatTitle = get_value('title','faq_cats','id',$faqCatId);
	$editID = $_POST['editID'];
	$display = $_POST['display'];
	
	if(!$error){

		
		if($_POST['update']){
			//make sure the entry is still in the database and if not return an error (gaursd againnst BACK button abuse)
			$sqlDouble = "select * from faq where id = '$editID'";
			$queryDouble = mysql_query($sqlDouble);
			$numDouble = mysql_num_rows($queryDouble);
			if($numDouble == 0){
				$badEditID = "true";
			}
		}
				
		if(!$badEditID){
		
			reorder('team',$editID,$display);

			//if magic quotes is off
			$q = addslashes($q);
			$a = addslashes($a);
		
			//creat the SQL depending on if we are in edit or add mode
			if($_POST['add']){
				$sql = "insert into faq (q, a, cat) values ('$q', '$a', '$faqCatId')";
			}elseif($_POST['update']){
				$sql = "update faq set q = '$q', a = '$a', cat = '$faqCatId' where id = '$editID'";
			}
			
			
			$query = mysql_query($sql)or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			
			if(!$_POST['editID']){
				$editID = mysql_insert_id();
			}
			
		}else{
			$tpl->assign('msg',"That entry is not in the database any more.  You must have deleted it.");
		}
		
	}else{
		$tpl->assign('msg',$error);
	}
	//set up preview pane
		$tpl->assign('q',stripslashes($q));
		$tpl->assign('a',stripslashes($a));
		$tpl->assign('faqCatId',$faqCatId);
		$tpl->assign('faqCatTitle',$faqCatTitle);
		$tpl->assign('display',$display);
		$tpl->assign('edit','true');
		$tpl->assign('editID',$editID);
		$tpl->assign('msg',$error);
	
}elseif($_POST['confirm']){
	$tpl->assign('msg','Your entry has been up-dated.');
	
}elseif($_POST['edit']){
	$id = $_POST['id'];
	$sql = "select * from faq where id = '$id'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);
		
	$editID = $rows['id'];
	$q = $rows['q'];
	$a = $rows['a'];
	$faqCatId = $rows['cat'];
	$faqCatTitle = get_value('title','faq_cats','id',$faqCatId);

	
	//set up preview pane
	$tpl->assign('editID',$editID);
	$tpl->assign('faqCatTitle',$faqCatTitle);
	$tpl->assign('faqCatId',$faqCatId);
	$tpl->assign('q',$q);
	$tpl->assign('a',$a);

	$tpl->assign('edit','true');
	
}elseif($_POST['delete']){
	$id = $_POST['id'];
	
	$sql = "delete from faq where id = '$id'";
	$query = mysql_query($sql);
}

?>