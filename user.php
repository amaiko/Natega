<?php
include('open-con.php');
include('header.php');
$uni_num = rand(10000000, 99999999); //Generating the Unique Number
$name = $_POST['name'];
$email = $_POST['email'];

// Check If The Number Is Unique In Our Database
$uni_nums = mysql_query("SELECT uni_num FROM `natega`.`stu_info`");
$uni_arr = array();
$x = 0;
while($uni = mysql_fetch_array($uni_nums)) {
   $uni_arr[$x] = $uni['uni_num']; // THIS ARRAY STORES ALL UNIQUE NUMBERS
   $x++;
	}
	//print_r($uni_arr);
	$y = 0;
while($y <= count($uni_arr)) {
	if ($uni_num == $uni_arr[$y]) { 
		$uni_num = rand(10000000, 99999999); // IF NOT Generate It Again.
		}
$y++;
}

// IF NAME AND EMAIL FEILDS IS EMPTY DON'T ACCEPT VALUES.
if($name == " ") { 
  $name = NULL;
	}
elseif($email == " ") {
	$email = NULL;
	}
if(!empty($name) && !empty($email) ) {
	echo "Your UNIQUE NUMBER is " . "<a href='view-stu.php?unid={$uni_num}'>{$uni_num}</a>"; // MAIN THING
	
	mysql_query("INSERT INTO  `natega`.`stu_info` (`id` ,`name` ,`uni_num` ,`email`)
		VALUES (NULL ,  '$name',  '$uni_num',  '$email')");
	
}else {
	$back = htmlspecialchars('javascript:history.go("-1")');
	echo "Complete Your Info...<br /><a href='$back'>Back</a>";
}
?>
 
 <h2>NOW ADD THE USER INFO</h2>
<form action='info.php' method='POST'>
المادة : <input type='text' name='uni_num' />
 درجة الترم الأول : <input type='text' name='uni_num' />
درجة الترم الثاني: <input type='text' name='uni_num' />
<input type='submit' value='ADD' />
</form>
 
<?php   
mysql_close($con);
?>