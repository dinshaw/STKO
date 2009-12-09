<?php
require_once("../inc/functions.php");

db_connect();

$sql = "select * from ticker where status = '1'";
$query = mysql_query($sql);

while($rows = mysql_fetch_array($query)){
$tickerText = $rows['msg'];
}

echo "
&ticker=$tickerText&
";
?>