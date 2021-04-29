<?php
session_start();
include 'header.php';
if(!isset($_SESSION['login_user']))
{
	echo 'Please <a href="loginpage.php">sign in</a> to continue';
}

else
{

?>




<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>File Upload</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
		
		
		
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
</head>
<body>

<div class="container well">
   <form>
    <div class="form-group">
      <label for="usr">Topic</label>
      <textarea rows="1" cols="40"  name="topic" class="form-control" id="usr" required maxlength="20"></textarea>
    </div>
    <div class="form-group">
      <label for="pwd">Description</label>
      <textarea rows="5" cols="40" name="description"  class="form-control" id="pwd" maxlength="300" minlength="50"></textarea>
    </div>
	<div class="form-group">
      <label for="pwd">Upload</label>
      <input type="file" name="image" class="form-control" id="file">
    </div>
	<div class="pull-right">
		 <button type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal" onclick="startUpload()" name="sumit">Start Upload</button>
	</div>
	
  </form>
</div>


        <div class="modal-footer">
          <input type="submit" name="sumit" class="btn btn-info btnprogress">			
		
        </div>
      </div>
      
    </div>
  </div>

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
echo '<p id="message_div">Successfully Uploaded</p>';

else
echo '<p id="message_div">There is a problem Uploading</p>';
}
mysql_close($connect);
}
}
}
?>

</body>
</html>
