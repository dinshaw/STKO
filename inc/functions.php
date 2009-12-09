<?php

/****************
or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
*****************/

require_once("inc/db_config.php");

//works on any table witha column of 'display INT(11)'
function reorder($table,$id,$display){
	//get old display order value to knnow where to start alterinng the other display values
	$sql = "select display from $table where id = '$id'";
	$query = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($query);
	$old = $row['display'];
	
	//if the order has been changed and it is not a new entry
	if($old && $old != $display){
		//if the item is moving DOWN the old value ($old) is LESS than the new ($display)
		if($old < $display){
			$sql = "update $table set display=display-1 where display > '$old' and display <= '$display'";
		//if the item is moving UP the old value ($old) is GREATER than the new ($display)
		}elseif($old > $display){
			$sql = "update $table set display=display+1 where display < '$old' and display >= '$display'";
		}
		$query = mysql_query($sql) or die(mysql_error());
		
		//finnally, change the the $old value to $display to fill the hole
		$sql = "update $table set display = '$display' where id = '$id'";
		$query = mysql_query($sql) or die(mysql_error());
	}
}
	
	
	
function textformat($val){
	$val = stripslashes($val);
	$val = ereg_replace('"', '&quot;', $val);
	return $val;
}

function print_array($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

function get_id($table,$field,$name){
	$sql = "select id from $table where $field = '$name'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);
	$id = $rows['id'];
	return $id;
}

function get_value($value,$table,$field,$id){
	$sql = "select $value from $table where $field = '$id'";			
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);
	$result = $rows[$value];
	return $result;
}



function imageCheck($image){
	if($_FILES[$image]['type'] != "image/gif" && $_FILES[$image]['type'] != "image/jpg" && $_FILES[$image]['type'] != "image/jpeg" && $_FILES[$image]['type'] != "image/JPEG" && $_FILES[$image]['type'] != "image/pjpeg"){
		$type = $_FILES[$image]['type'];
		$error .= "Wrong type of file to upload.  That was a $type. It has to be a gif or a jpg.\n";
		return $error;
	}elseif($_FILES[$image]['size'] > '1049000'){
		$error .= "That file was way too big.  Keep it under 1MB.";	
		return $error;	
	}
}

function imageUpload($image,$dest,$page,$sub_page,$display,$imgTitle,$caption){
	if ($_FILES[$image]['name'] != ""){
		//echo $_FILES[$image]['name'];
		$imageName = $_FILES[$image]['name'];
		//echo $imageName;
		$size = getimagesize($_FILES[$image]['tmp_name']);
		$width = $size[0];
		$height = $size[1];
		//echo "width: ".$width."<br />";
		//echo "height: ".$height."<br />";
		//echo $imageName;
		$sql = "insert into images (w,h,page,sub_page,display,title,caption) values ('$width', '$height','$page','$sub_page','$display','$imgTitle','$caption')";
			mysql_query($sql)or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			
		$imageID = mysql_insert_id();
		$imageName = $imageID."-".$imageName;
		$dest .= $imageName;
		if (move_uploaded_file($_FILES[$image]['tmp_name'], $dest)){	
			$sql = "update images set name = '$imageName' where id = '$imageID'";
			mysql_query($sql)or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
		return $imageID;
		} else {
		   return 0;
		}	
	}
}

	



 function birthday_calc ($year,$m,$d)
{
/*  calculates someone's age.
$year - year you were born
$m - month you were born
$d - day you were born    */

$res1 = date("Y") - $year;
$res2 = date("m") - $m;
$res3 = date("j") - $d;


	if ($res2<0 || $res3<0) echo "Your age: " .  ($res1-1); // prints age

	// if the result of the rest of the months or days is negative,
	// I owe you a month or day, so your age has not yet changed this year.

	else echo 'Your age: ' . $res1; // prints age

}  // end function

// validate an email
function valid_email($address)
{
  // check an email address is possibly valid
  if (ereg("^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $address))
    return true;
  else 
    return false;
}

function random_string($min_length, $max_length)
// grab a random word from dictionary between the two lengths
// and return it
{
   // generate a random word
  $word = "";
  $dictionary = "/usr/share/dict/words";  // the ispell dictionary
  $fp = fopen($dictionary, "r");
  $size = filesize($dictionary);

  // go to a random location in dictionary
  srand ((double) microtime() * 1000000);
  $rand_location = rand(0, $size);
  fseek($fp, $rand_location);

  // get the next whole word of the right length in the file
  while (strlen($word)< $min_length || strlen($word)>$max_length) 
  {  
     if (feof($fp))   
        fseek($fp, 0);        // if at end, go to start
     $word = fgets($fp, 80);  // skip first word as it could be partial
     $word = fgets($fp, 80);  // the potential password
  };
  $word=trim($word); // trim the trailing \n from fgets
  
  srand ((double) microtime() * 1000000);
  $rand_number = rand(0, 999); 
  $word .= $rand_number;
  return $word;  
}

//build email functions
function multipart_email_headers($boundary){
	$headers = "From: ".__CFG_Admin_EmailName." <".__CFG_Admin_Email.">\n" 
			. "Content-Type: multipart/alternative; boundary=\"".$boundary."\"\n"
			. "MIME-Version: 1.0\n"
			. "Return-path: <".__CFG_Admin_Email.">";
	return $headers;
}

function html_email_header($boundary){
	$html_email_header = "--". $boundary . "\n" .  
		"Content-Type: text/html; charset=\"US-ASCII\"\n" .
		"Content-Transfer-Encoding: 7bit\n\n
		<html>
<head>
<title>Stockton Outfitters</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<link href='http://www.stocktonoutfitters.com/inc/css/basic.css' rel='stylesheet' type='text/css'>
</head>
<body>
<div id='head'><span>Stockton Outfitters, LLC<p class='small'>Wise River, Montana</p></span></div>
<div id='content'>";
	return $html_email_header;
}

function text_email_header($boundary){
	$text_email_header = "This is a multi-part message in MIME format.\n\n" .
            "--".$boundary."\n" .
            "Content-Type: text/plain; charset=us-ascii\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . 
			"\n\n";
	return $text_email_header;
}

function html_email_footer($id,$boundary){
	$html_emailFooter = "</div><div style='text-align:center;font-size:10px;margin:20px 0 0 0;'>Stockton Outfitters 1941 Harrison Ave., Suite C, Butte, MT 59701. (406) 782-9532</div></body></html>" . "\n\n--" . $boundary . "--";
	return $html_emailFooter;
}

function text_email_footer($id){
	$text_emailFooter = "\n\nTo unsubcribe from this email list copy/paste the following address into your browser:
http://www.dinshaw.us/index.php?mode=email&action=unsubscribe&id=$id .  All of your information will be deleted form our database forever and we will never contact you again.  But we will miss you." . "\n\n";
	return $text_emailFooter;
}

function mail_multi_alt($email,$boundary,$subject,$text,$html,$id){	

	$headers = multipart_email_headers($boundary);
	
	$html_header = html_email_header($boundary);
	$text_header = text_email_header($boundary);
	
	$html_emailFooter = html_email_footer($id,$boundary);
	$text_emailFooter = text_email_footer($id);
	
	$full_text = $text_header . $text . $text_emailFooter;
			
	$full_html =  $html_header . $html . $html_emailFooter;
	
	$message = $full_text . $full_html;
	mail($email,$subject,$message,$headers);	
}
?>