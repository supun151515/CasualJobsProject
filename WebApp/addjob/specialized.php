<?php
include ('../php/db.php');

	$sql = "SELECT id, specialized FROM `specialized` where status = '1'";
	$smt = $con->prepare($sql);
	$smt->execute(array());
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	//$num_rows = $smt->rowCount();
	print json_encode($row);
?>