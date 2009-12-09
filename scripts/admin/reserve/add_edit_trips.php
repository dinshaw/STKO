<?php
if($_POST['add'] || $_POST['update']){

	include 'scripts/admin/reserve/error_check.php';
	
	$start_date = $_POST['year'] . "-" . $_POST['startMonth'] . "-" . $_POST['startDay'];
	$end_date = $_POST['year'] . "-" . $_POST['endMonth'] . "-" . $_POST['endDay'];
		
	if(!$error){
		
		$type_id = $_POST['type_id'];
		$spots = $_POST['spots'];
		$status = $_POST['status'];
		$editID = $_POST['editID'];
		
		//make sure the entry is still in the database and if not return an error (gaursd againnst BACK button abuse)
		if($_POST['update']){
			$sqlDouble = "select * from trips where id = '$editID'";
			$queryDouble = mysql_query($sqlDouble);
			$numDouble = mysql_num_rows($queryDouble);
			if($numDouble == 0){
				$badEditID = "true";
			}
		}
				
		if(!$badEditID){			
			//creat the SQL depending on if we are in edit or add mode
			if($_POST['add']){
				$sql = "INSERT INTO trips (type_id, start_date, end_date, spots, status) VALUES ('$type_id', '$start_date', '$end_date', '$spots', '1')";
				
			}elseif($_POST['update']){
				$sql = "UPDATE trips SET type_id = '$type_id', start_date = '$start_date', end_date = '$end_date', spots = '$spots', status = '$status' WHERE id = '$editID'";
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
	$tpl->assign('type_id',$_POST['type_id']);
	$tpl->assign('start_date',$start_date);
	$tpl->assign('startMonth',$_POST['startMonth']);
	$tpl->assign('startDay',$_POST['startDay']);
			
	$tpl->assign('end_date',$end_date);
	$tpl->assign('endMonth',$_POST['endMonth']);
	$tpl->assign('endDay',$_POST['endDay']);
	
	$tpl->assign('year',$_POST['year']);
	$tpl->assign('spots',$_POST['spots']);
	$tpl->assign('status',$_POST['status']);
	
	if(!$editID && $_POST['editID']){
		$editID = $_POST['editID'];
	}
	$tpl->assign('editID',$editID);

	$tpl->assign('msg',$error);
		
}elseif($_POST['confirm']){
	$tpl->assign('msg','Your entry has been up-dated.');
	
}elseif($_POST['edit']){
	$id = $_POST['id'];
	$sql = "SELECT * FROM trips where id = '$id'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);
	
	$type_id = $rows['type_id'];
	$start_date = $rows['start_date'];
	$end_date = $rows['end_date'];
	list($year,$startMonth, $startDay) = split("-",$start_date,3);
	list($endYear,$endMonth, $endDay) = split("-",$end_date,3);
	
	$spots = $rows['spots'];
	$status = $rows['status'];
	
	//set up preview pane
	$tpl->assign('type_id',$type_id);
	
	$tpl->assign('year',$year);
	
	$tpl->assign('startDay',$startDay);
	$tpl->assign('startMonth',$startMonth);
	$tpl->assign('start_date',$start_date);
	
	$tpl->assign('endMonth',$endMonth);
	$tpl->assign('endDay',$endDay);
	$tpl->assign('end_date',$end_date);
	
	$tpl->assign('spots',$spots);
	$tpl->assign('status',$status);

	$tpl->assign('editID',$id);
	
}elseif($_POST['delete']){
	$id = $_POST['id'];
	$sql = "DELETE FROM trips WHERE id = '$id'";
	$query = mysql_query($sql);
}

?>