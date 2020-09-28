<?php
include ('../php/db.php');
include ('../php/session.php');

if(!isset($_POST['jobID'])){
	return false;
}
$empType = $_SESSION['type'];
if($empType != '2'){
	echo "error";
	return false;
}

if(isset($_POST['sendType'])){
	if($_POST['sendType'] =='delete'){
		DeleteRecord($con);
	}
}

function DeleteRecord($con){
	$jobid = $_POST['jobID'];
	$userid = $_SESSION['id'];

	$smt = $con->prepare("SELECT * FROM profile WHERE id=? AND userid=?");
	$smt->execute(array($jobid, $userid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
		echo "error";
		return false;
	}
	$smt = $con->prepare("UPDATE profile SET status='0' WHERE id=? AND userid=?");
	$smt->execute(array($jobid, $userid));
	$smt= $con->prepare("SELECT * FROM jobmatch WHERE seekerid=? AND profileid=?");
	$smt->execute(array($userid, $jobid));
	$rowCount = $smt->rowCount();
	if($rowCount != 0){
		$smt = $con->prepare("UPDATE jobmatch SET status='0' WHERE seekerid=? AND profileid=?");
		$smt->execute(array($userid, $jobid));
	echo "ok";
	return false;
}
}
?>