<div class="header_left">
   <div id="logo">
     <img src="image/logo.png" width="30%" height="30px" />

    </div>
   <div id="web_name"><p>ScienceTheatre</p></div>

</div>
 <?php

            if(@$_SESSION['u_id']!=""){
                $query_prof_pic=mysql_query("select * from user where u_id=$_SESSION[u_id]");
                $row_prof_pic=mysql_fetch_array($query_prof_pic);

       ?>
<div class="header_right">
       

    <div class="user_name"><p><a href="mydesk.php"><?php echo $row_prof_pic['name'];?></a></p></div>
    <div class="prof_pic"><img src="<?php echo $row_prof_pic['prof_pic']; ?>" width="100%" height="40px" /></div>
    <div  id="logout"><p><a  href="logout.php">Logout</a></p></div>
</div>


<?php }?>