<?php

include ('../php/db.php');

if(isset($_POST['email']) && isset($_POST['password'] ))
{
	
	$user_type = $_POST['userType'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$empName = $_POST['empName'];
	$address_line_1 = $_POST['address_line_1'];
	$address_line_2 = $_POST['address_line_2'];
	$suburb = $_POST['suburb'];
	$city = $_POST['city'];
	$postcode = $_POST['postcode'];
	$emp_tel = $_POST['emp_tel'];
	$imagePath = $_POST['actual_image_name'];
	$myid = $_SESSION['id'];
	$imagechanged = $_POST['imagechanged'];
 
	if($imagePath == ''){
		if($imagechanged == '1'){
			$img = '0';
		}else{
			$img = '1';
		}
		
	}else{
		$img = '1';
	}
	$sql = "SELECT * FROM register WHERE id=?";
	$smt = $con->prepare($sql);
	$smt->execute(array($myid));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
		echo "error";
		return false;
	}

	if($password == ''){
		$sql = "UPDATE register SET user_type=?, email=?, userName=?, address1=?, address2=?, suburb=?, city=?, postcode=?, telephone=?, image=?, status=? WHERE id=?";
		$smt = $con->prepare($sql);
		$result = $smt->execute(array($user_type, $email, $empName, $address_line_1, $address_line_2, $suburb, $city, $postcode, $emp_tel, $img, '1', $myid));
	}else{
		$sql = "UPDATE register SET user_type=?, email=?, password=?, userName=?, address1=?, address2=?, suburb=?, city=?, postcode=?, telephone=?, image=?, status=? WHERE id=?";
		$smt = $con->prepare($sql);
		$result = $smt->execute(array($user_type, $email, $password, $empName, $address_line_1, $address_line_2, $suburb, $city, $postcode, $emp_tel, $img, '1', $myid));
	}
	
	


		if($imagechanged == '1'){

		if($imagePath == ''){
			if($user_type == '1'){
				if(file_exists('../employer/images/'.$myid.'.jpg')){
					unlink('../employer/images/'.$myid.'.jpg');
				}
			}else{
				if(file_exists('../seeker/images/'.$myid.'.jpg')){
					unlink('../seeker/images/'.$myid.'.jpg');
				}
			}
			
			echo "ok";
			return false;
		}
		$last_id = $myid;
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
		}else{
		echo "ok";
		return false;
		}
	

	
}
?>