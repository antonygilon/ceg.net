

<!DOCTYPE html>
<html>
<head>

     <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.6.7, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets2/images/logo4.png" type="image/x-icon">
  <meta name="description" content="">
  <link rel="stylesheet" href="assets2/images/logo4/tether/tether.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets2/theme/css/style.css">
  <link rel="stylesheet" href="assets2/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body>
<h2>CEG BULLETIN</h2>

<?php
$connect=mysql_connect("localhost","id5043997_projectite","ceg.net");

mysql_select_db('id5043997_ceg');

$select="select * from upload";
$result=mysql_query($select);
?>



  	<?php
	while($row=mysql_fetch_array($result))
{
	?>
	
 

<section class="testimonials4 cid-qNSZ6APfCp" id="testimonials4-2d">

  

  
  <div class="container">
    
    
    <div class="col-md-10 testimonials-container"> 
      
  


      
    <div class="testimonials-item">
        <div class="user row">
          <div class="col-lg-3 col-md-4">
            <div class="user_image">
              <img src="<?php echo $row['image'];?>">
            </div>
          </div>
          <div class="testimonials-caption col-lg-9 col-md-8">
            <div class="user_text ">
              <p class="mbr-fonts-style  display-7">
                 <em><?php echo $row['img_description'];?></em>
              </p>
            </div>
            <div class="user_name mbr-bold mbr-fonts-style align-left pt-3 display-7">
                 <?php echo $row['img_topic'];?>
            </div>
            <div class="user_desk mbr-light mbr-fonts-style align-left pt-2 display-7">
                
				 <?php echo $row['uploader_name'];?>
            </div>
          </div>
        </div>
      </div>
	  </section>
	  
	    <?php

}?>
	  

  <script src="assets2/popper/popper.min.js"></script>
  <script src="assets2/tether/tether.min.js"></script>
  <script src="assets2/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets2/smoothscroll/smooth-scroll.js"></script>
  <script src="assets2/theme/js/script.js"></script>
	  
	  





</body>
</html>
<?php
mysql_close($connect);
?>