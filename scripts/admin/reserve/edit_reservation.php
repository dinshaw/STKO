<?php
if($_REQUEST['status']){
	$resID = $_REQUEST['resID'];
	if($_REQUEST['status'] == "delete"){
		
		$sql = "DELETE FROM reservations WHERE id = '$resID'";
		$query = mysql_query($sql);
		
	}else{
		

		$status = $_REQUEST['status'];
		$sql = "UPDATE reservations SET status = '$status' WHERE id = '$resID'";
		$query = mysql_query($sql);
	}
		
}elseif($_REQUEST['view']){
			$resID = $_POST['resID'];
			include 'scripts/reserve/get_res_info.php';	
			include 'scripts/reserve/get_cust_info.php';
			$tpl->assign('adminUser','true');
			$tpl->display('reserve/step3.tpl');
			exit;

}elseif($_REQUEST['save1']){
		$resID = $_POST['resID'];
		$custID = $_POST['custID'];
		include 'scripts/reserve/error_check.php';
		include 'scripts/admin/reserve/process_step1.php';
		include 'scripts/reserve/get_res_info.php';
		include 'scripts/reserve/get_cust_info.php';
		$tpl->assign('edit','true');
		$tpl->assign('adminUser','true');
		$tpl->display('reserve/step3.tpl');
		exit;

}elseif($_REQUEST['save2']){
		$resID = $_POST['resID'];
		$custID = $_POST['custID'];
		include 'scripts/reserve/error_check.php';
		include 'scripts/admin/reserve/process_step2.php';
		include 'scripts/reserve/get_cust_info.php';
		include 'scripts/reserve/get_res_info.php';
		$tpl->assign('edit','true');
		$tpl->assign('adminUser','true');
		$tpl->display('reserve/step3.tpl');
		exit;

}elseif($_POST['edit1']){
		$resID = $_POST['resID'];
		include 'scripts/reserve/get_trips.php';
		include 'scripts/reserve/get_res_info.php';
		$tpl->assign('custID',$custID);
		$tpl->assign('resID',$resID);
		$tpl->assign('edit','true');
		$tpl->assign('adminUser','true');
		$tpl->display('reserve/step1.tpl');
		exit;
		
}elseif($_POST['edit2']){
		$resID = $_POST['resID'];
		$custID = $_POST['custID'];
		include 'scripts/reserve/get_cust_info.php';
		$tpl->assign('custID',$custID);
		$tpl->assign('resID',$resID);
		$tpl->assign('edit','true');
		$tpl->assign('adminUser','true');
		$tpl->display('reserve/step2.tpl');
		exit;
		
}
		


?>