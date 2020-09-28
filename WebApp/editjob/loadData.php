<?php

include ('../php/db.php');
if(!isset($_SESSION['id'])){
	echo "You have no permission to access this page";
	return false;
}
if($_SESSION['type'] != '1'){
	echo "You do not have permission to access this page";
	return false;
}

$user = $_SESSION['id'];
$jobid = $_POST['jobid'];

$allData = new stdClass();

$smt = $con->prepare("SELECT * FROM job WHERE id=? AND userid=? AND status='1'");
$smt->execute(array($jobid, $user));
$rowCount = $smt->rowCount();
if($rowCount == 0){
	echo "You do not have permission to access this page";
	return false;
}
$row = $smt->fetch(PDO::FETCH_OBJ);
$allData->job = $row;
if($row->timeDiff == '1'){
	$smt = $con->prepare("SELECT * FROM timediffjobs WHERE jobid=?");
	$smt->execute(array($jobid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
	echo "You do not have permission to access this page";
	return false;
	}
	$row = $smt->fetch(PDO::FETCH_OBJ);
	$allData->times = $row;
}





print json_encode($allData);
?>