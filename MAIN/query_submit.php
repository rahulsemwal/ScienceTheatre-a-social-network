<?php
session_start();
require_once("connection.php");

if($_REQUEST['newquery']!=""){
	$date=date("y/m/d");
	
	if(isset($_REQUEST['q_submit'])){
		
				
		$query=mysql_query("insert into query_box (u_id,query,submit_date) values('$_SESSION[u_id]','$_REQUEST[newquery]','$date')");
		if($query){
			echo "<br>insert success";
			$_SESSION['home_msg']="Hearing your Query Now";
			header("location:$_SESSION[prev_page].php");
			}
		else{
			echo "<br>insert not success";
			}	
		
		}/*isset close*/
	
	
	}


?>