<?php

if($_POST['add'] || $_POST['update']){
	//remove \n, \r from description and peaksPasses for the rte (javascript)
	$badStrings = array("\n","\r");
	$description = $_POST['description'];
	$peaksPasses = $_POST['peaksPasses'];
	$description = str_replace($badStrings,"",$description);
	$peaksPasses = str_replace($badStrings,"",$peaksPasses);
	
	
	
	include 'scripts/admin/reserve/error_check.php';
	
	if(!$error){
		$tripType = $_POST['tripType'];
		//RTE $description = $_POST['description'];
		$price1 = $_POST['price1'];
		$price2 = $_POST['price2'];
		$price1_desc = $_POST['price1_desc'];
		$price2_desc = $_POST['price2_desc'];
		//get the page ids into a comma separated string
		$page_id = implode(",",$_POST['page_id']);
		$location = $_POST['location'];
		$seasonStartMonth = $_POST['seasonStartMonth'];
		$seasonEndMonth = $_POST['seasonEndMonth'];
		$seasonStartDay = $_POST['seasonStartDay'];
		$seasonEndDay = $_POST['seasonEndDay'];
		$duration = $_POST['duration'];
		$availability = $_POST['availability'];
		$departs = $_POST['departs'];
		$camp = $_POST['camp'];
		$accommodations = $_POST['accommodations'];
		$species = $_POST['species'];
		$editID = $_POST['editID'];
		
		
		/// RTE $peaksPasses = $_POST['peaksPasses'];
		//make sure the entry is still in the database and if not return an error (gaursd againnst BACK button abuse)
		if($_POST['update']){
			$sqlDouble = "select * from trip_types where id = '$editID'";
			$queryDouble = mysql_query($sqlDouble);
			$numDouble = mysql_num_rows($queryDouble);
			if($numDouble == 0){
				$badEditID = "true";
			}
		}
				
		if(!$badEditID){			
			
			//creat the SQL depending on if we are in edit or add mode
			if($_POST['add']){
				$sql = "INSERT INTO trip_types (type, description, price1, price1_desc, price2, price2_desc, location, duration, departs, accommodations, camp, species, seasonStart, seasonEnd, peaksPasses, page_id) VALUES ('$tripType', '$description', '$price1', '$price1_desc', '$price2', '$price2_desc', '$location', '$duration', '$departs', '$accommodations', '$camp', '$species', CONCAT(year(now()),'-','$seasonStartMonth','-','$seasonStartDay'), CONCAT(year(now()),'-','$seasonEndMonth','-','$seasonEndDay'), '$peaksPasses', '$page_id')";
				
			}elseif($_POST['update']){
				$sql = "UPDATE trip_types SET type = '$tripType', description = '$description', price1 = '$price1', price1_desc = '$price1_desc', price2 = '$price2', price2_desc = '$price2_desc', location = '$location', duration = '$duration', departs = '$departs', accommodations = '$accommodations', camp = '$camp', species = '$species', seasonStart =  CONCAT(year(now()),'-','$seasonStartMonth','-','$seasonStartDay'), seasonEnd = CONCAT(year(now()),'-','$seasonEndMonth','-','$seasonEndDay'), peaksPasses = '$peaksPasses', page_id = '$page_id' WHERE id = '$editID'";
			}
			
			
			$query = mysql_query($sql)or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			
			if($_POST['add']){
				$editID = mysql_insert_id();
			}
			
		}else{
			$tpl->assign('msg',"That entry is not in the  database any more.  You must have deleted it.");
		}
		
	}else{
		
		$tpl->assign('msg',$error);
		
	}	
	
	//set up preview pane
	$tpl->assign('tripType',$_POST['tripType']);
	$tpl->assign('description',$description);
	$tpl->assign('price1',$_POST['price1']);
	$tpl->assign('price2',$_POST['price2']);
	$tpl->assign('price1_desc',$_POST['price1_desc']);
	$tpl->assign('price2_desc',$_POST['price2_desc']);
	$tpl->assign('page_id',$_POST['page_id']);
	$tpl->assign('location',$_POST['location']);
	$tpl->assign('seasonStartMonth',$_POST['seasonStartMonth']);
	$tpl->assign('seasonEndMonth',$_POST['seasonEndMonth']);
	$tpl->assign('seasonStartDay',$_POST['seasonStartDay']);
	$tpl->assign('seasonEndDay',$_POST['seasonEndDay']);
	//create seasonStart and End for display
	$seasonStart = date(Y) . "-" . $_POST['seasonStartMonth'] . "-" . $_POST['seasonStartDay'];
	$tpl->assign('seasonStart',$seasonStart);
	$seasonEnd = date(Y) . "-" . $_POST['seasonEndMonth'] . "-" . $_POST['seasonEndDay'];
	$tpl->assign('seasonEnd',$seasonEnd);
	$tpl->assign('duration',$_POST['duration']);
	$tpl->assign('departs',$_POST['departs']);
	$tpl->assign('camp',$_POST['camp']);
	$tpl->assign('accommodations',$_POST['accommodations']);
	$tpl->assign('species',$_POST['species']);
	$tpl->assign('peaksPasses',$peaksPasses);
	
	if(!$editID && $_POST['editID']){
		$editID = $_POST['editID'];
	}
	$tpl->assign('editID',$editID);

	$tpl->assign('msg',$error);
		
}elseif($_POST['confirm']){
	$tpl->assign('msg','Your entry has been up-dated.');
	
}elseif($_POST['edit']){
	$id = $_POST['id'];
	$sql = "SELECT * FROM trip_types where id = '$id'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);
	
	$tripType = $rows['type'];
	$description = $rows['description'];
	$price1 = $rows['price1'];
	$price2 = $rows['price2'];
	$price1_desc = $rows['price1_desc'];
	$price2_desc = $rows['price2_desc'];
	$page_id = explode(",",$rows['page_id']);
	$location = $rows['location'];
	list($seasonStartYear, $seasonStartMonth, $seasonStartDay) = split("-", $rows['seasonStart'],3);
	list($seasonEndYear,$seasonEndMonth, $seasonEndDay) = split("-", $rows['seasonEnd'],3);
	$duration = $rows['duration'];
	$departs = $rows['departs'];
	$camp = $rows['camp'];
	$accommodations = $rows['accommodations'];
	$species = $rows['species'];
	$peaksPasses = $rows['peaksPasses'];
	$editID = $id;

	//set up preview pane
	$tpl->assign('tripType',$tripType);
	$tpl->assign('description',$description);
	$tpl->assign('price1',$price1);
	$tpl->assign('price2',$price2);
	$tpl->assign('price1_desc',$price1_desc);
	$tpl->assign('price2_desc',$price2_desc);
	$tpl->assign('page_id',$page_id);
	$tpl->assign('location',$location); 
	$tpl->assign('seasonStartMonth',$seasonStartMonth);
	$tpl->assign('seasonEndMonth',$seasonEndMonth);
	$tpl->assign('seasonStartDay',$seasonStartDay);
	$tpl->assign('seasonEndDay',$seasonEndDay);
	//create seasonStart and End for display
	$seasonStart = date(Y) . "-" . $seasonStartMonth . "-" . $seasonStartDay;
	$tpl->assign('seasonStart',$seasonStart);
	$seasonEnd = date(Y) . "-" . $seasonEndMonth . "-" . $seasonEndDay;
	$tpl->assign('seasonEnd',$seasonEnd);
		
	$tpl->assign('duration',$duration);
	$tpl->assign('departs',$departs);
	$tpl->assign('camp',$camp);
	$tpl->assign('accommodations',$accommodations);
	$tpl->assign('species',$species);
	$tpl->assign('peaksPasses',$peaksPasses);
	$tpl->assign('editID',$editID);
	
}elseif($_POST['delete']){
	$id = $_POST['id'];
	$sql = "DELETE FROM trip_types WHERE id = '$id'";
	$query = mysql_query($sql);
}

?>