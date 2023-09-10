<?php
session_start();
require_once("connection.php");


echo "<br>";
if($_REQUEST['type']=="video"){
	echo $_REQUEST['u_id']."  ".$_REQUEST['v_id']." ".$_REQUEST['ope']." ".$_REQUEST['like']." ".$_REQUEST['type'];
    if($_REQUEST['ope']=="clap"){
	   $_REQUEST['like']=$_REQUEST['like']+1;
       $query_video=mysql_query("UPDATE `video` SET `like`='$_REQUEST[like]' WHERE `v_id`='$_REQUEST[v_id]'");
       if($query_video)
          echo "<br> update success";
       else
          echo "<br> update not success";
       $query_video_clap=mysql_query("insert into video_clap(`v_id`,`u_id`) values('$_REQUEST[v_id]','$_REQUEST[u_id]')");
       $_SESSION['home_msg']="clapped";
       header("location:$_SESSION[prev_page].php");
       }
     else if($_REQUEST['ope']=="clapped"){
	   $_REQUEST['like']=$_REQUEST['like']-1;
       $query_video=mysql_query("UPDATE `video` SET `like`='$_REQUEST[like]' WHERE v_id='$_REQUEST[v_id]'");
       if($query_video)
          echo "<br> update success";
       else
          echo "<br> update not success";
  
       $query_video_clap=mysql_query("DELETE from video_clap where u_id='$_REQUEST[u_id]' and v_id='$_REQUEST[v_id]'");
       if($query_video_clap)
          echo "<br>deleted";
       else
          echo "<br>deleted";
       $_SESSION['home_msg']="No clap";
       header("location:$_SESSION[prev_page].php");
   
   }
}
elseif($_REQUEST['type']=="document"){
	   echo $_REQUEST['u_id']."  ".$_REQUEST['d_id']." ".$_REQUEST['ope']." ".$_REQUEST['like']." ".$_REQUEST['type'];
	   
	   if($_REQUEST['ope']=="clap"){
	      $_REQUEST['like']=$_REQUEST['like']+1;
          $query_document=mysql_query("UPDATE `document` SET `like`='$_REQUEST[like]' WHERE `d_id`='$_REQUEST[d_id]'");
          if($query_document)
             echo "<br> update success";
          else
             echo "<br> update not success";
          $query_document_clap=mysql_query("insert into document_clap(`d_id`,`u_id`) values('$_REQUEST[d_id]','$_REQUEST[u_id]')");
		  if($query_document_clap)
		     echo "<br>document_clap insert";
		  else
		     echo "<br>no document_clap insert";
			  
          $_SESSION['home_msg']="clapped";
          header("location:$_SESSION[prev_page].php");
       }
       else if($_REQUEST['ope']=="clapped"){
	           $_REQUEST['like']=$_REQUEST['like']-1;
               $query_document=mysql_query("UPDATE `document` SET `like`='$_REQUEST[like]' WHERE d_id='$_REQUEST[d_id]'");
               if($query_document)
                  echo "<br> update success";
                else
                  echo "<br> update not success";
  
               $query_document_clap=mysql_query("DELETE from document_clap where u_id='$_REQUEST[u_id]' and d_id='$_REQUEST[d_id]'");
               if($query_document_clap)
                  echo "<br>deleted";
               else
                  echo "<br>deleted";
               $_SESSION['home_msg']="No clap";
               header("location:$_SESSION[prev_page].php");
   
   }
	
}


elseif($_REQUEST['type']=="query"){
	 echo $_REQUEST['u_id']."  ".$_REQUEST['q_id']." ".$_REQUEST['ope']." ".$_REQUEST['like']." ".$_REQUEST['type'];
	   
	   if($_REQUEST['ope']=="clap"){
	      $_REQUEST['like']=$_REQUEST['like']+1;
          $query_document=mysql_query("UPDATE `query_box` SET `like`='$_REQUEST[like]' WHERE `q_id`='$_REQUEST[q_id]'");
          if($query_document)
             echo "<br> update success";
          else
             echo "<br> update not success";
          $query_document_clap=mysql_query("insert into query_clap(`q_id`,`u_id`) values('$_REQUEST[q_id]','$_REQUEST[u_id]')");
		  if($query_document_clap)
		     echo "<br>document_clap insert";
		  else
		     echo "<br>no document_clap insert";
			  
          $_SESSION['home_msg']="clapped";
          header("location:$_SESSION[prev_page].php");
      }
       else if($_REQUEST['ope']=="clapped"){
	           $_REQUEST['like']=$_REQUEST['like']-1;
               $query_document=mysql_query("UPDATE `query_box` SET `like`='$_REQUEST[like]' WHERE q_id='$_REQUEST[q_id]'");
               if($query_document)
                  echo "<br> update success";
                else
                  echo "<br> update not success";
  
               $query_document_clap=mysql_query("DELETE from query_clap where u_id='$_REQUEST[u_id]' and q_id='$_REQUEST[q_id]'");
               if($query_document_clap)
                  echo "<br>deleted";
               else
                  echo "<br>deleted";
               $_SESSION['home_msg']="No clap";
               header("location:$_SESSION[prev_page].php");
   
   }
}//end query
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