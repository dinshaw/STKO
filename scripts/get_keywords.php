<?php
$home = array("Stockton Outfitters, LLC","Elk hunting outfitters","elk outfitters","hunting outfitters","Montana guided hunts","Montana hunting");

$about_us = array("Hunting Guides","Montana elk hunting guides","Montana hunting guide","Montana elk hunting outfitters","Bear hunting guide","Archery hunting guides");

if(isset($title)){
	switch (true) {
	  case preg_match("/home/i", $title):
	    $keywords = $home;
	  break;
	  case preg_match("/about/i", $title):
	    $keywords = $about;
	  break;
	  default:
	    $keywords = $home;
	  break;
	}
	$keyword_string = implode(",",$keywords);
	$tpl->assign('keyword_string',$keyword_string);	
}
?>