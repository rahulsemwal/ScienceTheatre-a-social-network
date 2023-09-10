<div class="second_col"><!--start of even document post-->
  <?php echo "submitted post goes here";
	/*fetch_video();*//*fetchin videos function call*/	
    $query=mysql_query("select * from document order by d_id desc;");
	while($row=mysql_fetch_array($query)){/*start of while*/
		$query2=mysql_query("select * from user where u_id='$row[u_id]'");
		$row_user=mysql_fetch_array($query2);
    ?>
	
    
    
    <?php if($row['d_id']%2!=0){/*$row['d_id']%2!=0 odd documents goes here*/?>
    <div class="document">
    <header>
    <span style="float:left; width:80%"><p id="title"><?php echo $row['title'];?></p>
    </span>
    <span style="float:right; width:20%">
    <img src="<?php echo $row_user['prof_pic']?>" height="40px" width="100%"  />
    <p><center><?php echo $row_user["name"];?></center></p>
    </span>
    </header>
    <?php if($row['link']!=""){/*start of nonempty links*/?>
        <br />
        <p id="discrip"><?php echo $row['discription'];?></p>
    
        <a href="<?php echo $row['link'];?>"><img src="image/doc.png" height="13%" width="30%"/></a>
     <?php }/*end of nonempty link*/
	 elseif($row['link']==""){/*start of empty links*/?>  
        <div style="margin-top:5%; background-color:#CC6699;">
            <?php echo $row['discription'];?>
        </div>
     
     <?php }/*end of empty link*/?> 
     
    <footer align="right">
    
    <?php
	//like script
	$query3=mysql_query("select * from document_clap where u_id=$_SESSION[u_id] and d_id=$row[d_id]");
	$row_document_clap=mysql_fetch_array($query3);
	if($_SESSION['u_id']==$row_document_clap['u_id'])
	   echo "<a href=\"clap.php?u_id="."$_SESSION[u_id]"."&d_id=$row[d_id]&ope=clapped&like=$row[like]&type=document"."\" >Clapped</a>";
	else
	   echo "<a href=\"clap.php?u_id="."$_SESSION[u_id]"."&d_id=$row[d_id]&ope=clap&like=$row[like]&type=document"."\" >Clap</a>";
	 echo "+".$row['like'];  
	//delete script
	$disable="";
	if($_SESSION['u_id']==$row['u_id'])
	   echo "<a href=\"delete.php?u_id="."$_SESSION[u_id]"."&d_id=$row[d_id]&ope=delete&type=document"."\" >Delete</a>";
	?>
    
    
    </footer>
    </div><!--end of document-->
   <?php
	}/*end of odd document*/
	?> 
      
  
  <?php }/*end of while*/?>
  </div><!--end second_col-->