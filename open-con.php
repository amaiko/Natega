<?php 
include('config.php');
$con = mysql_connect("$host_name", "$user", "$password");
if(!$con) {
	die("ERORR : " . mysql_error());
	}
	else {
		//echo "<br />CONNCTED<br />";
		}
	mysql_select_db('natega', $con);
?>