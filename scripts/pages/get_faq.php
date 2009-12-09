<?php
$sqlCat = "select * from faq_cats order by id asc";
$queryCat = mysql_query($sqlCat);

while($rowsCat = mysql_fetch_array($queryCat)){
	$faqCat = array();
	$faqCat['catTitle'] = $rowsCat['title'];
	$faqCat['catName'] = $rowsCat['name'];
	$faqCat['id'] = $rowsCat['id'];
	
	$faqCatList[] = $faqCat;
}


$sql = "select * from faq order by cat asc";
$query = mysql_query($sql);

while($rows = mysql_fetch_array($query)){
	$faq = array();
	$faq['q'] = $rows['q'];
	$faq['a'] = $rows['a'];
	$faq['id'] = $rows['id'];
	$faq['cat'] = $rows['cat'];
	$cat = $rows['cat'];
	
	if(isset($newCat) && $cat != $newCat){
		$newCat = $cat	;
		$faq['newCat'] = get_value('title','faq_cats','id',$newCat);
	}
	
	$faqList[] = $faq;
}

$tpl->assign('faqLoop',$faqList);
$tpl->assign('faqCatLoop',$faqCatList);
?>
