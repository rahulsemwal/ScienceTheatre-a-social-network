<?php
session_start();
require_once("user_session.php");
$_SESSION['prev_page']="query_blog";
//echo "<font color='black'>".$_SESSION['u_id']." ".$_SESSION['name']."</font>";
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
<title>Query_Box</title>
<script  type="text/javascript" src="js/jquery.min.js"></script>
<script  type="text/javascript" src="js/query_blog.js"></script>
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
<?php //require_once("first_col.php");?>
  
<div class="query_blog">
  
    <div id="post">
    <form name="newpost" id="newpost" method="post" action="query_submit.php" enctype="multipart/form-data">
    <table border=0>
    <center><caption><font size="+1" color="#399">New</font> Post</caption></center>
    
    <tr><td><textarea class="area" cols="50" rows="2" name="newquery" id="newquery" placeholder="Write Your Query Here!!"></textarea></td></tr>
    <!--<tr><td><input class="submit" type="file" name="file" id="file" placeholder="file upload" />&nbsp;Attachments</td></tr>future -->
    <tr><td><input class="submit" type="submit" name="q_submit" id="q_submit" value="Post"/></td></tr>
     <tr><td>ERRORs here</td></tr>
    </table>
    </form>
    </div><!--end of post-->
    
	
	<?php echo "submitted post goes here";
	/*fetch_video();*//*fetchin videos function call*/	
    $query=mysql_query("select * from query_box order by q_id desc;");
	while($row=mysql_fetch_array($query)){
		$query2=mysql_query("select * from user where u_id='$row[u_id]'");
		$row_user=mysql_fetch_array($query2);
    ?>
	
    
    
    
    <div class="query">
    <header>
    
     
            <div style="height:auto; max-width:100%;margin-bottom:5%; word-wrap:break-word;">
            <img src="<?php echo $row_user['prof_pic']?>" height="40px" width="10%"  />
            <p><?php echo $row_user["name"];?></p>
            </div>
    
    
    </header>
    
   <div style="height:auto;width:100%; margin-bottom:5%;">
    <p id="discrip"><?php echo $row['query'];?></p>
    </div>
    
    <footer align="right">
    
    
         <?php
	       //like script
	       $query3=mysql_query("select * from query_clap where u_id=$_SESSION[u_id] and q_id=$row[q_id]");
	       $row_query_clap=mysql_fetch_array($query3);
	       if($_SESSION['u_id']==$row_query_clap['u_id'])
	          echo "<a href=\"clap.php?u_id="."$_SESSION[u_id]"."&q_id=$row[q_id]&ope=clapped&like=$row[like]&type=query"."\">Clapped</a>";
	       else
	          echo "<a href=\"clap.php?u_id="."$_SESSION[u_id]"."&q_id=$row[q_id]&ope=clap&like=$row[like]&type=query"."\">Clap</a>";
	       echo "+".$row['like'];  
	       //delete script
	        
	       if($_SESSION['u_id']==$row['u_id'])
	          echo "<a href=\"delete.php?u_id="."$_SESSION[u_id]"."&q_id=$row[q_id]&ope=delete&type=query"."\">Delete</a>";
	?>
    <!--<input type="button" id="hide" value="Comment" onclick="giveid(<?php //echo $row['q_id'];?>);">-->
    
 </footer>
 


<div id="<?php echo $row['q_id'];?>" class="comment_box">
   <table class="comment_table">
   <caption>Comment</caption>
   <?php
     $query_comment=mysql_query("select * from query_comment where q_id='$row[q_id]'");
	 
	 while($row_query_comment=mysql_fetch_array($query_comment)){
		 $query_user=mysql_query("select * from user where u_id='$row_query_comment[u_id]'");
		 $row_user_comment=mysql_fetch_array($query_user);
		 echo '<tr><td width="20%">'.$row_user_comment['name'].'</td>';
		 echo '<td width="80%">'.$row_query_comment['comment'].'</td></tr>';
		 
		 }  
      
   ?>
   
   </table>
   <table>
   <tr bordercolordark="#3333FF">
      <td align="right" width="20%"><div style="height:auto; max-width:100%;margin-bottom:5%; word-wrap:break-word;">
            <?php
              $query4=mysql_query("select * from user where u_id=$_SESSION[u_id]");
			  $row_user_insert_comment=mysql_fetch_array($query4);
			?>
            <img src="<?php echo $row_user_insert_comment['prof_pic']?>" height="40px" width="30%"  />
            <p><?php echo $row_user_insert_comment["name"];?></p>
            </div>
       </td>
       <td width="80%"> <form name="do_comment" method="post" action="comment_insert.php" enctype="multipart/form-data">
             <input type="hidden" name="q_id" value="<?php echo $row['q_id'];?>" />
             <input type="hidden" name="u_id" value="<?php echo $row_user_insert_comment['u_id']; ?>" />
             <textarea name="your_comment" id="your_comment" draggable="false" spellcheck="true" placeholder="write comment!!" rows="2" cols="40" required="required"></textarea>
            <input type="submit" name="comment_submit" value="comment" />
            </form>
        </td>
   </tr>
   <!--<tr><td>&nbsp</td>
   <td><input type="button" id="close" value="close" /></td>
   </tr>-->
</table>


</div><!--end of comment_box-->
    </div><!--end of query-->
   <?php
	}
	?> 
    

 
</div>
</div>
<!--end of bucket_left-->
<!--start of sidebar_right portion-->
<div id="sidebar_right">
<?php require_once("sidebar_right.php");?>
</div><!--end of sidebar_right-->
</div><!--end of content-->
</body>
</html>