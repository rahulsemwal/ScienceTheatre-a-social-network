<?php 
require_once("connection.php");
$query1=mysql_query("select * from video where u_id=1");
$query2=mysql_query("select * from document where u_id=1");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
while($row1=mysql_fetch_array($query1)&&$row2=mysql_fetch_array($query2)){
?>
<div>
<p><?php 
if($row1!="")
echo $row1['v_id']."&nbsp;".$row1['u_id'];?></p>

</div>
<div>

<p><?php 
if($row2!="")
echo $row2['d_id']."&nbsp;".$row2['u_id'];?></p>

</div>



<?php
	
	}

?>



</body>
</html>