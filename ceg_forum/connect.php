<?php
$conn=mysql_connect("localhost","id5043997_projectite","ceg.net");
if(!$conn)
{
	echo "not connected";
}

else
{
    
    $dbconnect=mysql_select_db('id5043997_ceg');
    if(!$dbconnect)
    
    echo "error in connecting to db";
}
?>