<?php
session_start();
include 'header.php';
if(!isset($_SESSION['login_user']))
{
	echo 'Please <a href="loginpage.php">sign in</a> to continue';
}

else if($_SESSION['userlevel']==0)
{
    echo "Sorry you must get administrator access to post a news";
}
else
{

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('button[type="submit"]').click(function(){
                $("#coursedata").hide();
                return false;        
            })
        })
        
        
        function hideMessage() {
    document.getElementById("message_div").style.display = "none";
};
setTimeout(hideMessage, 2000);

</script>
<style>
    .noscroll {
 
    width: 500px;
  min-height: 130px;
  font-family: Arial, sans-serif;
  font-size: 13px;
  color: #444;
   
  padding: 5px;
}


.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

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

</head>
<body>

<?php

echo'<br>';
echo'<br>';
?>
<div>
<form enctype="multipart/form-data"  method="post" >
<pre>

<input type="file" name="image">

<input type="text"  name="topic" placeholder="Enter Topic....." required maxlength="20">


<textarea rows="5" cols="40"  name="description" placeholder="Say Something about this picture...." class="noscroll" maxlength="400" minlength="50">
</textarea>

<input name="sumit" type="submit" value="Upload">

</form>
<div>

<?php
if(isset($_POST['sumit']))
{
$check=filesize($_FILES['image']['tmp_name']);

if($check==0)
 {
        echo '<p id="message_div">No image file selected. <br></p>';
        $checkok = 0;
 }
else
 {
      $checkok = 1;

$allowed_types = array ( 'image/jpeg', 'image/png' );
$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
$detected_type = finfo_file( $fileInfo, $_FILES['image']['tmp_name'] );
if ( !in_array($detected_type, $allowed_types) ) 
{
    echo '<p id="message_div">Please upload a image.<br></p>';
$typeok=0;

}
else
{
$typeok=1;
}
finfo_close( $fileInfo );


if ($_FILES["image"]["size"] > 7000000  && $typeok==1)
 {
    echo '<p id="message_div">Sorry, your file is too large. <br></p>';
    $sizeok = 0;
}
else
{
$sizeok = 1;
}

} 


if($checkok == 1 && $sizeok==1 && $typeok==1)
{
move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);
$file="images/".$_FILES["image"]["name"];

//$image=addslashes($_FILES['image']['tmp_name']);
$name=addslashes($_FILES['image']['name']);
/*$image=file_get_contents($image);
$image=base64_encode($image);*/
$topic=$_POST['topic'];
$description=$_POST['description'];
$currentuser=$_SESSION['userid'];
$username=$_SESSION['login_user'];
$connect=mysql_connect("localhost","id5043997_projectite","ceg.net");
mysql_select_db('id5043997_ceg');


$check="SELECT * FROM upload WHERE name='$name' AND image='$file' AND img_topic='$topic' AND img_description='$description'";
$check_query=mysql_query($check);

if (mysql_num_rows($check_query)==0)
{
$query="INSERT INTO upload(name,image,img_topic,img_description,upload_by,uploader_name) VALUES('$name','$file','$topic','$description','$currentuser','$username')";
if(mysql_query($query,$connect))
echo '<p style="font-size: 25px;color: #47c9af;" id="message_div">Successfully Uploaded</p>';

else
echo '<p style="font-size: 25px;color: #47c9af;" id="message_div">There is a problem Uploading</p>';
}
mysql_close($connect);
}
}
}
?>

</body>
</html>