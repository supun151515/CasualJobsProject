<?php

include ('../php/db.php');
if(!isset($_SESSION['id'])){
	echo "You have no permission to access this page";
	return false;
}
if($_SESSION['type'] != '2'){
	echo "You do not have permission to access this page";
	return false;
}

$user = $_SESSION['id'];
$jobid = $_POST['jobid'];

$allData = new stdClass();

$smt = $con->prepare("SELECT * FROM profile WHERE id=? AND userid=? AND status='1'");
$smt->execute(array($jobid, $user));
$rowCount = $smt->rowCount();
if($rowCount == 0){
	echo "You do not have permission to access this page";
	return false;
}
$rowprofile = $smt->fetch(PDO::FETCH_OBJ);
$allData->job = $rowprofile;

if($rowprofile->timeDiff == '1'){
	$smt = $con->prepare("SELECT * FROM timediffprofiles WHERE profileid=?");
	$smt->execute(array($jobid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
	echo "You do not have permission to access this page";
	return false;
	}
	$row = $smt->fetch(PDO::FETCH_OBJ);
	$allData->times = $row;
}

if($rowprofile->multiJobTitle == '1'){
	$smt = $con->prepare("SELECT * FROM profilemultijobtitles WHERE profileid=?");
	$smt->execute(array($jobid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
	echo "You do not have permission to access this page";
	return false;
	}
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	$allData->multijob = $row;
}
if($rowprofile->multiLocation == '1'){
	$smt = $con->prepare("SELECT * FROM profilemultilocationsub WHERE profileid=?");
	$smt->execute(array($jobid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
	echo "You do not have permission to access this page";
	return false;
	}
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	$allData->multilocation = $row;
}




print json_encode($allData);
?>