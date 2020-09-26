<?php
include ('../php/db.php');
include ('../php/session.php');

$empType = $_SESSION['type'];
if(!$empType == '1'){
	return false;
}

$allData = new stdClass();
$empID = $_SESSION['id'];
$matchid = $_POST['matchid'];
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