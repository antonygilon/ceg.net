<?php
include 'header.php';
include 'connect.php';
session_start();

$postid=$_GET['id'];



   
    $query="DELETE FROM posts WHERE post_id=$postid ";
    if(mysql_query($query))
    {
        echo "Your replyhas been successfully deleted";
    }
    else
    {
        echo "Oops.Something went wrong Try again later".mysql_error();
    }
