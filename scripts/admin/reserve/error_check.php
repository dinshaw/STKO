<?php
if($_POST['mode'] == "tripTypes"){
	
	$errors = array(
	"tripType" => "Please enter a trip type.\n",
	"description" => "Please enter a trip description.\n",
	"price1" => "Please enter a price 1.\n",
	"price2" => "Please enter a price 2.\n",
	"price1_desc" => "Please enter a description for price 1.\n",
	"price2_desc" => "Please enter a description for price 2.\n",
	"page_id" => "Please enter the page on whch this trip type should be displayed.\n",
	"location" => "Please ennter a location.\n",
	"seasonStart" => "Please enter a season start date.\n",
	"seasonEnd" => "Please enter a season end date.\n",
	"duration" => "Please enter a trip duration.\n",
	"departs" => "Where does the trip depart from?\n",
	"camp" => "Please ennter camp.\n",
	"accommodations" => "Please enter accomodations.\n",
	"species" => "Please enter a species.\n",
	"peaksPasses" => "Please ennter Peaks & Passes.\n"
	);
	
	if(!$_POST['tripType']){$error .= $errors['tripType'];}
	if(!$_POST['description']){$error .= $errors['description'];}
	if(!$_POST['price1']){$error .= $errors['price1'];}
	if(!$_POST['price2']){$error .= $errors['price2'];}
	if(!$_POST['price1_desc']){$error .= $errors['price1_desc'];}
	if(!$_POST['price2_desc']){$error .= $errors['price2_desc'];}
	if(!$_POST['page_id']){$error .= $errors['page_id'];}
	if(!$_POST['location']){$error .= $errors['location'];}
	if(!$_POST['seasonStartMonth'] || !$_POST['seasonStartDay']){$error .= $errors['seasonStart'];}
	if(!$_POST['seasonEndMonth'] || !$_POST['seasonEndDay']){$error .= $errors['seasonEnd'];}
	if(!$_POST['duration']){$error .= $errors['duration'];}
	if(!$_POST['departs']){$error .= $errors['departs'];}
	if(!$_POST['camp']){$error .= $errors['camp'];}
	if(!$_POST['accommodations']){$error .= $errors['accommodations'];}
	if(!$_POST['species']){$error .= $errors['species'];}
	//if(!$_POST['peaksPasses']){$error .= $errors['peaksPasses'];}
	
}elseif($_POST['mode'] == "trips"){

	$errors = array(
	"spots" => "Please enter trip avalability.\n",
	"year" => "Please enter a year.\n",
	"type_id" => "Please enter a trip type.\n",
	"startDate" => "Please enter a start date.\n",
	"endDate" => "Please enter a end date.\n",
	);
	

	if(!$_POST['type_id']){$error .= $errors['type_id'];}
	if(!$_POST['year']){$error .= $errors['year'];}
	if(!$_POST['startMonth'] || !$_POST['startDay']){$error .= $errors['startDate'];}
	if(!$_POST['endMonth'] || !$_POST['endDay']){$error .= $errors['endDate'];}
	if(!isset($_POST['spots']) || $_POST['spots'] == ""){$error .= $errors['spots'];}
}

?>