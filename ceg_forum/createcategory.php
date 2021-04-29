<?php
session_start();
include 'header.php';
include 'connect.php';
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

 
 <?php
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    

   ?>
   
   <br>
   <div>
   <form method="POST" action="">
        Category name: <input type="text" name="cat_name" required /><br><br>
        Category description: <textarea name="cat_description" required/></textarea><br><br>
        <input type="submit" value="Add category" />
        </form>
<div>


<?php
}



else
{
    $cat_name=$_POST['cat_name'];
    $cat_description=$_POST['cat_description'];
    
    $sql = "INSERT INTO categories(cat_name, cat_description)
       VALUES('$cat_name' , '$cat_description' ) ";
   
   
    $result = mysql_query($sql);
    if(!$result)
    {
        
        echo 'Error' . mysql_error();
    }
    else
    {
        echo 'New category successfully added.';
    }
}
?>