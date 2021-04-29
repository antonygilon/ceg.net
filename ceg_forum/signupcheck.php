<html>
<head>

<?php

include 'connect.php';
$username=$_POST['username'];
$email=$_POST['emailid'];


        $usernamequery="SELECT * FROM user_details WHERE user_name=$username ";
        $emailquery="SELECT * FROM user_details WHERE user_email=$email ";
        if(mysql_query($usernamequery))
        {
            echo "Sorry the username already exists";
        }
        
       
        else if(mysql_query($emailquery))
        
          
        {
            echo "Sorry the Email id already exists";
        }
        

         else
         {
			
			$query="INSERT INTO user_details(Name, user_name,user_password,user_email,user_year,user_phonenum,user_date,user_level)
					VALUES ('" . mysql_real_escape_string($_POST['name']) . "','" . mysql_real_escape_string($_POST['username']) . "',
                       '" . sha1($_POST['password']) . "',
                       '" . mysql_real_escape_string($_POST['emailid']) . "',
					  '" . mysql_real_escape_string($_POST['yos']) . "',
					   '" . mysql_real_escape_string($_POST['phonenum']) . "',
					   NOW(),
                        0)";
			
			$dataconnect=mysql_query($query);
			if(!$dataconnect)
			{
				echo "Something went wrong, Try again later.";
			}
			
			else
			{
				echo "<br>";
				echo "Thanks for registering";
				?>
				<br>
				<h2>Click <a href="loginpage.php">here</a> to login</h2>
				<?php
			}
			
         }
     


?>
Already a member?<a href="loginpage.php">Sign in </a>
