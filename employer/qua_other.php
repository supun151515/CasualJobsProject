<?php 

function QualificationsOther($jobid, $profileid, $con){

	$smtj = $con->prepare("SELECT * FROM job WHERE id=?");
	$smtj->execute(array($jobid));
	$rowj =$smtj->fetch(PDO::FETCH_OBJ);

	$smtp = $con->prepare("SELECT * FROM profile WHERE id=?");
	$smtp->execute(array($profileid));
	$rowp =$smtp->fetch(PDO::FETCH_OBJ);

	$qualification = $experience = $skills = $visaType = $license = $vehicle = $ethnicity = $age = $gender = 0;

	$quJob = $rowj->qualification;
	$exJob = $rowj->experience;
	$skillsJob = $rowj->skills;
	$visaJob = $rowj->visaType;
	$licenseJob = $rowj->license;
	$vehicleJob = $rowj->vehicle;
	$ethnicityJob = $rowj->ethnicity;
	$age1Job = (int)$rowj->age1;
	$age2Job = (int)$rowj->age2;
	$genderJob = $rowj->gender;


	$quProfile = $rowp->qualification;
	$exProfile = $rowp->experience;
	$skillsProfile = $rowp->skills;
	$visaProfile = $rowp->visaType;
	$licenseProfile = $rowp->license;
	$vehicleProfile = $rowp->vehicle;
	$ethnicityProfile = $rowp->ethnicity;
	$ageProfile = (int)$rowp->age;
	$genderProfile = $rowp->gender;
 
	if($quJob == '0'){
		$qualification = 100;
	}else{
		if($quJob == $quProfile){
			$qualification = 100;
		}else{
			$qualification = 0;
		}
	}


	if($exJob == '0'){
		$experience = 100;
	}else{
		if($exJob == $exProfile){
			$experience = 100;
		}else{
			$experience = 0;
		}
	}


	if($skillsJob == ''){
		$skills = 100;
	}else{
		$skillsJobArray = explode(',',$skillsJob);
		$skillsProfileArray = explode(',', $skillsProfile);
		$countSkillsJobs = count($skillsJobArray);
		$matchSkills = array_intersect($skillsJobArray, $skillsProfileArray);
		$countMatch = count($matchSkills);

		$countSkillsJobs = 100/(int)$countSkillsJobs;
		$skills = (int)$countSkillsJobs * (int)$countMatch;

	}

	if($visaJob == '0'){
		$visaType = 100;
	}else{
		if($visaJob == $visaProfile){
			$visaType = 100;
		}else{
			$visaType = 0;
		}
	}

	if($licenseJob == '0'){
		$license = 100;
	}else{
		if($licenseJob == $licenseProfile){
			$license = 100;
		}else{
			$license =0;
		}
	}


	if($vehicleJob == '0'){
		$vehicle = 100;
	}else{
		if($vehicleJob == $vehicleProfile){
			$vehicle = 100;
		}else{
			$vehicle =0;
		}
	}

	
	if($ethnicityJob == '0'){
		$ethnicity = 100;
	}else{
		if($ethnicityJob == $ethnicityProfile){
			$ethnicity = 100;
		}else{
			$ethnicity =0;
		}
	}

	

	if($age1Job <= $ageProfile && $age2Job >= $ageProfile){
		$age = 100;
	}else{
		$age = 0;
	}

	if($genderJob == '0'){
		$gender = 100;
	}else{
		if($genderJob == $genderProfile){
			$gender = 100;
		}else{
			$gender = 0;
		}
	}


	$final = compact("qualification","experience","skills","visaType","license","vehicle","ethnicity","age","gender");
return $final;
}
?>