<?php
include ('../php/db.php');
if(isset($_POST['jobid'])){
//$jobid = explode(',',$_POST['jobid']);
//$jobid = implode(',', $jobid);
$jobTitle = $_POST['jobid'];

if($jobTitle == '0' || $jobTitle == ''){

	$sql = "SELECT DISTINCT( skill ) FROM `tags`";
	$smt = $con->prepare($sql);
	$smt->execute();
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	//$num_rows = $smt->rowCount();
	print json_encode($row);
}else{
	$sql = "SELECT DISTINCT skill FROM `tags` where jobid IN ($jobTitle)";
	$smt = $con->prepare($sql);
	$smt->execute();
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	//$num_rows = $smt->rowCount();
	print json_encode($row);
}
	
}
	
?>