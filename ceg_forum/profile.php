
<?php
session_start();
$user=$_SESSION['login_user'];



?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $user; ?></i></b><br>
<b id="welcome"> Click <a href="forum.php">here</a> to continue to forum: </i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>