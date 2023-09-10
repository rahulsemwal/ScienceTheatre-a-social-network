<?php
session_start();
include("connection.php");
if(isset($_REQUEST['comment_submit'])){
	echo "<br>".$_REQUEST['q_id'];
	echo "<br>".$_REQUEST['u_id'];
	echo "<br>".$_REQUEST['your_comment'];
	$date=date("y-m-d");
	$query=mysql_query("insert into query_comment(u_id,q_id,comment,submit_date) values('$_REQUEST[u_id]','$_REQUEST[q_id]','$_REQUEST[your_comment]','$date');");
	if($query){
		echo "insert success";
		$_SESSION['home_msg']="comment inserted";
		header("location:$_SESSION[prev_page].php");}
	else{
		echo "insert not success";
		}	
	
	}

?>