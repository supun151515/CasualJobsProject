<?php

include ('../php/db.php');
include ('../php/session.php');

if(isset($_POST['comment'])){
	$rating = $_POST['rating'];
	$comment = $_POST['comment'];
	$seekerid = $_POST['seekerid'];
	$userid = $_SESSION['id'];
 

	$smt = $con->prepare("INSERT INTO ratingseeker (seekerid, userid, comment, rating) VALUES(?,?,?,?)");
	$smt->execute(array($seekerid, $userid, $comment, $rating ));
	echo "ok";
	return false;

}
else{
	echo "error";
	return false;
}
?>