<?php
session_start();
$currentuser=$_SESSION['userid'];

include 'connect.php';
include 'header.php';

?>
<!DOCTYPE html>
<html>
    <head><link rel="stylesheet" href="forumstyle.css" type="text/css"></head>
<body>
    <?php
 
$id=$_GET['id'];

$sql = "SELECT
               topic_id,
               topic_subject
        FROM
            topics
        WHERE
            topic_id= $id ";
 
$result = mysql_query($sql);
 
if(!$result)
{
    echo 'The topic could not be displayed, please try again later.' . mysql_error();
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'This topic does not exist.';
    }
    else
    {
        
        while($row = mysql_fetch_assoc($result))
        {
            ?> <h2>POSTS IN TOPIC: <?php echo $row['topic_subject'] ?></h2>
            <?php
        }
     
       
        $sql = "SELECT  
                     post_topic,
    post_content,
    post_time,
    post_by,post_id
                FROM
                   posts

                WHERE
                  post_topic = $id ";
         
        $result = mysql_query($sql);
         
        if(!$result)
        {
            echo 'The posts could not be displayed, please try again later.';
        }
        else
        {
            if(mysql_num_rows($result) == 0)
            {
                echo 'There are no posts in this topic yet.';
            }
            else
            {
               
               echo  '<div class="container">';

        echo '<table border="5">
              <thead>
                <tr><th align="center">Posts</th>
                <th>Posted at</th>
                <th>Posted by</th>
              </thead>'; 
             
                     
                while($row = mysql_fetch_assoc($result))
                {           
                
                    $user=$row['post_by'];
                    
                    
                     $query = " SELECT  
                   user_name
                FROM
                   user_details
                WHERE
                    user_id =$user";
                    $queryresult=mysql_query($query);
                    $final=mysql_fetch_array($queryresult);
         
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h3>' . $row['post_content'] .'<h3>';
                    if($currentuser==$row['post_by'])
                    {
                        ?> <a href="editpost.php?id=<?php echo $row['post_id'] ?> ">Edit   </a>||<a href="deletepost.php?id=<?php echo $row['post_id'] ?> ">  Delete</a><?php
                    }
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo date('d-m-Y', strtotime($row['post_time']));
                        echo '</td>';
                          echo '<td class="leftpart">';
                            echo $final[0];
                        echo '</td>';
                    echo '</tr>';
    ?>
    <br>

    
                        
                
                    

                    <?php
                }
               ?> <div id="footer" align="center">
                 Reply:<br>
                <form method="post" action="reply.php?id=<?php echo $id?>">
                    <p>
    <textarea name="reply-content" placeholder="Type your reply here"></textarea><br>
    <input type="submit" value="Submit reply" /></p>
</form>
</div><?php echo '</div>';
                
              ?>   <?php 
                ?>
          
            


<?php
 
              
                    
            }
         
            
        }
    }
}
        
                

?>
</body>
</html>