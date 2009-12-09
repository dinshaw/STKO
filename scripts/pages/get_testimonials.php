<?php
if(isset($_REQUEST['page']) || isset($page)){
	$pageID = get_id('pages','page',$page);
	$filter = "where pageID = '$pageID'";
}else{
	$filter = '';
}

//filter above
$sql = "select * from testimonials $filter order by pageID asc";
$query = mysql_query($sql);

unset($pageID);

while($rows = mysql_fetch_array($query)){
	$testimonial = array();
	
	$testimonial['author'] = $rows['author'];
	$testimonial['trip'] = $rows['trip'];
	$testimonial['body'] = $rows['body'];
	$testimonial['date'] = $rows['date'];
	
	$testimonial['id'] = $rows['id'];
	
	if (isset($pageID) && $pageID != $rows['pageID']){
		$pageID = $rows['pageID'];
		$testimonial['page'] = get_value('title','pages','id',$pageID);
	}
	
	$testimonialList[] =  $testimonial;
}

//print_array($testimonialList);

if(isset($testimonialList)) $tpl->assign('testimonialLoop',$testimonialList);

?>