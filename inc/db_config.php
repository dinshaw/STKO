<?php
//host
define('__CFG_HOSTNAME','localhost');

//MySQL DataBase Name
define('__CFG_DATABASE','stockton_cms');

//MySQL User Name
define('__CFG_USERNAME','root');

//MySQL Password
define('__CFG_PASSWORD','mysqlroot');

//database connect
function db_connect(){ 	
	$mysql_access = @mysql_pconnect(__CFG_HOSTNAME, __CFG_USERNAME, __CFG_PASSWORD); 
	mysql_select_db(__CFG_DATABASE, $mysql_access);
	return $mysql_access;
}

//MySQL DataBase Name
// define('__CFG_DATABASE','stockton_cms');
// 
// //MySQL User Name
// define('__CFG_USERNAME','stockton_dbuser');
// 
// //MySQL Password
// define('__CFG_PASSWORD','shutey123');
?>