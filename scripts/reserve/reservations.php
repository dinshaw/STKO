 <?php

//get config observer price
$observerPrice = __CFG_Observer_Price;
$tpl->assign('observerPrice',$observerPrice);

if(isset($_POST['action'])){
if($_POST['action'] == "reserve"){

	if($_POST['restart']){
		//delete the new, unpaid reservation and start a new one
		$resID = $_SESSION['resID'];
		$sql = "delete from reservations where id = '$resID' and status = '0'";
		$query = mysql_query($sql);
		session_destroy();
		
		include 'scripts/reserve/get_trips.php';
		$tpl->display('reserve/step1.tpl');
		exit;
	}
	
	include 'scripts/reserve/error_check.php';

	if($_POST['step1'] || $_POST['save1']){
		
		if(!$error){
			
			include 'scripts/reserve/process_step1.php';
			include 'scripts/reserve/get_res_overview_info.php';
			
			if($_POST['step1']){
				//if the user is registering goto step2
				$tpl->display('reserve/step2.tpl');
				
			}elseif($_POST['save1']){
			
				include 'scripts/reserve/get_cust_info.php';
				include 'scripts/reserve/get_res_info.php'; 
				//if the  user is editing redisplay step3
				$tpl->display('reserve/step3.tpl');
			}

		}else{
			//show the trips again
			include 'scripts/reserve/get_trips.php';
			
			//return step1 errors
			$tpl->assign('error',$error);
			
			if($_POST['save1']){
				$tpl->assign('edit',"true");
			}
			//if the user is registering redisplay step1
			$tpl->display('reserve/step1.tpl');
		}
		
	}elseif($_POST['step2'] || $_POST['save2']){
	
		if(!$error){
		
			include 'scripts/reserve/process_step2.php';
			
			include 'scripts/reserve/get_cust_info.php';
			
			include 'scripts/reserve/get_res_info.php';
			
			$tpl->display('reserve/step3.tpl');
			
		}else{
		
			include 'scripts/reserve/get_res_overview_info.php';
			
			//return step2 errors
			$tpl->assign('error',$error);
			
			if($_POST['save2']){
				$tpl->assign('edit',"true");
			}
			
			$tpl->display('reserve/step2.tpl');
			
		}
	}elseif($_POST['edit1']){
		include 'scripts/reserve/get_trips.php';
		include 'scripts/reserve/get_res_info.php';
		$tpl->assign('edit','true');
		$tpl->display('reserve/step1.tpl');
	
	}elseif($_POST['edit2']){
		include 'scripts/reserve/get_cust_info.php';
		$tpl->assign('edit','true');
		$tpl->display('reserve/step2.tpl');
		
	}
	
}elseif($_POST['action'] == "pay"){
	include 'scripts/reserve/error_check.php';
	include 'scripts/reserve/get_cust_info.php';
	include 'scripts/reserve/get_res_info.php';
	
	if($_POST['cc']){
		
		if(!$error){
			include 'scripts/reserve/payment/payment.php';
		}else{
			//return cc errors
			$tpl->assign('error',$error);
			$tpl->display('reserve/step3.tpl');
		}
		
	}elseif($_POST['check']){
		include 'scripts/reserve/payment/payment.php';
		
	}elseif($_POST['success']){
		include 'scripts/reserve/payment/payment.php';
		
	}elseif($_POST['fail']){
		$tpl->assign('error','Failure will return the error associated with the failure');
		$tpl->display('reserve/step3.tpl');
		
	}elseif($_POST['pay']){
		include 'scripts/reserve/payment/payment.php';
	}
	
}else{
	include 'scripts/reserve/get_trips.php';
	$tpl->display('reserve/step1.tpl');
}
}else{
	include 'scripts/reserve/get_trips.php';
	$tpl->display('reserve/step1.tpl');
}



?>