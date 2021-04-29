<?php
include 'header.php';
include 'connect.php';
session_start();

$postid=$_GET['id'];


if($_SERVER['REQUEST_METHOD']!='POST')
{
    ?>
    
    <html>
        <head>
            <body>
                <form name="edit" action="" method="POST">
                    <textarea name="newpost" placeholder="Type your new reply"></textarea><br>
                    <input type="submit" value="Change" />
                </form>
            </body>
        </head>
    </html>
<?php }

else

{
    $newpost=$_POST['newpost'];
    $query="UPDATE posts SET post_content='$newpost' WHERE post_id=$postid";
    if(mysql_query($query))
    {
        echo "Your reply has been successfully updated";
    }
    else
    {
        echo "Oops.Something went wrong Try again later".mysql_error();
    }
}