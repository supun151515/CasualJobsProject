<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}


if(isset($_SESSION['profileidcv']) && $_SESSION['seekeridcv']){
	include ("../../employer/report/index.php");

}else{
	echo "You have no permission to access this page";
	return false;
}
?>