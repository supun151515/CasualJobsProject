<?php
include ('../php/db.php');

	$sql = "SELECT id, jobTitle FROM `jobtitle` where status = '1'";
	$smt = $con->prepare($sql);
	$smt->execute(array());
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	//$num_rows = $smt->rowCount();
	$custom = array('id'=>'0', 'jobTitle' => 'Any Job');
	array_unshift($row, $custom);
	print json_encode($row);
?>