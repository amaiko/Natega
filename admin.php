<?php
include('open-con.php');
include("header.php");
$username = $_POST['username'];
$password = md5($_POST['password']);

$admins = mysql_query("SELECT * FROM admin WHERE username = '$username'"); // IF USERNAME IS EXCIT


while($admin = mysql_fetch_array($admins)) {

if($username == $admin['username'] && $admin['password'] == $password) {
	setcookie("access", TRUE, time()+3600);
	?>
<a href ="add.php">ADD STUDENT</a>
<br />
<a href ="view-stu.php?unid=12345678">VIEW STUDENT INFO</a>
<br />
<a href ="delete.php">DELETE STUDENT</a>
	<?php
   //echo "CONNECTED..."; /// HERE
	}
	else {
	  $back = htmlspecialchars('javascript:history.go("-1")');
	  echo "Wrong Password...<br /><a href='$back'>Back</a>";
		}
	
}

//IF USERNAME !(EXCIT) .... STUPID CODE BUT COOL ALGORITHM

$users_query = mysql_query("SELECT username FROM admin"); 
$x = 0;
$users = array();
while($user = mysql_fetch_array($users_query)) {
$users[$x] = $user['username']; // ALL USERS HERE
$x++;
}
$z = 0;
for($y = 0;$y <= count($users); $y++){
if($username != $users[$y]) {
	 $z++;
	}
	}
	if($z > count($users)) {
		echo "THIS USER IS NOT IN OUR SYSTEM";
		}

// IF USERNAME AND PASSWORD FEILDS IS EMPTY DON'T ACCEPT VALUES.
if($username == " ") { 
  $username = NULL;
	}
elseif($password == " ") {
	$password = NULL;
	}
if(empty($username) || empty($password) ) {
	$back = htmlspecialchars('javascript:history.go("-1")');
	echo "من فضلك قم بأدخال بيانات تسجيل الدخول أولا ...<br /><a href='$back'>Back</a>";
	}






mysql_close($con);


?>