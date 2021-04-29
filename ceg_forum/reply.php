<?php
session_start();
include 'connect.php';
include 'header.php';
 

    $id=$_GET['id'];
    
    if(!isset($_SESSION['login_user']))
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {
        
       
       $reply=$_POST['reply-content'];
       $userid=$_SESSION['user_id'] ;

       
        $sql = "INSERT INTO 
                    posts(post_content,
                          post_time,
                          post_topic,
                          post_by) 
                VALUES ('$reply',
                        NOW(),
                         $id,
                        " . $_SESSION['userid'] . ") ";
                         
        $result=mysql_query($sql);
                         
        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later'.mysql_error();
        }
        else
        {
            echo 'Your reply has been saved, check out the topic';
        }
    }

 

?>