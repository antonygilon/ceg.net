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
<style>
.floating-box {
display: inline-block;
    float: right;
    width: 650px;
    height: auto;
    margin-top: 200px;
    margin-right: 10px;

    border: 1px solid black;  
}
.float-img1{
float:left;
margin-left:2px;
margin-right:10px;
margin-bottom:5px;
border: solid black 1px;

}


.float-img2{
float:left;
margin-left:340px;
margin-right:10px;
margin-bottom:5px;
border: solid black 1px;

}



/*
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}


*/



</style>


<?php
$connect=mysql_connect("localhost","id5043997_projectite","ceg.net");

mysql_select_db('id5043997_ceg');

$select="select * from upload order by image_id desc";
$result=mysql_query($select);
$i=0;
echo '<center>';
while($row=mysql_fetch_array($result))
{
echo'<br>';
echo'<br>';
echo'<table border="1" width="1200" >';
echo '<tr>';
echo '<th>';

echo $row['img_topic']; 

echo '</th>';
echo '</tr>';
echo '<tr>';
if($row['img_description']!=NULL)
{
echo '<td>';
?>
	
   <div id="image" style="display:inline;">
        <img src="<?php echo $row['image'];?>" height="500" width="500"  class="float-img1"  >
    </div>

    <textarea rows="5" cols="40" class="floating-box"><?php echo $row['img_description']; ?></textarea>
 
<?php 
}
echo '</td>';
if($row['img_description']==NULL)
{
echo '<td>';
?>

   <div id="image" style="display:inline;">
        <img src="<?php echo $row['image'];?>" height="500" width="500"  class="float-img2"  >
    </div>

<?php
}
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo 'UPLOADED BY ';
echo $row['uploader_name']; 

echo '</td>';
echo '</tr>';
echo'</table>';
echo'<br>';
echo'<br>';
echo'<br>';
}

echo '</center>/';

   mysql_close($connect);
}
?>
</body>
</html>