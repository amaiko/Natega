<?php
if($_COOKIE['access'] == TRUE) {
?>
<?php 
include("header.php");
?>
<form action='user.php' method='POST'>
NAME: <input type='text' name='name' />
EMAIL: <input type='text' name='email' />
<input type='submit' value='ADD USER' />
</form>
</body>
</html>
<?php
}
else { 
header('Location: login.php');
}
?>