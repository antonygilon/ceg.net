<?php
include 'header.php';
include 'connect.php';
session_start();

$topicid=$_GET['id'];


if($_SERVER['REQUEST_METHOD']!='POST')
{
    ?>
    
    <html>
        <head>
            <body>
                <form name="edit" action="" method="POST">
                    <textarea name="newtopic" placeholder="Type your new question or Topic"></textarea><br>
                    <input type="submit" value="Change" />
                </form>
            </body>
        </head>
    </html>
<?php }

else

{
    $newtopic=$_POST['newtopic'];
    $query="UPDATE topics SET topic_subject='$newtopic' WHERE topic_id=$topicid ";
    if(mysql_query($query))
    {
        echo "Your topic/question has been successfully updated";
    }
    else
    {
        echo "Oops.Something went wrong Try again later".mysql_error();
    }
}