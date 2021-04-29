<html>

<head>
<title>Delete</title>
</head>

<body>
<h1>Select category to delete</h1>



<?php
include 'connect.php';

	$sql= "SELECT cat_id,cat_name,cat_description FROM categories";
		$result=mysql_query($sql);
				   echo '<form method="post" action="delete.php">
                    Category:'; 
                 
                echo '<select name="topic_cat">';
                    while($row = mysql_fetch_assoc($result))
                    {
                        echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                    }
                echo '</select>'; 
                     
                echo '
                    <input type="submit" value="Delete category" />
                 </form>';
?>


</body>

</html>