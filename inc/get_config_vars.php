<?php
$sql = "select * from config";
$query = mysql_query($sql);

while($rows = mysql_fetch_array($query)){
	$cfgVar = array();
	$name = $rows['name'];
	$cfgVar[$name] = $rows['value'];
	$cfgVarList[] = $cfgVar;
}

foreach($cfgVarList as $arr){
	foreach($arr as $var => $val){
		define($var,$val);
	}
}
?>

