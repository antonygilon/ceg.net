<?php

session_start();
include 'header.php';

if(!isset($_SESSION['login_user']))
{
	echo 'Please <a href="loginpage.php">sign in</a> to continue';
}

else
{

?>

<!DOCTYPE html>
<html>
<body>
<?php
$value = $_POST['del'];

$connect=mysql_connect("localhost","id5043997_projectite","ceg.net");
mysql_select_db('id5043997_ceg');



$delete="delete from upload where image_id=$value";
$result=mysql_query($delete,$connect);

if($result)
{
?>
<center>
    <?php
echo "SUCCESSFULLY DELETED";
?>
</center>
<?php
}

else
{
echo "There is a problem deleting....Try again Later!!!";
}

mysql_close($connect);
}
?>



</body>
</html>