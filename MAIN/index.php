<?php 
session_start();

if(@$_SESSION['u_id']!="")
    header("location:home.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="viewport" width="device-width" />
<title>project_x</title>
<link rel="stylesheet" type="text/css" href="css/layout.css" />
<link rel="stylesheet" type="text/css" href="css/header.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/sidebar_right.css" />
<link rel="stylesheet" type="text/css" href="css/bucket_left.css" />
<style type="text/css">
body{
		background-color:#FFFFFF;
	
	}

</style>
<script type="text/javascript">
<?php 
  if(@$_SESSION['unauthorized']!=""){ ?>
        
		alert("<?php echo $_SESSION['unauthorized']; ?>");
        
		
		
		<?php @$_SESSION['unauthorized']="";
		}
		
		?>
<?php 
  if(@$_SESSION['signup_success']!=""){ ?>
        
		alert("<?php echo $_SESSION['signup_success']; ?>");
        
		
		
		<?php @$_SESSION['signup_success']="";
		}
		
		?>		
</script>

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
<!--content portion-->
<div id="content">
<!--bucket_left-->
  
     <div id="signin">
     
     <form name="login" method="post" action="login.php">
     <table border=0  width="auto">
     <center><caption><font size="+1" color="#399">Log</font>In</caption></center>
     <tr><td><input class="text" type="text" name="username" id="username" placeholder="Username"/></td></tr>
     <tr><td><input class="text" type="password" name="password" id="password" placeholder="Password"/></td></tr>
     <tr><td><input class="submit" type="submit" name="login" id="login" value="Let Me In"/></td></tr>
     <tr><td><?php if(@$_SESSION['signin_error']!=""){ echo $_SESSION['signin_error'];} $_SESSION['signin_error']="";?></td></tr>
     </table>
     </form>
     
     </div>
     <div id="signup">
      
       <form name="signup" method="post" action="signup.php">
     <table border=0 width="auto">
     <center><caption><font size="+1" color="#399">Sign</font>up</caption></center>
      <tr><td><input class="text" type="text" name="name" id="name" placeholder="Name"/></td></tr>
     <tr><td><input class="text" type="text" name="username" id="username" placeholder="Username"/></td></tr>
     <tr><td><input class="text" type="date" name="dob" id="dob" placeholder="Date of birth"/></td></tr>
     <tr><td><input class="" type="radio" name="gender" id="gender" value="male"/>Male<input class="" type="radio" name="gender" id="gender"value="female"/>Female</td></tr> 
    <!-- <tr><td><input class="text" type="text" name="rollno" id="rollno" placeholder="University Rollno"/></td></tr>-->
     <tr><td><input class="text" type="email" name="email" id="email" placeholder="Email"/></td></tr>
     <tr><td><input class="submit" type="submit" name="signup" value="SignUp"/></td></tr>
     <tr><td><?php if(@$_SESSION['signup_error']!=""){ echo '<font color="#990033">'.$_SESSION['signup_error'];} $_SESSION['signup_error']=""."</font>";?></td></tr>
     </table>
     </form>
     </div>
 
   
<!--end of bucket_left-->
<!--start of sidebar_right/bucket_right portion-->
<!--<div id="sidebar_right">
Daily Updates
</div>-->
<!--end of right sidebar-->
</div>
<!--end of content-->

<!--footer portion-->
<div id="footer">
@Copyright by Rahul Semwal
<?php //include("footer.php");?>

</div>
</body>
</html>