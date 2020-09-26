<?php

include ('../php/db.php');
include ('../php/session.php');

if(!isset($_POST['profileID'])){
	return false;
}
$empType = $_SESSION['type'];
if(!$empType == '1'){
	return false;
}

$jobid = $_POST['profileID'];


$matchid = $_POST['matchid'];
$event = $_POST['short'];
if($event == 'add'){
	$smt = $con->prepare("SELECT * FROM jobmatch where id=? AND profileid=? AND short=1");
	$smt->execute(array($matchid, $jobid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
		echo "Error";
		return false;
	}

	$smt = $con->prepare("UPDATE jobmatch SET short=2 WHERE profileid=? AND id=?");
	$smt->execute(array($jobid,$matchid));
	echo "ok";
	return false;
}else if($event == 'remove'){
	$smt = $con->prepare("SELECT * FROM jobmatch where id=? AND profileid=? AND short=2");
	$smt->execute(array($matchid, $jobid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
		echo "Error";
		return false;
	}

	$smt = $con->prepare("UPDATE jobmatch SET short=1 WHERE profileid=? AND id=?");
	$smt->execute(array($jobid,$matchid));
	echo "ok";
	return false;
}else{
	echo "error";
	return false;
}


?>