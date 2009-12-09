<?php
session_start();

//include all external files
require 'libs/Smarty.class.php';
require 'inc/functions.php';

//create new tpl object
$tpl = new smarty;

//define paramiters
$tpl->compile_check = true;
//$tpl->debugging = true;

$tpl->left_delimiter = "<%";
$tpl->right_delimiter = "%>";

// set local for money_format
setlocale(LC_ALL, 'en_US');

//open the database connection  and get the __CFG_config vars
db_connect();
include 'inc/get_config_vars.php';

//assign email for contact
$tpl->assign('contactEmail', __CFG_ContactEmail);

include 'scripts/pages/get_faq.php';
include 'scripts/pages/get_sidebar.php';
include 'scripts/reserve/cleanup_reservations.php';
include 'scripts/get_keywords.php';

//build site
if(isset($_REQUEST['mode'])){
if($_REQUEST['mode'] ==  "email"){
	include 'scripts/email_list/unsubscribe.php';
	
}elseif($_REQUEST['mode'] ==  "pages"){
	$page = $_REQUEST['page'];
	include 'scripts/pages/get_details.php';
	include 'scripts/pages/get_testimonials.php';
	include 'scripts/pages/get_standard.php';
	include 'scripts/pages/get_page_keywords.php';	
	$tpl->display('pages/standard.tpl');
	
}elseif($_REQUEST['mode'] ==  "testimonials"){
	include 'scripts/pages/get_testimonials.php';
	$tpl->display('pages/testimonials.tpl');
	
}elseif($_REQUEST['mode'] == "about"){
	$mode = 'page';
	$page ='about';
	include 'scripts/pages/get_standard.php';
	include 'scripts/pages/get_team.php';
	$tpl->display('pages/about.tpl');

}elseif($_REQUEST['mode'] ==  "contact"){
	include 'scripts/pages/get_contact.php';
	$tpl->display('pages/contact.tpl');
	
}elseif($_REQUEST['mode'] ==  "press"){
	include 'scripts/pages/get_press.php';
	$tpl->display('pages/press.tpl');
	
}elseif($_REQUEST['mode'] ==  "faq"){
	$tpl->display('pages/faq.tpl');

}elseif($_REQUEST['mode'] ==  "reserve_0"){
	include 'scripts/pages/get_reserve.php';
	$tpl->display('pages/reserve.tpl');

}elseif($_REQUEST['mode'] ==  "reserve"){
	include 'scripts/reserve/reservations.php';
	
}elseif($_REQUEST['mode'] == "email"){
	include 'scripts/pages/email.php';
	$tpl->display('pages/email.tpl');
	
}elseif($_REQUEST['mode'] ==  "gallery"){
	include 'scripts/pages/get_pages.php';
	include 'scripts/pages/get_images.php';
	$tpl->display('pages/gallery.tpl');
	
}elseif($_REQUEST['mode'] ==  "popup"){
	include 'scripts/pages/get_popup_image.php';
	$tpl->display('pages/popup.tpl');
	
}elseif($_REQUEST['mode'] ==  "tc"){
	$tpl->display('reserve/tc.tpl');

}elseif($_REQUEST['mode'] ==  "test_detect"){
	//include 'scripts/pages/get_popup_image.php';
	$tpl->display('pages/detection.tpl');


}elseif($_REQUEST['mode'] ==  "mm"){
	//include 'scripts/pages/get_mm.php';
	$tpl->display('pages/mm.tpl');
	
}else{
	
	if ($_REQUEST['mode'] == 'logout'){
		session_destroy();
		$tpl->display('index.tpl');
	}
	
	$mode = 'page';
	$page ='home';
	//include 'scripts/pages/get_details.php';
	include 'scripts/pages/get_testimonials.php';
	include 'scripts/pages/get_standard.php';
	$tpl->display('pages/standard.tpl');
}
}else{
	$mode = 'page';
	$page ='home';
	//include 'scripts/pages/get_details.php';
	include 'scripts/pages/get_testimonials.php';
	include 'scripts/pages/get_standard.php';
	$tpl->display('pages/standard.tpl');
	
}

?>
