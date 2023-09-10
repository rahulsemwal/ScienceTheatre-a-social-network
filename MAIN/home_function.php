<?php
//function covering home.php
require_once("connection.php");
function fetch_video(){
	echo "rahul function is working";
	$query=mysql_query("select * from video order by submit_date desc;");
	
	}

?>