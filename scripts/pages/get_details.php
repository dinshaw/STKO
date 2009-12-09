<?php
if(!isset($_REQUEST['pageID'])){
	$page  = $_REQUEST['page'];
	$pageID = get_id('pages','page',$page);
}else{
	$pageID = $_REQUEST['pageID'];
}

/* old query
$sql = "select * from details where pageID = '$pageID'";
*/

$currentYear = __CFG_Reservation_Year;
$sql = "SELECT tt.location, tt.duration, tt.seasonStart, tt.seasonEnd, tt.departs, tt.accommodations, tt.camp, tt.species, tt.peaksPasses, IF(sum(t.spots) - IFNULL(sum(r.hunters),0),'Available','No Availability')  AS availability
FROM (trip_types tt, trips t) LEFT JOIN reservations r ON (r.trip_id = tt.id)
WHERE tt.id = t.type_id
AND FIND_IN_SET($pageID,tt.page_id )
AND t.status = 1
GROUP BY type_id";

$query = mysql_query($sql);

$rows = mysql_fetch_array($query);

$location = $rows['location'];
$duration = $rows['duration'];
$departs = $rows['departs'];
$accommodations = $rows['accommodations'];
$availability = $rows['availability'];
$camp = $rows['camp'];
$species = $rows['species'];
$seasonStart = $rows['seasonStart'];
$seasonEnd = $rows['seasonEnd'];
$peaksPasses = $rows['peaksPasses'];

$tpl->assign('location',$location);
$tpl->assign('duration',$duration);
$tpl->assign('departs',$departs);
$tpl->assign('accommodations',$accommodations);
$tpl->assign('availability',$availability);
$tpl->assign('camp',$camp);
$tpl->assign('species',$species);
$tpl->assign('seasonStart',$seasonStart);
$tpl->assign('seasonEnd',$seasonEnd);
$tpl->assign('peaksPasses',$peaksPasses);
$tpl->assign('pageID',$pageID);
?>
