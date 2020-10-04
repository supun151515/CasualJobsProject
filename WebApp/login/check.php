<?php

include ('../php/db.php');
include ('logLogin.php');
if(isset($_POST['email']) && isset($_POST['password'] ))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	//$type = $_POST['userType'];
	//$password = md5($password);

	$sql = "SELECT * FROM `register` where BINARY `email`= ? and BINARY `password`= ? AND status='1'";
	$smt = $con->prepare($sql);
	$smt->execute(array($email,md5($password)));
	$row = $smt->fetch(PDO::FETCH_OBJ);
	$num_rows = $smt->rowCount();

	if($num_rows  != 0) {
		if($row->user_type == 1){
		$smt2 = $con->prepare("SELECT count(*) as count, sum(rating) as rating FROM ratingemp WHERE empid=? AND status='1'");
		$smt2->execute(array($row->id));
		$row2 = $smt2->fetch(PDO::FETCH_OBJ);
		}else{
		$smt2 = $con->prepare("SELECT count(*) as count, sum(rating) as rating FROM ratingseeker WHERE seekerid=? AND status='1'");
		$smt2->execute(array($row->id));
		$row2 = $smt2->fetch(PDO::FETCH_OBJ);
		}
		$row2Count = $row2->count;
		if($row2Count == '0'){
			$_SESSION['rating1'] = '';
			$_SESSION['rating2'] = '';
			$_SESSION['rating3'] = '';
			$_SESSION['rating4'] = '';
			$_SESSION['rating5'] = '';
		}else{
		$ratingCount = $row2->count;
		$ratingValue = $row2->rating;
		$rating = (int)$ratingValue / (int)$ratingCount;
		$rating = (int)$rating;
		$_SESSION['rating'] = (int)$rating;
		if($rating == 0){
			$_SESSION['rating1'] = '';
			$_SESSION['rating2'] = '';
			$_SESSION['rating3'] = '';
			$_SESSION['rating4'] = '';
			$_SESSION['rating5'] = '';
		}else if($rating == 1){
			$_SESSION['rating1'] = 'checked';
			$_SESSION['rating2'] = '';
			$_SESSION['rating3'] = '';
			$_SESSION['rating4'] = '';
			$_SESSION['rating5'] = '';
		}else if($rating == 2){
			$_SESSION['rating1'] = 'checked';
			$_SESSION['rating2'] = 'checked';
			$_SESSION['rating3'] = '';
			$_SESSION['rating4'] = '';
			$_SESSION['rating5'] = '';
		}else if($rating == 3){
			$_SESSION['rating1'] = 'checked';
			$_SESSION['rating2'] = 'checked';
			$_SESSION['rating3'] = 'checked';
			$_SESSION['rating4'] = '';
			$_SESSION['rating5'] = '';
		}else if($rating == 4){
			$_SESSION['rating1'] = 'checked';
			$_SESSION['rating2'] = 'checked';
			$_SESSION['rating3'] = 'checked';
			$_SESSION['rating4'] = 'checked';
			$_SESSION['rating5'] = '';
		}else if($rating == 5){
			$_SESSION['rating1'] = 'checked';
			$_SESSION['rating2'] = 'checked';
			$_SESSION['rating3'] = 'checked';
			$_SESSION['rating4'] = 'checked';
			$_SESSION['rating5'] = 'checked';
		}
		}
		
		$_SESSION['id'] = $row->id;
		$_SESSION['email'] = $row->email;
		$_SESSION['userName'] = $row->userName;
		$_SESSION['address1'] = $row->address1;
		$_SESSION['address2'] = $row->address2;
		$_SESSION['suburb'] = $row->suburb;
		$_SESSION['city'] = $row->city;
		$_SESSION['postcode'] = $row->postcode;
		$_SESSION['telephone'] = $row->telephone;
		$_SESSION['image'] = $row->image;
		$_SESSION['type'] = $row->user_type;
		 $smt = $con->prepare("INSERT INTO loglogin (username,ipAddress,browser,os,userAgent,logType) values( ?, ?, ?, ?, ?, ?);");
   		$smt->execute(array($row->userName, $ipaddress, $user_browser, $user_os, $user_agent, 'login'));
 
		echo "ok";
	}
	else {
		echo "error";
	}

}else{
	echo "error";
}
?>