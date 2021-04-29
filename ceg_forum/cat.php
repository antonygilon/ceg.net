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
            cat_id,
            cat_name,
            cat_description
        FROM
            categories
        WHERE
            cat_id = $id ";
 
$result = mysql_query($sql);
 
if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysql_error();
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        
        while($row = mysql_fetch_assoc($result))
        {
            echo '<h2 align="center">Discussions in ′' . $row['cat_name'] . '′ category</h2>';
        }
     
       
        $sql = "SELECT  
                    topic_id,
                    topic_subject,
                    topic__date,
                    topic_category,
                    topic_byuser
                FROM
                    topics
                WHERE
                    topic_category = $id ";
         
        $result = mysql_query($sql);
         
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysql_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {
                echo  '<div class="container">';
                echo '<table border="1">
                <thead>
                      <tr>
                
                    <th>Topic</th>
                        <th>Created at</th>
                        <th>Created by</th>
                      </tr>
                      </thead>'; 
                      
                      
                     
                while($row = mysql_fetch_assoc($result))
                {      
                    
                    $user=$row['topic_byuser'];
                    
                    
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
                            echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
                        if($currentuser==$user)
                        {
                            ?><a href="edittopic.php?id=<?php echo $row['topic_id']?> ">  Edit   || </a><a href="deletetopic.php?id=<?php echo $row['topic_id'] ?> ">  Delete</a><?php
                        }
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo date('d-m-Y', strtotime($row['topic__date']));
                        echo '</td>';
                        echo '<td class="leftpart">';
                            echo $final[0];
                        echo '</td>';
                            
                    echo '</tr>';
                }echo '</div>';
            }
        }
    }
}
 

?>
</body>
</html>