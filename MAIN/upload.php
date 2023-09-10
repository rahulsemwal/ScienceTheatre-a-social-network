<?php
session_start();
require("connection.php");
if(isset($_REQUEST["upload"])){
	echo "isset running";
	
   if(@$_FILES["file"]["size"]!=0&&@$_FILES["file"]["error"]>0)
     {
	    echo "Error on uploading attachment!!please try again:".$_FILES["file"]["error"];
     }
	 else if(@$_FILES["file"]["size"]!=0)
     {  $file_structure = array();
	    $file_structure[1]="Upload: ".@$_FILES["file"]["name"];
	    $file_structure[2]="Upload: ".@$_FILES["file"]["type"];
		$file_structure[3]="Upload: ".@$_FILES["file"]["size"]/1024;
		$file_structure[4]="Upload: ".@$_FILES["file"]["tmp_name"];
		//echo "Upload:".@$_FILES["file"]["name"];
	    //echo "Type:".@$_FILES["file"]["type"];
	    //echo "Size:".(@$_FILES["file"]["size"]/1024)."Kb<br>";
	    //echo "Upload:".@$_FILES["file"]["tmp_name"]."<br>";
          foreach($file_structure as $row){
			  echo  " <br> " . $row . "<br>";
			  
			  }		  
		  
		  if(@$_FILES["file"]["type"]=="video/mp4"||@$_FILES["file"]["type"]=="video/avi"||@$_FILES["file"]["type"]=="video/mpeg"||@$_FILES["file"]["type"]=="video/flv"||@$_FILES["file"]["type"]=="video/3gp"){
	         move_uploaded_file(@$_FILES["file"]["tmp_name"],"video/".@$_FILES["file"]["name"]);
	         echo "Image Uploaded:"."video/".@$_FILES["file"]["name"];
			 $link="video/".@$_FILES["file"]["name"];
			 //$u_id=1;
			 $date=date("y-m-d");
			 require("upload_video.php");
			/*upload($u_id,$link,$date);*/
			  $query=mysql_query("insert into     video(`u_id`,`title`,`discription`,`link`,`submit_date`,`update`)values('$_SESSION[u_id]','$_REQUEST[post_title]','$_REQUEST[discription]','$link','$date','1');");
			  if($query){
		   		echo "<br><br>video uploaded";
				$_SESSION['home_msg']=" Video Uploaded Succussfully";
				header("location:$_SESSION[prev_page].php");
			  }
      }/*end of video uploads*/
	  else{/*other format uploads*/
	       move_uploaded_file(@$_FILES["file"]["tmp_name"],"document/".@$_FILES["file"]["name"]);
	         echo "Image Uploaded:"."document/".@$_FILES["file"]["name"];
		   $link="document/".@$_FILES["file"]["name"];	 
		   $date=date("y-m-d");
		   $query=mysql_query("insert into  document(`u_id`,`title`,`discription`,`link`,`submit_date`,`update`)values('$_SESSION[u_id]','$_REQUEST[post_title]','$_REQUEST[discription]','$link','$date','1');");
			   if($query){
				echo "<br><br>document uploaded";
				$_SESSION['home_msg']="Document Uploaded Succussfully";
				header("location:$_SESSION[prev_page].php");
				
			   }
		  
		  }
	  
	 }
    }/*end of isset*/
/*else of isset*/
else{

	
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