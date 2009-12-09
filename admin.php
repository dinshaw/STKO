<?php
session_start();

//include all external files
require 'libs/Smarty.class.php';
require 'inc/functions.php';

//create new tpl object
$tpl = new smarty;

//define paramiters
$tpl->compile_check = true;
$tpl->left_delimiter = "<%";
$tpl->right_delimiter = "%>";
//$tpl->debugging = true;


//open the database connection  and get the __CFG_config vars
db_connect();
include 'inc/get_config_vars.php';
include 'scripts/reserve/cleanup_reservations.php';

//build site	
if ($_SESSION['dinshaw_admin_ses']){
	$username = $_SESSION['dinshaw_admin_ses'];
	$id = $_SESSION['dinshaw_admin_id'];
	$tpl->assign('adminName',$username);
	$tpl->assign('adminID',$id);


	
	if($_REQUEST['mode'] == "users"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/users/users.php";
		
	}elseif($_REQUEST['mode'] == "email"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/email/post_emails.php";
		
	}elseif($_REQUEST['mode'] == "accounts"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/accounts/accounts.php";
		
	}elseif($_REQUEST['mode'] == "menu"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/pages/menu.php";
		
	}elseif($_REQUEST['mode'] == "details"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/pages/details.php";
		$tpl->display('admin/pages/details.tpl');
		
	}elseif($_REQUEST['mode'] == "testimonials"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/pages/testimonials.php";
		include "scripts/pages/get_testimonials.php";
		$tpl->display('admin/pages/testimonials.tpl');
		
	}elseif($_REQUEST['mode'] == "pages"){ //with an "S"
		include "scripts/admin/pages/pages.php";
		include 'scripts/pages/get_pages.php';
		$tpl->display('admin/pages/pages.tpl');
		
	}elseif($_REQUEST['mode'] == "gallery"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/pages/gallery.php";
		include 'scripts/pages/get_images.php';
		$tpl->display('admin/pages/gallery.tpl');
		
	}elseif($_REQUEST['mode'] == "page"){// no "s"
		$page = $_REQUEST['page'];
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/pages/standard.php";
		$tpl->display('admin/pages/standard.tpl');
		
	}elseif($_REQUEST['mode'] == "team"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/pages/team.php";
		include 'scripts/pages/get_team.php';
		$tpl->display('admin/pages/team.tpl');
	
	}elseif($_REQUEST['mode'] == "press"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/pages/press.php";
		include 'scripts/pages/get_press.php';
		$tpl->display('admin/pages/press.tpl');
		
	}elseif($_REQUEST['mode'] == "faq"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/pages/faq.php";
		include 'scripts/pages/get_faq.php';
		$tpl->display('admin/pages/faq.tpl');
		
	}elseif($_REQUEST['mode'] == "config"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/config/config.php";
		
	}elseif($_REQUEST['mode'] == "sidebar"){
		include 'scripts/pages/get_pages.php';
		include "scripts/admin/pages/sidebar.php";
		include 'scripts/pages/get_sidebar.php';
		$tpl->display('admin/pages/sidebar.tpl');
	
	}elseif($_REQUEST['mode'] == "tripTypes"){
		include 'scripts/pages/get_pages.php';
		include 'scripts/admin/reserve/add_edit_tripTypes.php';
		include 'scripts/admin/reserve/get_tripTypes.php';
		$tpl->display('admin/reserve/tripTypes.tpl');
		
	}elseif($_REQUEST['mode'] == "trips"){
		include 'scripts/admin/reserve/get_tripTypes.php';
		include 'scripts/admin/reserve/add_edit_trips.php';
		include 'scripts/admin/reserve/get_trips.php';
		$tpl->display('admin/reserve/trips.tpl');
		
	}elseif($_REQUEST['mode'] == "bookings"){
		include 'scripts/admin/reserve/edit_reservation.php';
		include 'scripts/admin/reserve/get_reservations.php';
		$tpl->display('admin/reserve/bookings.tpl');
		
	}else{
		include 'scripts/pages/get_pages.php';
		$tpl->display('admin/admin_home.tpl');
	}

}else{
	include 'scripts/pages/get_pages.php';
	include 'scripts/admin/adminLogin.php';
}


//option to log out
if($_GET['mode'] == 'logout' || $_POST['mode'] == 'logout'){
	session_destroy();
}
	
?>
