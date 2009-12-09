<?php
if($_POST['add'] || $_POST['update']){

	if (!$_POST['author'] || !$_POST['trip'] || !$_POST['date'] || !$_POST['body'] || !$_POST['pageID']){
		$error .= "Please fill in all the fields.\n";
	}elseif($_FILES['image'][name]){
		$error .= imageCheck('image');
	}
	
	$author = str_replace('"','&quot;',$_POST['author']);
	$trip = str_replace('"','&quot;',$_POST['trip']);
	$date = str_replace('"','&quot;',$_POST['date']);
	$body = $_POST['body'];
	$pageID = $_POST['pageID'];
	$picID = $_POST['picID'];
	$editID = $_POST['editID'];
	$display = $_POST['display'];

	if(!$error){
		
		if($_POST['update']){
			//make sure the entry is still in the database and if not return an error (gaursd againnst BACK button abuse)
			$sqlDouble = "select * from testimonials where id = '$editID'";
			$queryDouble = mysql_query($sqlDouble) or die(mysql_error());
			$numDouble = mysql_num_rows($queryDouble);
			if($numDouble == 0){
				$badEditID = "true";
			}
		}
				
		if(!$badEditID){

			reorder('testimonials',$editID,$display);
			
			//add slashes
			$author = addslashes($author);
			$trip = addslashes($trip);
			$date = addslashes($date);
			$body = addslashes($body);
	
			//creat the SQL depending on if we are in edit or add mode
			if($_POST['add']){
				$sql = "insert into testimonials (author, trip, date, body, pageID, picID, display) values ('$author', '$trip', '$date', '$body', '$pageID', '$picID', '$display')";
			}elseif($_POST['update']){
				$sql = "update testimonials set author = '$author', date = '$date', trip = '$trip', body = '$body', pageID = '$pageID'$picInsertSQL where id = '$editID'";
			}
			
			
			$query = mysql_query($sql)or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			
			if(!$_POST['editID']){
				$editID = mysql_insert_id();
			}
			
		}else{
			$tpl->assign('msg',"That entry is not in the  database any more.  You must have deleted it.");
		}
	}else{
		$tpl->assign('msg',$error);
	}	
	
	//set up preview pane
	$tpl->assign('editID',$editID);
	$tpl->assign('picID',$picID);
	$tpl->assign('imgName',$imgName);
	$tpl->assign('display',$display);
	$tpl->assign('author',stripslashes($author));
	$tpl->assign('trip',stripslashes($trip));
	$tpl->assign('pageID',$pageID);
	$tpl->assign('date',stripslashes($date));			
	$tpl->assign('body',stripslashes($body));
	$tpl->assign('edit','true');
	
}elseif($_POST['confirm']){
	$tpl->assign('msg','Your entry has been up-dated.');
	
}elseif($_POST['edit']){
	$id = $_POST['id'];
	$sql = "select * from testimonials where id = '$id'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);
		
	$editID = $rows['id'];
	$author = $rows['author'];
	$date = $rows['date'];
	$trip = $rows['trip'];
	$body = $rows['body'];
	$pageID = $rows['pageID'];
	$picID = $rows['picID'];
	$display = $rows['display'];
	
	$sql2 = "select * from images where id = '$picID'";
	$query2 = mysql_query($sql2);
	$rows2 = mysql_fetch_array($query2);
	$imgName = $rows2['name'];
	
	//set up preview pane
	$tpl->assign('editID',$editID);
	$tpl->assign('picID',$picID);
	$tpl->assign('imgName',$imgName);
	$tpl->assign('author',$author);
	$tpl->assign('date',$date);
	$tpl->assign('trip',$trip);
	$tpl->assign('body',$body);
	$tpl->assign('pageID',$pageID);
	$tpl->assign('display',$display);
	$tpl->assign('edit','true');
	
}elseif($_POST['delete']){
	$id = $_POST['id'];
	if($_POST['picID']){
	//if there is an image delete it frrom the db and remove it from the server
		$picID = $_POST['picID'];
		$image = get_value('name','images','id',$picID);
		$imagePath = "userimages/testimonials/".$image;
		unlink($imagePath);
		//clear image from db
		$sql = "delete from images where id = '$picID'";
		$query = mysql_query($sql);
	}	
	
	$sql = "delete from testimonials where id = '$id'";
	$query = mysql_query($sql);
}

?>