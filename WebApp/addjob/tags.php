<?php
include ('../php/db.php');
if(isset($_POST['jobid'])){
$jobid = $_POST['jobid'];

	$sql = "SELECT id, skill FROM `tags` where status = '1' and jobid=?";
	$smt = $con->prepare($sql);
	$smt->execute(array($jobid));
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	//$num_rows = $smt->rowCount();
	print json_encode($row);
}
	
?>