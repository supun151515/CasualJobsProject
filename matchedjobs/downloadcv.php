<?php
include ('../php/db.php');
include ('../php/session.php');
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}


$allData = new stdClass();
$empID = $_SESSION['id'];
$matchid = $_POST['matchid'];
$_SESSION['created_date'] = $_POST['created_date'];
$_SESSION['created_time'] = $_POST['created_time'];
$smt = $con->prepare("SELECT * FROM jobmatch WHERE id=? AND empid=?");
$smt->execute(array($matchid, $empID));
$rowCount = $smt->rowCount();
if($rowCount == 0){
	echo "error";
	return false;
}
$row = $smt->fetch(PDO::FETCH_OBJ);
$_SESSION['profileidcv'] = $row->profileid;
$_SESSION['seekeridcv'] = $row->seekerid;
echo "ok";
return false;

?>