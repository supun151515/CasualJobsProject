<?php

include ('../php/db.php');
include ('../php/session.php');

if(!isset($_POST['jobID'])){
	return false;
}
$empType = $_SESSION['type'];
if(!$empType == '1'){
	return false;
}

$jobid = (int)$_POST['jobID'];
$matchid = $_POST['matchid'];
$event = $_POST['short'];
if($event == 'add'){
	$smt = $con->prepare("SELECT * FROM jobmatch where id=? AND jobid=? AND short=0");
	$smt->execute(array($matchid, $jobid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
		echo "Error";
		return false;
	}

	$smt = $con->prepare("UPDATE jobmatch SET short=1 WHERE jobid=? AND id=?");
	$smt->execute(array($jobid,$matchid));
	echo "ok";
	return false;
}else if($event == 'remove'){
	$smt = $con->prepare("SELECT * FROM jobmatch where id=? AND jobid=? AND short=1 OR (short=2)");
	$smt->execute(array($matchid, $jobid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
		echo "Error";
		return false;
	}

	$smt = $con->prepare("UPDATE jobmatch SET short=0 WHERE jobid=? AND id=?");
	$smt->execute(array($jobid,$matchid));
	echo "ok";
	return false;
}else{
	echo "error";
	return false;
}


?>