<?php
session_start();


include 'connect.php';
include 'header.php';

echo '<h2>Create a Topic to start discussion</h2>';

if(!isset($_SESSION['login_user']))
{
	echo 'Please <a href="loginpage.php">sign in</a> to continue and create a topic';
}


else 
{
    ?>
    <!DOCTYPE html>
<html>
<head>
<style>

textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
}

input[type=text], select {
    width: 100%;
    padding: 12px 30px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 30px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #47c9af;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color:#16e5bb;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>

<?php
	if($_SERVER['REQUEST_METHOD']!='POST')
	{
		$sql= "SELECT cat_id,cat_name,cat_description FROM categories";
		$result=mysql_query($sql);
		if(!$result)
		{
			echo 'Something went wrong please try again';
		}
		else
		{
			if(mysql_num_rows($result)==0)
			{
				if($SESSION['user_level']==1)
				{
					echo 'You have not created any categories';
				}
				else
				{
					echo 'You are not permitted to create any categories';
				}
			}
			
			else
			{
			            echo '<div>';
				   echo '<form method="post" action="">
                    Subject: <input type="text" id="fname" name="topic_subject" required />
                    Category:'; 
                 
                echo '<select name="topic_cat" id="country">';
                    while($row = mysql_fetch_assoc($result))
                    {
                        echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                    }
                echo '</select>'; 
                     
                echo 'Message: <textarea name="post_content" required /></textarea>
                    <input type="submit" value="Create topic" />
                 </form>';
                 echo '</div>';
			}
		}
	}

	else
	{
        $query  = "BEGIN WORK;";
        $result = mysql_query($query);
         
        if(!$result)
        {
           
            echo 'An error occured while creating your topic. Please try again later.';
        }
        else
        {
			if(!empty($_SESSION['login_user']))
     
	 {
            $sql = "INSERT INTO 
                        topics(topic_subject,
                               topic__date,
                               topic_category,
                               topic_byuser)
                   VALUES('" . mysql_real_escape_string($_POST['topic_subject']) . "',
                               NOW(),
                               " . mysql_real_escape_string($_POST['topic_cat']) . ",
                               " . $_SESSION['userid'] . "
                               )";
                      
            $result = mysql_query($sql);
            if(!$result)
            {
                
                echo 'An error occured while inserting your data. Please try again later.' . mysql_error();
                $sql = "ROLLBACK;";
                $result = mysql_query($sql);
            }
            else
            {
                
                $topicid = mysql_insert_id();
                 
                $sql = "INSERT INTO
                            posts(post_content,
                                  post_time,
                                  post_topic,
                                  post_by)
                        VALUES
                            ('" . mysql_real_escape_string($_POST['post_content']) . "',
                                  NOW(),
                                  " . $topicid . ",
                                  " . $_SESSION['userid'] . "
                            )";
                $result = mysql_query($sql);
                 
                if(!$result)
                {
                    
                    echo 'An error occured while inserting your post. Please try again later.' . mysql_error();
                    $sql = "ROLLBACK;";
                    $result = mysql_query($sql);
                }
                else
                {
                    $sql = "COMMIT;";
                    $result = mysql_query($sql);
                    echo 'You have successfully created <a href="topic.php?id='. $topicid . '">your new topic</a>.';
                }
            }
        }
		else
			echo"Error";
		}
    }
}
 
include 'footer.php';
?>