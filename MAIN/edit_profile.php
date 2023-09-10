<?php
session_start();
require_once("user_session.php");
//echo "<font color='black'> ".$_SESSION['u_id']." ".$_SESSION['name']."</font>";
require("home_function.php");
require("connection.php");
if(@$_SESSION['home_msg']!=""){
	echo '<script>alert("'.@$_SESSION['home_msg'].'");</script>';
	@$_SESSION['home_msg']="";
	}
?>
<?php
/*update profile*/
if(isset($_REQUEST['update'])){
/*echo "<font color='black'>";
echo "<br>pic ".$_FILES['prof_pic']['name'];
echo "<br>cv ".$_FILES['cv']['name'];
echo "<br>name ".$_POST['name'];
echo "<br>gender ".$_POST['gender'];
echo "<br>profession ".$_POST['profession'];
echo "<br>u_id ".$_POST['u_id'];
echo "<br>dob ".$_POST['dob'];
echo "</font>";*/
if(isset($_POST['dob'])){
	if($_POST['dob'])
	$update_dob=mysql_query("update user set dob=$_POST[dob] where u_id=$_POST[u_id];");
	   //if($update_dob)
	      //echo "date updated";
		//else
		  //echo "date updation problem";  
	}

if($_FILES['prof_pic']['name']!="" && $_FILES['cv']['name']!=""){
    //need deletion of previous pic and cv 
	
	move_uploaded_file(@$_FILES["cv"]["tmp_name"],"curriculum_vitae/".@$_FILES["cv"]["name"]);
	move_uploaded_file(@$_FILES["prof_pic"]["tmp_name"],"prof_pic/".@$_FILES["prof_pic"]["name"]);
	$cv_link="curriculum_vitae/".@$_FILES["cv"]["name"];
	
	$prof_pic_link="prof_pic/".@$_FILES["prof_pic"]["name"];
	$cv_name=$_FILES["cv"]["name"];
	$update=mysql_query("update user set name='$_POST[name]',gender='$_POST[gender]',profession='$_POST[profession]',prof_pic='$prof_pic_link',cv_name='$cv_name',cv_link='$cv_link' where u_id='$_POST[u_id]'");
	//if($update)
	//echo "<br> success";
	//else
	//echo "<br> no way dear";
  }
  elseif($_FILES['prof_pic']['name']!="" && $_FILES['cv']['name']==""){
         
	move_uploaded_file(@$_FILES["prof_pic"]["tmp_name"],"prof_pic/".@$_FILES["prof_pic"]["name"]);
	$prof_pic_link="prof_pic/".@$_FILES["prof_pic"]["name"];
    
	$update=mysql_query("update user set name='$_POST[name]',gender='$_POST[gender]',profession='$_POST[profession]',prof_pic='$prof_pic_link' where u_id='$_POST[u_id]'");
	//if($update)
	//echo "<br> success";
	//else
	//echo "<br> no way dear";
  }
  elseif($_FILES['prof_pic']['name']=="" && $_FILES['cv']['name']!=""){
	   //need deletion of previous pic and cv 
	
	move_uploaded_file(@$_FILES["cv"]["tmp_name"],"curriculum_vitae/".@$_FILES["cv"]["name"]);
	
	$cv_link="curriculum_vitae/".@$_FILES["cv"]["name"];
	$cv_name=$_FILES["cv"]["name"];
	$update=mysql_query("update user set name='$_POST[name]',gender='$_POST[gender]',profession='$_POST[profession]',cv_name='$cv_name',cv_link='$cv_link' where u_id='$_POST[u_id]'");
	//if($update)
	//echo "<br> success";
	//else
	//echo "<br> no way dear";
	  }
  else{
	  $update=mysql_query("update user set name='$_POST[name]',gender='$_POST[gender]',profession='$_POST[profession]' where u_id='$_POST[u_id]'");
	//if($update)
	//echo "<br> success";
	//else
	//echo "<br> no way dear";
		 } 
	$_POST['update']="";
	$_SESSION['home_msg']="Updating Your Profile";
	header("location:$_SESSION[prev_page].php");
	
}//isset close
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
  






 
 
 
 
 
 <div class="forth_col" style="margin-left:22%;"><!--start of forth_col-->
   <div class="profile"> 
 <?php
 $query=mysql_query("select * from user where u_id=$_SESSION[u_id]");
 $row_user_profile=mysql_fetch_array($query);
 ?>
  <form name="update_profile" action="#" method="post" enctype="multipart/form-data">
  <span style="float:right; width:8%"> <img src="<?php echo $row_user_profile['prof_pic']?>" height="40px" width="100%"  /></span>
  <span style="float:right; margin-right:2%;">Change Pic:&nbsp;<input type="file" name="prof_pic" />  </span>
  <table border="0" width="100%" align="center" cellpadding="3px" cellspacing="4px">  
  <tr>
   <td width=""><p><label for="cname">Name:</label></p></td>
   <td><input type="text" name="name" value="<?php echo $row_user_profile['name'];?>" placeholder="Your Name" /></td>
  </tr>
  
  <tr>
    <td><p><label for="cname">Date Of Birth:</label></p></td>
    <td><input type="date" name="dob" value"<?php echo $row_user_profile['dob'];?>" placeholder="Date Of Birth" /></td>
  <tr>
    <td><p><label for="cname">Gender:</label></p></td>
    <td><input type="text" name="gender" value="<?php echo ucfirst($row_user_profile['gender']);?>" placeholder="Gender" /></td>
  </tr>
  
  <tr> 
   <td><p><label for="cname">Profession:</label></p></td>
   <td><input type="text" name="profession" value="<?php echo ucfirst($row_user_profile['profession']);?>" placeholder="profession" /></td>
  </tr>
  
  <tr>
   <td><p><label for="cname">Curriculum Vitae(CV):</label></p></td>
   <td><p><a href="<?php echo $row_user_profile['cv_link'];?>"><?php echo ucfirst($row_user_profile['cv_name']); ?></a></p>
        <input type="file" name="cv" placeholder="upload cv" />
   </td>
  </tr>
  <tr>
   <td><input type="hidden" name="u_id" value="<?php echo $_SESSION['u_id']; ?>" /></td>
   <td><input type="submit" name="update" value="Update" /></td>
  </tr>
 </table>

 <span style="float:right; width:20%"><?php echo "<a href='home.php'>Back</a>";  ?></span>
 
 
 
   
   
   
   
   </div><!--end of profile-->
 </div><!--end of forth_col-->
 
  <?php //require_once("second_col.php");?>
   
   
   
  <?php //require_once("third_col.php");?> 
   
   
  
        
      

        

</div>
<!--end of bucket_left-->
<!--start of sidebar_right portion-->
<div id="sidebar_right">
<?php require_once("sidebar_right.php");?>
</div><!--end of sidebar_right-->
</div><!--end of content-->
</body>
</html>