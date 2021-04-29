<?php
session_start(); 
include 'connect.php';



$username=$_POST['username'];
$password=$_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$query = "SELECT 
                        user_id,
                        user_name,
                        user_level
                    FROM
                        user_details
                    WHERE
                        user_name = '" . mysql_real_escape_string($_POST['username']) . "'
                    AND
                        user_password = '" . sha1($_POST['password']) . "'";
                         
			
			$result=mysql_query($query);
			
			if(!$result)
			{	
			echo 'Something went wrong Please try again later';
			}
			
if (mysql_num_rows($result) == 0)
{
	echo "The username and password is wrong";
}
else
{
	while($row=mysql_fetch_assoc($result))
	{
		            $_SESSION['userid']=$row['user_id'];
					$_SESSION['login_user']=$row['user_name'];
					$_SESSION['userlevel']=$row['user_level'];
	}               $_SESSION['Entered']=0;

header("location: page1.php");
} 
mysql_close($conn); 


?>