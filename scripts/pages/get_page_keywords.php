<?php
//$home = array("Stockton Outfitters, LLC","Elk hunting outfitters","elk outfitters","hunting outfitters","Montana guided hunts","Montana hunting");

$archery_elk  = array("Elk Archery Hunting","Montana archery elk hunting","guided elk hunts","elk bow hunts","guided elk hunts Montana","Montana elk archery hunting");

$rifle_elk = array("Montana Elk Hunts","Montana elk hunting","Montana elk hunt","Montana guided elk hunts","Montana guided elk hunt","guided elk hunts");

$deer = array("Guided Deer Hunts","Montana mule deer hunt","Montana deer hunting","Montana mule deer hunting","mule deer hunting","mule deer hunting montana");

$bear = array("Bear Hunting","spring bear hunting","black bear hunting","Montana bear hunting","Montana spring bear hunting","guided spring bear hunts");

if(isset($title)){
	switch (true) {
	  case preg_match("/archery/i", $title):
	    $keywords = $archery_elk;
	  break;
	  case preg_match("/rifle/i", $title):
	    $keywords = $rifle_elk;
	  break;
	  case preg_match("/bear/i", $title):
	    $keywords = $bear;
	  break;
	  case preg_match("/deer/i", $title):
	    $keywords = $deer;
	  break;
	  default:
	    $keywords = $home;
	  break;
	}
	$keyword_string = implode(",",$keywords);
}
$tpl->assign('keyword_string',$keyword_string);
?>