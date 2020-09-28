<?php
include ('../php/db.php');
if(!isset($_SESSION['id'])){
	echo "login";
	return false;
}
if(isset($_POST['add']))
{

AddData($con);
}


function AddData($con){

	
	$userid = $_SESSION['id'];
	$dateAdd = $_POST['dateAdd'];
	$jobTitle = $_POST['jobTitle'];
	$jobType = $_POST['jobtype'];
	$Location = $_POST['Location'];
	$LocationSub = $_POST['LocationSub'];
	$payRate = $_POST['payrate'];
	$jobDes = $_POST['jobdes'];
	$startDate = $_POST['dateStart'];
	$endDate = $_POST['dateEnd'];
	$startType = $_POST['onGoing'];
	$endType = $_POST['endDateCheck'];
	$fromTime = $_POST['t1'];
	$toTime = $_POST['t2'];
	$totalHours = $_POST['totalHours'];
	$diffTimes = $_POST['diffTimes'];
	$qualification = $_POST['qualification'];
	$experience = $_POST['experience'];
	$skills = $_POST['skills'];
	$visaType = $_POST['visa'];
	$license = $_POST['license'];
	$vehicle = $_POST['vehicle'];
	$ethnicity = $_POST['ethnicity'];
	$age1 = $_POST['age1'];
	$age2 = $_POST['age2'];
	$gender = $_POST['gender'];

		$mon1 = $_POST['mon1'];
		$mon2 = $_POST['mon2'];
		$tue1 = $_POST['tue1'];
		$tue2 = $_POST['tue2'];
		$wed1 = $_POST['wed1'];
		$wed2 = $_POST['wed2'];
		$thu1 = $_POST['thu1'];
		$thu2 = $_POST['thu2'];
		$fri1 = $_POST['fri1'];
		$fri2 = $_POST['fri2'];
		$sat1 = $_POST['sat1'];
		$sat2 = $_POST['sat2'];
		$sun1 = $_POST['sun1'];
		$sun2 = $_POST['sun2'];

 	$smt = $con->prepare("INSERT INTO job (userid, dateAdd, jobTitleid, jobType, location, locationSub, payRate, jobDes, startDate, startType, endDate, endType, fromTime, toTime, totalHours, timeDiff, qualification, experience, skills, visaType, license, vehicle, ethnicity, age1, age2, gender, status) VALUES(?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$result = $smt->execute(array($userid, $dateAdd, $jobTitle, $jobType, $Location, $LocationSub, $payRate, $jobDes, $startDate, $startType, $endDate, $endType, $fromTime, $toTime, $totalHours, $diffTimes, $qualification, $experience, $skills, $visaType, $license, $vehicle, $ethnicity, $age1, $age2, $gender, '1'));
	$jobID = $con->lastInsertId();

	if($diffTimes == '1'){
		$smtTimes = $con->prepare("INSERT INTO timediffjobs (jobid, mon1, mon2, tue1, tue2, wed1, wed2, thu1, thu2, fri1, fri2, sat1, sat2, sun1, sun2) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$resultTimes = $smtTimes->execute(array($jobID, $mon1, $mon2, $tue1, $tue2, $wed1, $wed2, $thu1, $thu2, $fri1, $fri2, $sat1, $sat2, $sun1, $sun2));
	}

	echo "ok";
	return false;
}

?>