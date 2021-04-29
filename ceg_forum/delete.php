<?php

include 'connect.php';
include 'header.php';

$option=$_POST['topic_cat'];
echo $option;
$query="DELETE  FROM categories WHERE cat_id=$option";
if(mysql_query($query))
	echo "Category deleted successfully";
?>