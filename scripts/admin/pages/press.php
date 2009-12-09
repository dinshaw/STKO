<?php
if($_POST['add'] || $_POST['update']){
	if (!$_POST['title'] || !$_POST['body']){
		$error .= "Please fill in all the fields.\n";
	}elseif($_FILES['image'][name]){
		$error .= imageCheck('image');
	}
	
	$title = str_replace('"','&quot;',$_POST['title']) ;
	$body = $_POST['body'];
	$picID = $_POST['picID'];
	$editID = $_POST['editID'];
	$display = $_POST['display'];
		
	if(!$error){
		
		
		if($_POST['update']){
			//make sure the entry is still in the database and if not return an error (gaursd againnst BACK button abuse)
			$sqlDouble = "select * from press where id = '$editID'";
			$queryDouble = mysql_query($sqlDouble);
			$numDouble = mysql_num_rows($queryDouble);
			if($numDouble == 0){
				$badEditID = "true";
			}
		}
				
		if(!$badEditID){
			//remove the image if it is checked
			if($_POST['removeImage'] == "true"){
				$image = get_value('name','images','id',$picID);
				$imagePath = "userimages/press/".$image;
				unlink($imagePath);
				//clear image from db
				$sql = "delete from images where id = '$picID'";
				$query = mysql_query($sql);
				//clear picID from press  table
				$sql = "update press set picID = NULL where id = '$editID'";
				$query = mysql_query($sql);
				
			}elseif($_FILES['image'][name]){
				//if we are updteing, check for the new image and erase the old one if it is there
				if($_POST['update'] && $_POST['picID']){
					//delete image frrom the db and remove it from the server
					$image = get_value('name','images','id',$picID);
					$imagePath = "userimages/press/".$image;
					unlink($imagePath);
					//clear image from db
					$sql = "delete from images where id = '$picID'";
					$query = mysql_query($sql);
				}
				
				//put new image in db and folder
				$dest = __CFG_Image_Path.'press/';
				$picID = imageUpload('image',$dest,NULL,NULL,NULL,NULL,NULL);
				$imgName = $picID . "-" . $_FILES['image'][name];
				
				//apend SQL statemaent with picID update if ther is a new pic
				$picInsertSQL =  ", picID = '$picID'";
			}else{
				//assign the exsisting image to the preview if the image was not updated
				$imgName = get_value('name','images','id',$picID);
			}
			

			reorder('press',$editID,$display);
			
			//add slashes
			$title = addslashes($title);
			$body = addslashes($body);
			
			//creat the SQL depending on if we are in edit or add mode
			if($_POST['add']){
				$sql = "insert into press (title, body, picID, display) values ('$title', '$body', '$picID', '$display')";
			}elseif($_POST['update']){
				$sql = "update press set title = '$title', body = '$body'$picInsertSQL where id = '$editID'";
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
	
		
	$tpl->assign('title',stripslashes($title));
	$tpl->assign('body',stripslashes($body));
	$tpl->assign('editID',$editID);
	$tpl->assign('picID',$picID);
	$tpl->assign('imgName',$imgName);
	$tpl->assign('display',$display);
	$tpl->assign('edit','true');
	
}elseif($_POST['confirm']){
	$tpl->assign('msg','Your entry has been up-dated.');
	
}elseif($_POST['edit']){
	$id = $_POST['id'];
	$sql = "select * from press where id = '$id'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);
		
	$editID = $rows['id'];
	$title = $rows['name'];
	$body = $rows['text'];
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
	$tpl->assign('title',$title);
	$tpl->assign('body',$body);
	$tpl->assign('display',$display);
	$tpl->assign('edit','true');
	
}elseif($_POST['delete']){
	$id = $_POST['id'];
	if($_POST['picID']){
	//if there is an image delete it frrom the db and remove it from the server
		$picID = $_POST['picID'];
		$image = get_value('name','images','id',$picID);
		$imagePath = "userimages/press/".$image;
		unlink($imagePath);
		//clear image from db
		$sql = "delete from images where id = '$picID'";
		$query = mysql_query($sql);
	}	
	
	$sql = "delete from press where id = '$id'";
	$query = mysql_query($sql);
}

?>