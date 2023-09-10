
<?php
if(isset($_SESSION['u_id']))
{

}
else
{
	@$_SESSION['unauthorized']="unauthorized access!!pls login again";
	header("location:index.php");
}



?>


