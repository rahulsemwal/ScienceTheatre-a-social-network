<?php
session_start();
require_once("connection.php");
$_SESSION['name']=@$_POST['name'];
$_SESSION['username']=@$_POST['username'];
$_SESSION['dob']=@$_POST['dob'];
$_SESSION['gender']=@$_POST['gender'];
$_SESSION['email']=@$_POST['email'];
$date=date("Y/m/d");
$avail_email=mysql_query("select * from user where email='$_SESSION[email]';");

if($_SESSION['username']==""||$_SESSION['dob']=""||$_SESSION['gender']=""||$_SESSION['email']==""){
	session_unset();
	session_destroy();
	session_start();
	$_SESSION['signup_success']="Fill all the values first!!";/*for alert*/
	$_SESSION['signup_error']=$_SESSION['signup_success'];/*for display msg*/
	header("location:index.php");
	die();
	}
elseif(@mysql_num_rows($avail_email)>=1){
	session_unset();
	session_destroy();
	session_start();
	$_SESSION['signup_error']="Account with this email address is already exist!!";
	header("location:index.php");
	die();
	}	
elseif(isset($_REQUEST['signup'])){
	echo $_SESSION['name'];
	echo "<br>".$_SESSION['username'];
	echo "<br>".$_SESSION['dob'];
	echo "<br>".$_SESSION['gender'];
	echo "<br>".$_SESSION['email'];
    	
	$query=@mysql_query("insert into user (`name`,`username`,`dob`,`gender`,`email`) 
	values('$_SESSION[name]','$_SESSION[username]','$_SESSION[dob]','$_SESSION[gender]','$_SESSION[email]')");
	echo "<script>alert('$_SESSION[name] has been successfully registered for ScienceTheatre');</script>";
	$u_id=mysql_query("select u_id from user where name='$_SESSION[name]' and email='$_SESSION[email]';");	
	$row_u_id=mysql_fetch_array($u_id);
		$pass_maker=$row_u_id['u_id'] + 3;
		$rand=rand();
		$pass_maker=$pass_maker * $rand;
		$update_pass=mysql_query("update user set password='$pass_maker' where u_id=$row_u_id[u_id]");
		//if($update_pass) echo "<br>".$pass_maker." is updated"; else echo "<br>".$pass_maker." is not updated";
		$msg="your user name is: ".$_SESSION['name']." And password:".$pass_maker." LINK www.Sciencetheatre.orgfree.com";
		
		$from="mastrahul1942@gmail.com";
		
		$header="FROM: ".$from;
		
	 if(mail($_SESSION['email'],"scienceTheatre",$msg,$header)){
		 $_SESSION['signup_error']="Your username and password is sended to your mail.check it out";
		 $_SESSION['signup_success']=$_SESSION['signup_error'];
		
		 }
	 else{ $_SESSION['signup_error']="Your username is ".$_SESSION['name']." And password is ".$pass_maker." ,immediately save it please.";
		   $_SESSION['signup_success']=$_SESSION['signup_error'];
		   
	 }
	
		
		header("location:index.php");
		
			
	
}//isset close

?>