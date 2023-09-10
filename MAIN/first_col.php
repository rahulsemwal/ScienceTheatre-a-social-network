<div class="first_col">  
    <div id="post">
    <form name="newpost" id="newpost" method="post" action="upload.php" enctype="multipart/form-data">
    <table border=0>
    <center><caption><font size="+1" color="#399">New</font> Post</caption></center>
    <tr><td><input class="text" type="text" name="post_title" id="post_title" placeholder="Title" /></td></tr>
    <tr><td><textarea class="area"  name="discription" id="disccription" placeholder="Discription" ></textarea></td></tr>
    <tr><td><input class="submit" type="file" name="file" id="file" placeholder="file upload" />&nbsp;Attachments</td></tr>
    <tr><td><input class="submit" type="submit" name="upload" id="upload" value="Post"/></td></tr>
     <tr><td>ERRORs here</td></tr>
    </table>
    </form>
    </div><!--end of post-->
    
	
	<?php echo "submitted post goes here";
	/*fetch_video();*//*fetchin videos function call*/	
    $query=mysql_query("select * from video order by v_id desc;");
	while($row=mysql_fetch_array($query)){
		$query2=mysql_query("select * from user where u_id='$row[u_id]'");
		$row_user=mysql_fetch_array($query2);
    ?>
	
    
    
    
    <div id="video">
    <header>
    
      <span style="float:left; width:80%"><p id="title"><?php echo $row['title'];?></p>
    <p id="discrip"><?php echo $row['discription'];?></p></span>
    <span style="float:right; width:20%"><img src="<?php echo $row_user['prof_pic']?>" height="40px" width="100%"  /><p><center><?php echo $row_user["name"];?></center></p></span>
    </header>
    <!--<embed src="<?php //echo $row['link'];?>" width="" height="" autostart="false"></embed>-->
    <a href="<?php echo $row['link'];?>"><video controls="" height="160px" width="100%" >
    <source src="<?php echo $row['link'];?>" />
    </video></a>
    <footer align="right">
    
    <?php
	//like script
	$query3=mysql_query("select * from video_clap where u_id=$_SESSION[u_id] and v_id=$row[v_id]");
	$row_video_clap=mysql_fetch_array($query3);
	if($_SESSION['u_id']==$row_video_clap['u_id'])
	   echo "<a href=\"clap.php?u_id="."$_SESSION[u_id]"."&v_id=$row[v_id]&ope=clapped&like=$row[like]&type=video"."\">Clapped</a>";
	else
	   echo "<a href=\"clap.php?u_id="."$_SESSION[u_id]"."&v_id=$row[v_id]&ope=clap&like=$row[like]&type=video"."\">Clap</a>";
	 echo "+".$row['like'];  
	//delete script
	$disable="";
	if($_SESSION['u_id']==$row['u_id'])
	   echo "<a href=\"delete.php?u_id="."$_SESSION[u_id]"."&v_id=$row[v_id]&ope=delete&type=video"."\">Delete</a>";
	?>
    
    
    </footer>
    </div><!--end of video-->
   <?php
	}
	?> 
    

  </div><!--ending of 1st_col-->