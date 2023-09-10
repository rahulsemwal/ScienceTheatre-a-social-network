<?php
session_start(); 
include("connection.php");
@$error="";
if(isset($_REQUEST['login']))
{
//echo "running";
ini_set("display_errors",0);
$_SESSION['uname']=$_REQUEST['username'];
$_SESSION['pass']=$_REQUEST['password'];

$sql=mysql_query("select * from user where username='$_SESSION[uname]' and password='$_SESSION[pass]'");
  
  
  if(mysql_num_rows($sql)==1)//read no of rows
       {
		   $row=mysql_fetch_array($sql);
	       $_SESSION['u_id']=$row[0];
		   $_SESSION['name']=$row[1];
		   echo $_SESSION['u_id'];
    	   header("location:home.php");
	
		}
	else
		{
			session_unset();
			session_destroy();
			session_start();
			$_REQUEST['f_submit']="";
		  $error="Sorry username and password  mismatch!";
		  $_SESSION['signin_error']="Sorry username and password  mismatch!";
		  header("location:index.php");
		}//else close
}//isset close
else
echo "no isset call"
?>