<?php
include ('../php/db.php');
include ('../php/session.php');

if(!isset($_SESSION['id'])){
	return false;
}


if(isset($_POST['sendType'])){
	if($_POST['sendType'] =='delete'){
		DeleteRecord($con);
	}
}

function DeleteRecord($con){
 
	$userid = $_SESSION['id'];
	$type = $_SESSION['type'];

	$smt = $con->prepare("SELECT * FROM register WHERE id=?");
	$smt->execute(array($userid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
		echo "error";
		return false;
	}

	$smt = $con->prepare("UPDATE register SET status='0' WHERE id=?");
	$smt->execute(array($userid));

	if($type == '1'){
		$smt = $con->prepare("UPDATE jobmatch SET status='0' WHERE empid=?");
		$smt->execute(array($userid));

		$smt = $con->prepare("UPDATE job SET status='0' WHERE userid=?");
		$smt->execute(array($userid));
		if(file_exists('../employer/images/'.$userid.'.jpg')){
			unlink('../employer/images/'.$userid.'.jpg');
		}

	}else{
		$smt = $con->prepare("UPDATE jobmatch SET status='0' WHERE seekerid=?");
		$smt->execute(array($userid));

		$smt = $con->prepare("UPDATE profile SET status='0' WHERE userid=?");
		$smt->execute(array($userid));

		if(file_exists('../seeker/images/'.$userid.'.jpg')){
			unlink('../seeker/images/'.$userid.'.jpg');
		}
	}

	session_unset();
	session_destroy();
	echo "ok";
	return false;
}
?>