<?php
include ('../php/db.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT id, location FROM `locations_sub` where subid=? and status = '1'";
	$smt = $con->prepare($sql);
	$smt->execute(array($id));
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	//$num_rows = $smt->rowCount();
	print json_encode($row);
}

?>