<?php
include('open-con.php');
include("header.php");
$uni_num = $_POST['uni_num'];
echo "USER UNIQUE NUMBER : " . $uni_num . "<br />";
	$results = mysql_query("SELECT * FROM results where uni_num = {$uni_num}");	     
?>
<table summary='RESULTS' border='1' cellpadding='7' >
 <tr>
  <td>Subject</td>
  <td>1st Term</td>
  <td>2ndt Term</td>
  <td>TOTAL</td>
  </tr>
  
<?php
$totals = array();
$x = 0;
while($result = mysql_fetch_array($results)) {
echo "<tr><td>"  . $result['subject'] . 
     "</td><td>" . $result['ft_res']  .
     "</td><td>" . $result['st_res']  . 
     "</td><td>" . ($result['ft_res']+$result['st_res']) . 
     "</td></tr>";
       
     $totals[$x] = $result['ft_res']+$result['st_res']; //Array to store all results.
     $x++;
     
}
echo "</table>";
echo "total : " . array_sum($totals);
?>

</body>
</html>

<?php 
mysql_close($con);
?>