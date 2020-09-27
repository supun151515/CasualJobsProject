<?php
include ('../php/db.php');
include ('../php/session.php');
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}


$allData = new stdClass();
$seekerid = $_SESSION['id'];
$matchid = $_POST['matchid'];
$_SESSION['created_date'] = $_POST['created_date'];
$_SESSION['created_time'] = $_POST['created_time'];
$smt = $con->prepare("SELECT * FROM jobmatch WHERE id=? AND seekerid=?");
$smt->execute(array($matchid, $seekerid));
$rowCount = $smt->rowCount();
if($rowCount == 0){
	echo "error";
	return false;
}
$row = $smt->fetch(PDO::FETCH_OBJ);
$_SESSION['profileidcv'] = $row->jobid;
$_SESSION['seekeridcv'] = $row->empid;
echo "ok";
return false;

?>