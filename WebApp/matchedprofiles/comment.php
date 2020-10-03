<?php

include ('../php/db.php');
include ('../php/session.php');

if(isset($_POST['comment'])){
	$rating = $_POST['rating'];
	$comment = $_POST['comment'];
	$empid = $_POST['empid'];
	$userid = $_SESSION['id'];
 

	$smt = $con->prepare("INSERT INTO ratingemp (empid, userid, comment, rating) VALUES(?,?,?,?)");
	$smt->execute(array($empid, $userid, $comment, $rating ));
	echo "ok";
	return false;

}
else{
	echo "error";
	return false;
}
?>