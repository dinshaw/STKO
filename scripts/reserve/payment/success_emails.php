<?php
$subject = "Stockton Outfitters Reservtion Receipt";
$boundary = "==Multipart_Boundary_xxc75885";

$html  = "<fieldset><legend>Stockton Outfitters Reservtion Receipt</legend><p class='teaser'>Thank you for reserving through our online reservation system.
	Below are the details of your reservation and your confirmation number.
	We will be in touch with you shortly to finalize your reservation.  We look forward to meeting you.</p><br><br>
Confirmation #: $conf<br><br>
$type<br>";
$html .= $start_date . " - " . $end_date;
$html .= "<br>
$totalGuests Guests ($hunters Hunters & $observers Non-Hunting Observers)<br><br>
$last_name, $first_name<br>
$address_1<br>
$address_2<br>
$city, $state<br>
$zip<br>
$email<br>";
if($tel_1){
	$html .= "Telephone (Home): " . $tel_1 . "<br>";
}
if($tel_2){
	$html .= "Telephone (Office): " . $tel_2 . "<br>";
}
if($fax){
	$html .= "Fax: " . $fax . "<br>";
}
if($paymentType == "cc"){
	$html .= "<br>Payment by Credit card.<br>";
}elseif($paymentType == "ck"){
	$html .= "<br>Payment by Check.<br>";
}

$html .= "</fieldset>";

$html2text = preg_replace("<br>","\n",$html);
$text = strip_tags($html2text);

mail_multi_alt($email,$boundary,$subject,$text,$html,$id);

//admin email

$subject = "Stockton Outfitters Reservtion Notification";
//send cust email
$html = "<fieldset><legend>Stockton Outfitters Reservtion Notification</legend><p class='teaser'>A reservation has been made at StocktonOutffitters.com.
Please lgoin to your admin area and click on &quot;Review Bookings&quot; to see the new reservation.</p><br><br>
CONF# = $conf";
$html .= "</fieldset>";
$html2text = preg_replace("<br>","\n",$html);
$text = strip_tags($html2text);
$email = __CFG_Admin_Email;
mail_multi_alt($email,$boundary,$subject,$text,$html,$id);
?>