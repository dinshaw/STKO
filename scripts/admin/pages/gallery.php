<?php
//get the number of images in each unique page - sub_page combo
$countSql = "select count(*) AS 'total', CONCAT(page,'_',sub_page,'Count') AS 'page' from images group by page, sub_page";
$countQuery = mysql_query($countSql);
while($rows = mysql_fetch_array($countQuery)){
	${$rows['page']} = $rows['total'];
	$tpl->assign($rows['page'],$rows['total']);
}

if($_POST['add'] || $_POST['update']){
	if($_FILES['image'][name]){
		$error .= imageCheck('image');
	}
	
	$title = str_replace('"','&quot;',$_POST['title']);
	$caption = str_replace('"','&quot;',$_POST['caption']);
	$picID = $_POST['picID'];
	$editID = $_POST['editID'];
	$display = $_POST['display'];
	$currPage = $_POST['currPage'];
	$page = $_POST['page'];
	$sub_page = $_POST['sub_page'];
	
	
	if(!$error){
		
		if($_POST['update']){
			//make sure the entry is still in the database and if not return an error (gaursd againnst BACK button abuse)
			$sqlDouble = "select * from images where id = '$editID'";
			$queryDouble = mysql_query($sqlDouble);
			$numDouble = mysql_num_rows($queryDouble);
			if($numDouble == 0){
				$badEditID = "true";
			}
		}
				
		if(!$badEditID){
			//if we are updteing, check for the new image and erase the old one if it is there
			if($_FILES['image'][name]){
				
				if($_POST['update'] && $_POST['picID']){
					//delete image frrom the db and remove it from the server
					$image = get_value('name','images','id',$picID);
					$imagePath = "userimages/pages/".$page."/".$image;
					unlink($imagePath);
					//clear image from db
					$sql = "delete from images where id = '$picID'";
					$query = mysql_query($sql);
				}
				
				//put new image in db and folder
				$dest = __CFG_Image_Path."pages/".$page.'/';
				$picID = imageUpload('image',$dest,$page,$sub_page,$display,$title,$caption);
				$imgName = $picID . "-" . $_FILES['image'][name];
				
				//apend SQL statemaent with picID update if ther is a new pic
				$picInsertSQL =  ", picID = '$picID'";
			}else{
				//assign the exsisting image to the preview if the image was not updated
				$imgName = get_value('name','images','id',$picID);
			}
			
			//if the page has changed we need to move the pic to that directory
			if($_POST['update'] && $_POST['currPage'] != $_POST['page']){
				copy(__CFG_Image_Path."pages/".$_POST['currPage']."/".$imgName,__CFG_Image_Path."pages/".$_POST['page']."/".$imgName);
				
				//delete old image
				$image = get_value('name','images','id',$picID);
				$imagePath = "userimages/pages/".$_POST['currPage']."/".$image;
				unlink($imagePath);	 
			}
			

			reorder('team',$editID,$display);

			//if magic quotes is off
			$title = addslashes($title);
			$caption = addslashes($caption);
		
						
			//creat the SQL depending on if we are in edit or add mode
			if($_POST['update']){
				$sql = "update images set title = '$title',page = '$page', sub_page = '$sub_page', caption = '$caption' where id = '$editID'";
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

	$tpl->assign('editID',$editID);
	$tpl->assign('picID',$picID);
	$tpl->assign('imgName',$imgName);
	$tpl->assign('title',stripslashes($title));
	$tpl->assign('caption',stripslashes($caption));
	$tpl->assign('display',$display);
	$tpl->assign('page',$page);
	$tpl->assign('sub_page',$sub_page);
	$tpl->assign('sectionCount',$sectionCount);
	$tpl->assign('edit','true');
	$tpl->assign('msg',$error);
	
}elseif($_POST['confirm']){
	unset($page);
	$tpl->assign('msg','Your entry has been up-dated.');
	
	
}elseif($_POST['edit']){
	$id = $_POST['id'];
	$sql = "select * from images where id = '$id'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);
	
	
	$picID = $rows['id'];
	$editID = $rows['id'];
	$title = $rows['title'];
	$imgName = $rows['name'];
	$caption = $rows['caption'];
	$display = $rows['display'];
	$page = $rows['page'];
	$sub_page = $rows['sub_page'];
	
	$sectionCount = ${$rows['page'].'_'.$rows['sub_page'].'Count'};
	//set up preview pane
	$tpl->assign('editID',$editID);
	$tpl->assign('picID',$picID);
	$tpl->assign('imgName',$imgName);
	$tpl->assign('title',$title);
	$tpl->assign('caption',$caption);
	$tpl->assign('display',$display);
	$tpl->assign('page',$page);
	$tpl->assign('sub_page',$sub_page);
	$tpl->assign('sectionCount',$sectionCount);
	$tpl->assign('edit','true');
	
}elseif($_POST['delete']){
	$id = $_POST['id'];
	$page = $_POST['page'];
	//if there is an image remove it from the server
	$image = get_value('name','images','id',$id);
	$imagePath = "userimages/pages/".$page."/".$image;
	unlink($imagePath);
	//clear image from db
	$sql = "delete from images where id = '$id'";
	$query = mysql_query($sql);
}
?>