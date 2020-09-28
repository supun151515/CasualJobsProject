<?php

include ('../php/db.php');

if(isset($_POST['email']) && isset($_POST['password'] ))
{
	
	$user_type = $_POST['userType'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$empName = $_POST['empName'];
	$address_line_1 = $_POST['address_line_1'];
	$address_line_2 = $_POST['address_line_2'];
	$suburb = $_POST['suburb'];
	$city = $_POST['city'];
	$postcode = $_POST['postcode'];
	$emp_tel = $_POST['emp_tel'];
	$imagePath = $_POST['actual_image_name'];
	if($imagePath == ''){
		$img = '0';
	}else{
		$img = '1';
	}
	$sql = "SELECT * FROM `register` where BINARY `email`= ?";
	$smt = $con->prepare($sql);
	$smt->execute(array($email));
	$row = $smt->fetch(PDO::FETCH_OBJ);
	$num_rows = $smt->rowCount();

	if($num_rows  != 0) {
		
		echo "exist";
		return false;
	}
	else {
	$sql = "INSERT INTO register (user_type, email, password, userName, address1, address2, suburb, city, postcode, telephone, image, status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
	$smt = $con->prepare($sql);
	$result = $smt->execute(array($user_type, $email, $password, $empName, $address_line_1, $address_line_2, $suburb, $city, $postcode, $emp_tel, $img, '1'));
	if($result == 1) {
		if($imagePath == ''){
			echo "ok";
			return false;
		}
		$last_id = $con->lastInsertId();
		$new_path = '';
		if($user_type == '1'){
			$new_path = "../employer/images/".$last_id.'.jpg';
		}else{
			$new_path = "../seeker/images/".$last_id.'.jpg';
		}
		$old_path = "../css/images/temp/".$imagePath;
		rename($old_path, $new_path);
		echo "ok";
		return false;
	}
	echo "error";
	return false;
	}
}
?>