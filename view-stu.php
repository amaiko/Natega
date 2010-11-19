<?php
if($_COOKIE['access'] == TRUE) {
include("open-con.php");
include("header.php");
$uni_num = $_GET['unid'];
$query = mysql_query("SELECT * FROM stu_info where uni_num = '$uni_num'");
while($info = mysql_fetch_array($query)) {
	echo "رقم الطالب : " . $info['uni_num'] . "<br />";
	echo "أسم الطالب : " . $info['name'] . "<br />";
	echo "بريد الطالب : " . $info['email'] . "<br />";
}

}
else { 
header('Location: login.php');
}


?>

<?php
mysql_close($con);
?>