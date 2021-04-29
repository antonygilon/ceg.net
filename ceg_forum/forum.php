<?php
include 'connect.php';
include 'header.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head><link rel="stylesheet" href="forumstyle.css" type="text/css"></head>
<body>



<?php

 
$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories";
 
$result = mysql_query($sql);
 
if(!$result)
{
    echo 'The categories could not be displayed, please try again later.';
}
else
{
    
    if(mysql_num_rows($result) == 0)
    {
        echo 'No categories defined yet.';
    }
    else
    {
                 echo  '<div class="container">';

        echo '<table border="5">
              <thead>
                <tr><th align="center">Categories</th>
                <th align="center">Category Description</th></tr>
              </thead>'; 
             
        while($row = mysql_fetch_assoc($result))
        {        
            $id=$row['cat_id'];
           ?>
               
           
            <tr>
            <td>
            <h3><a href="cat.php?id=<?php echo $id ?> "><?php echo $row['cat_name'] ?></a></h3>
                </td>
                
            <td>
            <h3><?php echo $row['cat_description'] ?></h3>
            
                </td>
                </tr>
                
                
                
                
                <?php
        }echo '</div>';
    }
}
 
include 'footer.php';
?>
</body>
</html>
