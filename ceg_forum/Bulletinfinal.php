
<?php
session_start();
include "header.php";

if(!isset($_SESSION['login_user']))
{
	echo 'Please <a href="loginpage.php">sign in</a> to continue';
}

else
{
?>

<!DOCTYPE html>
<html >
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <link rel="stylesheet" href="style.css" type="text/css">
    
    
    
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.6.7, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets2/images/logo4.png" type="image/x-icon">
  <meta name="description" content="">
  <title>CEG BULLETIN</title>
  <link rel="stylesheet" href="assets2/tether/tether.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets2/theme/css/style.css">
  <link rel="stylesheet" href="assets2/mobirise/css/mbr-additional.css" type="text/css">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
<style>

.button {
  border-radius: 4px;
  background-color: #47c9af  ;
  border: none;
  color: #FDFEFE;
  text-align: center;
  font-size: 10px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
    
    
</style>


</head>


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
setTimeout(hideMessage, 3000);

</script>

</body>
</html>




</script>


<body>

    
        <div id="content">
    
    
    
    
    <?php
    $username=$_SESSION['login_user'];
    ?>
    <h1 align=center style="font-size: 40px;background-color:#47c9af;color:white">CEG BULLETIN</h1>
    <br>
    <?php
    if ($_SESSION['Entered']==0)
    {
?>
    <h2 align=center style="font-size: 40px;color:#47c9af;" id="message_div">Welcome <?php echo $username?></h2>
    <?php
    $_SESSION['Entered']=1;
    }
    ?>
<?php
$connect=mysql_connect("localhost","id5043997_projectite","ceg.net");


mysql_select_db('id5043997_ceg');

$select="select * from upload order by image_id desc";
$result=mysql_query($select);

while($row=mysql_fetch_array($result))
{
	?>
	
	<br>
	<br>
	<br>
<section class="testimonials3 cid-qNT4sjtf5Q" id="testimonials3-s">

    

    

    <div class="container">
        <div class="media-container-row">
            <div class="media-content px-3 align-self-center mbr-white py-2">
                
              
                
                <p class="mbr-text testimonial-text mbr-fonts-style display-1"><?php echo $row['img_topic'];?></p>
                 <p class="mbr-author-name pt-4 mb-2 mbr-fonts-style display-7"><br><?php echo $row['img_description'];?></p></p><p></p><br><p>&nbsp;</p><p></p><p></p>
                 

                 <?php
                if($row['upload_by']==$_SESSION['userid'])
                {
                    ?>
                    
              <h1 class="mbr-author-name pt-4 mb-2 mbr-fonts-style display-7" style="color:black;">
                 
<form name="change1" action="uploaddel.php" method="POST"> 
<center><button class="button" name="del" value="<?php echo $row['image_id'];?>">DELETE</button></center>
</form>    

<form name="change2" action="uploadedit.php" method="GET"> 
<center><button class="button" name="edit" value="<?php echo $row['image_id'];?>">EDIT</button></center>
</form>
<br><br>

</h1>

                <?php
                }
                ?>   
                
                <p class="mbr-author-desc mbr-fonts-style display-7">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	<?php echo "UPLOADED BY :";?>
	<?php echo $row['uploader_name'];?></p>
                </p>
       

                
           
            </div>

            <div class="mbr-figure pl-lg-5" style="width: 155%;">
              <img src="<?php echo $row['image'];?>">
            </div>
        </div>
    </div>
</section>

 <section class="engine"><a href="https://mobirise.ws">Mobirise</a></section><script src="assets2/web/assets2/jquery/jquery.min.js"></script>
  <script src="assets2/popper/popper.min.js"></script>
  <script src="assets2/tether/tether.min.js"></script>
  <script src="assets2/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets2/smoothscroll/smooth-scroll.js"></script>
  <script src="assets2/theme/js/script.js"></script>
    
  <br>
  <br>
<?php
}
   mysql_close($connect);
}
?>
</body>
</html>