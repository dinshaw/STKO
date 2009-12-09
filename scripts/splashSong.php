<?php
session_start();

$lastSong = $_SESSION['lastSong'];

require_once("../inc/functions.php");

db_connect();

//fill array with all songs
$sql = "select * from music where status = '2'";
$result = mysql_query($sql);

if(!$_SESSION['songs']){
	$songs = array();
	
	while($rows = mysql_fetch_array($result)){
		$songs[] = $rows['id'];
	}
	
}else{
	$songs = $_SESSION['songs'];
}


$newSongKey = array_rand($songs);
/*while($newSongKey == $lastSong){
	$newSongKey = array_rand($songs);
}*/

$newSong = $songs[$newSongKey];

$sql = "select * from music where id = '$newSong'";
$query = mysql_query($sql);

while($row = mysql_fetch_array($query)){
	$title = $row['title'];
	$file = $row['file'];
	$cat = $row['cat'];
	$id = $row['id'];
}

$newSongs = array_splice($songs,$newSongKey,1);

$_SESSION['songs'] = $songs;
$_SESSION['lastSong'] = $newSongKey;
print_r($songs);
echo "
&splashSong=$title&
&src=$file&
&cat=$cat&
"; 
?>
