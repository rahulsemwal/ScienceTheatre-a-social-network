<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db('project_x',$con)or die(mysql_error());
$today=date("l");
$sub_today=substr(strtolower($today),0,3);
//echo $sub_today;
//$date=date("y/m/d");
//echo "<font color='#0000'>".$date."</font>";

?>