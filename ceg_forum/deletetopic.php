<?php
include 'header.php';
include 'connect.php';
session_start();

$topicid=$_GET['id'];



    $newtopic=$_POST['newtopic'];
    $query="DELETE FROM topics WHERE topic_id=$topicid ";
    if(mysql_query($query))
    {
        echo "Your topic/question has been successfully deleted";
    }
    else
    {
        echo "Oops.Something went wrong Try again later".mysql_error();
    }
