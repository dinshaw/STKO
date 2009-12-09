<?php
if(isset($_REQUEST['filter'])){
	$page = $_REQUEST['filter'];
}

if (isset($page) && $page != ''){
	$sql = "select * from images where page = '$page' order by sub_page, display asc";
	$sqlTR = "select * from images where page = 'TR' and sub_page = '$page' order by display asc";
}else{
	$sql = "select * from images order by page, sub_page, display";
	$sqlTR = "select * from images where page = 'TR' order by sub_page, display";
}

$query = mysql_query($sql);
$queryTR = mysql_query($sqlTR);

unset($newPage);

while($rows = mysql_fetch_array($query)){
	if($rows['page']){
		$image = array();
		$image['image'] = $rows['name'];
		$image['title'] = $rows['title'];
		$image['caption'] = $rows['caption'];
		if($rows['w'] > 600){
			$image['w'] = 600;
		}else{
			$image['w'] = $rows['w'];
		}
		$image['h'] = $rows['h'];
		$image['display'] = $rows['display'];
		$image['id'] = $rows['id'];
		$image['page'] = $rows['page'];
		$image['sub_page'] = $rows['sub_page'];


		if (!isset($newPage) || $newPage != $rows['page']){
			$newPage = $rows['page'];
			$image['newPage'] = get_value('title','pages','page',$newPage);
		}	
		if (!isset($newSubPage) || $newSubPage != $rows['sub_page']){
			$newSubPage = $rows['sub_page'];
			$image['newSubPage'] = get_value('title','pages','page',$newSubPage);
		}	

		// assigns the total count for each section taken from the first query in scripts/admin/gallery.php
		// $image['totalCount'] = ${$rows['page'].'_'.$rows['sub_page'].'Count'};
		$imageList[] = $image;
	}	
}	

while($rowsTR = mysql_fetch_array($queryTR)){
	$tr = array();
	$tr['image'] = $rowsTR['name'];
	$tr['title'] = $rowsTR['title'];
	$tr['caption'] = $rowsTR['caption'];
	$tr['w'] = $rowsTR['w'];
	$tr['h'] = $rowsTR['h'];
	$tr['display'] = $rowsTR['display'];
	$tr['id'] = $rowsTR['id'];
	$tr['page'] = $rowsTR['page'];
	$tr['sub_page'] = $rowsTR['sub_page'];

	$trList[] = $tr;
	$tpl->assign('trLoop',$trList);

}	

if(isset($imageList)){
	$the_image = $imageList[0]['image'];
	$the_caption = $imageList[0]['caption'];
	$imgTitle = $imageList[0]['title'];
	$the_image_id = $imageList[0]['id'];
	$the_image_h = $imageList[0]['h'];
	$the_image_w = $imageList[0]['w'];

	$tpl->assign('the_image',$the_image);
	$tpl->assign('the_image_id',$the_image_id);
	$tpl->assign('the_image_h',$the_image_h);
	$tpl->assign('the_image_w',$the_image_w);
	$tpl->assign('the_caption',$the_caption);
	$tpl->assign('imgTitle',$imgTitle);
	$tpl->assign('imageLoop',$imageList);
}
if(isset($page)) $tpl->assign('filter',$page);

?>