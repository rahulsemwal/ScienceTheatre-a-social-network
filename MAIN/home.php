<?php
session_start();
require_once("user_session.php");
$_SESSION['prev_page']="home";
//echo "<font color='black'> ".$_SESSION['u_id']." ".$_SESSION['name']."</font>";
require("home_function.php");
require("connection.php");
if(@$_SESSION['home_msg']!=""){
	echo '<script>alert("'.@$_SESSION['home_msg'].'");</script>';
	@$_SESSION['home_msg']="";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bucket</title>
<link rel="stylesheet" type="text/css" href="css/layout.css" />
<link rel="stylesheet" type="text/css" href="css/header.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/sidebar_right.css" />
<link rel="stylesheet" type="text/css" href="css/bucket_left.css" />


</head>

<body>
  

<!--header portion-->
<div id="header">
<?php include("header.php");?>
</div>
<!--nevigation portion-->
<!--<div id="navi">
<?php //include("navi.php");?>
</div>-->

<div id="content"><!--content portion-->

<div id="bucket_left"><!--bucket_left-->
  






  <?php require_once("first_col.php");?>
 
 
 
 
 
  <?php require_once("second_col.php");?> 
  
  
   
   
   
   
  <?php require_once("third_col.php");?> 
   
   
  
        
      

        

</div>
<!--end of bucket_left-->
<!--start of sidebar_right portion-->
<div id="sidebar_right">
<?php require_once("sidebar_right.php");?>
</div><!--end of sidebar_right-->
</div><!--end of content-->
</body>
</html>