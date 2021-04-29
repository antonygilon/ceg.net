
<?php
session_start();
include 'header.php';

if(!isset($_SESSION['login_user']))
{
	echo 'Please <a href="loginpage.php">sign in</a> to continue';
}

else
{
$value1 = $_GET['edit'];


?>


<html>
<head>



<style>
    .noscroll {
 
    width: 500px;
  min-height: 130px;
  font-family: Arial, sans-serif;
  font-size: 13px;
  color: #444;
   
  padding: 5px;
}

textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
}


input[type=text], select {
    width: 100%;
    padding: 12px 30px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 30px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #47c9af;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color:#16e5bb;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}



</style>

</head>
<?php
if($_SERVER['REQUEST_METHOD']!='POST')
{
    ?>
    <body>

<br><br>
<div>
<form  method="POST" action="">

<pre>
<input type="text" name="topic" placeholder="Enter new Topic....." required maxlength="20">

<br><br>
<textarea rows="5" cols="40" name="description" placeholder="Enter new description" class="noscroll" maxlength="400" minlength="50">
</textarea>

<input type="submit" value="Update">
</pre>
</form>
</div>
<?php

}

else
{

$connect=mysql_connect("localhost","id5043997_projectite","ceg.net");
$selectdb=mysql_select_db('id5043997_ceg');
if(!selectdb)
echo "Unable to select database";

    
$descri=$_POST['description'];
$top=$_POST['topic'];

$update="update upload set img_topic='$top',img_description='$descri' where image_id=$value1 ";
if(mysql_query($update))
echo '<p style="font-size: 25px;color: #47c9af;" id="message_div">Successfully Updated</p>';

else
echo '<p style="font-size: 25px;color: #47c9af;" id="message_div">There is a problem Updating</p>';



}

mysql_close($connect);

}
?>

</body>
</html>