<?php

include ('../php/db.php');
if(!isset($_SESSION['id'])){
	echo "You have no permission to access this page";
	return false;
}

$user = $_SESSION['id'];

$smt = $con->prepare("SELECT * FROM register WHERE id=?");
$smt->execute(array($user));
$rowCount = $smt->rowCount();
if($rowCount == 0){
	echo "No Data found";
	return false;
}
$row = $smt->fetch(PDO::FETCH_OBJ);
print json_encode($row);
?>