<?php
session_start();
require_once("connection.php");

 if($_REQUEST['type']=="video"){    
     echo $_REQUEST['u_id']."  ".$_REQUEST['v_id']." ".$_REQUEST['type'];
	 $query_video=mysql_query("delete from video where v_id=$_REQUEST[v_id]");
     if($query_video)
        echo "<br>delete from video";
     $query_video_clap=mysql_query("delete from video_clap where v_id=$_REQUEST[v_id]");
     if($query_video_clap)
        echo "<br>delete from video_clap";
     $_SESSION['home_msg']="Deleted";
	 header("location:$_SESSION[prev_page].php");
	 
 }
elseif($_REQUEST['type']=="document"){
	   echo $_REQUEST['u_id']."  ".$_REQUEST['d_id']." ".$_REQUEST['type'];
	   $query_document=mysql_query("delete from document where d_id=$_REQUEST[d_id]");
       if($query_document)
          echo "<br>delete from video";
       $query_document_clap=mysql_query("delete from document_clap where d_id=$_REQUEST[d_id]");
       if($query_document_clap)
          echo "<br>delete from video_clap";
       $_SESSION['home_msg']="Deleted";
	   header("location:$_SESSION[prev_page].php");
	
	
	
	
	
	
	} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>