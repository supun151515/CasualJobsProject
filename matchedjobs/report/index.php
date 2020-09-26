<?php
include("../../php/mpdf/autoload.php");
include ("../../php/db.php");

if(isset($_SESSION['profileidcv']) && $_SESSION['seekeridcv']){
	include ("../../seeker/report/index.php");

}else{
	echo "You have no permission to access this page";
}
?>