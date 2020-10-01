<?php

function AddToMatchedTable($rowjob, $rowprofile, $locationSub, $con){
	$empid = $_SESSION['id'];
	$jobid = $rowjob->id;
	$profileid= $rowprofile->id;
	$seekerid = $rowprofile->userid;
	$jobTypej = $rowjob->jobType;
	$jobTypep = $rowprofile->jobType;
	if($jobTypep == '0'){
		$jobType = 100;
	}else if($jobTypej == $jobTypep){
		$jobType = 100;
	}else {
		$jobType = 0;
	}

	
	$payj = round($rowjob->payRate,2);
	$payp = round($rowprofile->payRate,2);
	if($payj >= $payp){
		$payRate = 100;
	}else{
		$payRate = 0;
	}

	$startDatej = new DateTime($rowjob->startDate);
	$startTypej = $rowjob->startType;
	$startDatep = new DateTime($rowprofile->startDate);
	$startTypep = $rowprofile->startType;

	$endDatej = new DateTime($rowjob->endDate);
	$endTypej = $rowjob->endType;
	$endDatep = new DateTime($rowprofile->endDate);
	$endTypep = $rowprofile->endType;

	$diff=date_diff($startDatej,$startDatep);
	$diff = (int)$diff->days;
	$startDate = 0;
	$endDate = 0;

	if($startTypej == '1' && $startTypep == '1'){
		$startDate = 100;
	}else if($startTypej == '0' && $startTypep == '1' ){
		$startDate = 100;
	}else if($startTypej == '0' && $startTypep == '0'){
		if($diff >= 0 && $diff <= 1){
			$startDate = 100;
		}else if($diff >= 2 && $diff <= 10){
			$startDate = 75;
		}else if($diff >= 11 && $diff <= 20){
			$startDate = 50;
		}else if($diff >= 21 && $diff <= 30){
			$startDate = 10;
		}else{
			$startDate = 0;
		}
	}else{
		$startDate = 100;
	}

	$diff=date_diff($endDatej,$endDatep);
	$diff = (int)$diff->days;
	if($endTypej == '1' && $endTypep == '1'){
		$endDate = 100;
	}else if($endTypej == '0' && $endTypep == '1' ){
		$endDate = 100;
	}else if($endTypej == '0' && $endTypep == '0'){
		if($diff >= 0 && $diff <= 1){
			$endDate = 100;
		}else if($diff >= 2 && $diff <= 10){
			$endDate = 75;
		}else if($diff >= 11 && $diff <= 20){
			$endDate = 50;
		}else if($diff >= 21 && $diff <= 30){
			$endDate = 10;
		}else{
			$endDate = 0;
		}
	}else{
		$endDate = 100;
	}

	$t1j = $rowjob->fromTime;
	$t2j = $rowjob->toTime;
	$tdiffj = $rowjob->timeDiff;
	$t1p = $rowprofile->fromTime;
	$t2p = $rowprofile->toTime;
	$tdiffp = $rowprofile->timeDiff;
	$week;
	$available;
	$total1 = $total2 = $total3 = $total4 = $total5 = 100;
	if($tdiffj == '1'){
		if($tdiffp == '1'){// both diff time table
			$week =	timeDiffAllCalc($rowjob->id, $rowprofile->id, $con);
			$qualificationsOther = QualificationsOther($jobid, $profileid, $con);
			//echo "timeDiffAllCalc";
		}else{ //profile time fixed and jobs diff
			$week =	timeDiffSeekerFixed($rowjob->id, $rowprofile->id, $t1p, $t2p, $con);
			$qualificationsOther = QualificationsOther($jobid, $profileid, $con);
			//echo "timeDiffSeekerFixed";
		}
	} else {
		if($tdiffp == '1'){ //jobs fixed time and profile diff timing
			$week =	timeDiffEmpFixed($rowjob->id, $rowprofile->id, $t1j, $t2j, $con);
			$qualificationsOther = QualificationsOther($jobid, $profileid, $con);
			//echo "timeDiffEmpFixed";
		 
		}else{//both fixed
			$week = timeDiffAllFixed($t1j, $t2j, $t1p, $t2p);
			$qualificationsOther = QualificationsOther($jobid, $profileid, $con);
			//echo "timeDiffAllFixed";
			//echo $available."<br>";
		}
	} 

	$totalMatch = 0;
	$total1 = (int)$jobType;
	$total2 = (int)$locationSub;
	$total3 = (int)$payRate;
	//$total1 = $total1 / 3;
	//$total1 = number_format($total1);
 

	$total4 = (int)$startDate;
	$total5 = (int)$endDate;
	//$total2 = $total2 /2;
	//$total2 = number_format($total2);
	

//	if($week['diffdays'] == 0) {
		$total6mon = (int)$week['mon'];
		$total6tue = (int)$week['tue'];
		$total6wed = (int)$week['wed'];
		$total6thu = (int)$week['thu'];
		$total6fri = (int)$week['fri'];
		$total6sat = (int)$week['sat'];
		$total6sun = (int)$week['mon'];
		$total6t1 =(int)$week['t1'];
		$total6t2 =(int)$week['t2'];
 		
//	}else{
		$total6mon = (int)$week['mon'];
		$total6tue = (int)$week['tue'];
		$total6wed = (int)$week['wed'];
		$total6thu = (int)$week['thu'];
		$total6fri = (int)$week['fri'];
		$total6sat = (int)$week['sat'];
		$total6sun = (int)$week['mon'];
		$total6t1 =(int)$week['t1'];
		$total6t2 =(int)$week['t2'];
//	}
	//echo $total6.' - '. $rowjob->id.'<br>';
 //echo $total6.' '.$total1.'<br>';
	$total7 = (int)$qualificationsOther['qualification'];
	$total8 = (int)$qualificationsOther['experience'];
	$total9 = (int)$qualificationsOther['skills'];
	$total10 = (int)$qualificationsOther['visaType'];
	$total11 = (int)$qualificationsOther['license'];
	$total12 = (int)$qualificationsOther['vehicle'];
	$total13 = (int)$qualificationsOther['ethnicity'];
	$total14 = (int)$qualificationsOther['age'];
	$total15 = (int)$qualificationsOther['gender'];
	//$total5 = (int)$total5 / 9;

	$totalMatch = (int)$total1 + (int)$total2 + (int)$total3  + (int)$total4 + (int)$total5 + (int)$total6t1 + (int)$total6t2 + (int)$total6mon + (int)$total6tue + (int)$total6wed + (int)$total6thu + (int)$total6fri + (int)$total6sat + (int)$total6sun + (int)$total7 + (int)$total8 + (int)$total9 + (int)$total10 + (int)$total11 + (int)$total12 + (int)$total13 + (int)$total14 + (int)$total15;

	if($week['diffdays'] == 0) {
			$totalMatch = (int)$totalMatch / (int)21;
	}
		else{
			$totalMatch = (int)$totalMatch / (int)16;
		}

 

	$smt=$con->prepare("SELECT * FROM jobmatch WHERE jobid= ? AND profileid=?");
	$smt->execute(array($rowjob->id, $rowprofile->id));
	$rowCount = $smt->rowCount();
	if($rowCount == 0){
		$smt = $con->prepare("INSERT INTO jobmatch (empid, seekerid, jobid, profileid, jobType, locationSub, payRate, startDate, EndDate, t1, t2, noWeek, mon, tue, wed, thu, fri, sat, sun, qualification, experience, skills, visa, license, vehicle, ethnicity, age, gender, totalMatch) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
		$smt->execute(array($empid, $seekerid, $rowjob->id, $rowprofile->id, $jobType, $locationSub, $payRate, $startDate, $endDate, $week['t1'], $week['t2'], $week['diffdays'], $week['mon'], $week['tue'], $week['wed'], $week['thu'], $week['fri'], $week['sat'], $week['sun'], $qualificationsOther['qualification'], $qualificationsOther['experience'], $qualificationsOther['skills'], $qualificationsOther['visaType'], $qualificationsOther['license'], $qualificationsOther['vehicle'], $qualificationsOther['ethnicity'], $qualificationsOther['age'], $qualificationsOther['gender'], $totalMatch));
	}else{
		if(isset($_SESSION['updateMatch'])){
			if($_SESSION['updateMatch'] == '1'){
				$sql = "UPDATE jobmatch SET jobType=?,locationSub=?, payRate=?, startDate=?, EndDate=?, t1=?, t2=?, noWeek=?, mon=?, tue=?, wed=?, thu=?, fri=?, sat=?, sun=?, qualification=?, experience=?, skills=?, visa=?, license=?, vehicle=?, ethnicity=?, age=?, gender=?, totalMatch=? WHERE jobid=? AND profileid=?";
				$smt = $con->prepare($sql);
				$smt->execute(array($jobType, $locationSub, $payRate, $startDate, $endDate, $week['t1'], $week['t2'], $week['diffdays'], $week['mon'], $week['tue'], $week['wed'], $week['thu'], $week['fri'], $week['sat'], $week['sun'], $qualificationsOther['qualification'], $qualificationsOther['experience'], $qualificationsOther['skills'], $qualificationsOther['visaType'], $qualificationsOther['license'], $qualificationsOther['vehicle'], $qualificationsOther['ethnicity'], $qualificationsOther['age'], $qualificationsOther['gender'], $totalMatch, $rowjob->id, $rowprofile->id));
			 
			}
			
		}
	}
	


} //end function


function timeDiffAllCalc($jobid, $profileid, $con){
	$smtj = $con->prepare("SELECT * FROM timediffjobs WHERE jobid=?");
	$smtj->execute(array($jobid));
	$rowj =$smtj->fetch(PDO::FETCH_OBJ);

	$smtp = $con->prepare("SELECT * FROM timediffprofiles WHERE profileid=?");
	$smtp->execute(array($profileid));
	$rowp =$smtp->fetch(PDO::FETCH_OBJ);

	$mon = $tue = $wed = $thu = $fri = $sat = $sun = $t1 = $t2 =  $diffdays = 0;

	$monj1 = strtotime($rowj->mon1);
	$monj2 = strtotime($rowj->mon2);
	$tuej1 = strtotime($rowj->tue1);
	$tuej2 = strtotime($rowj->tue2);
	$wedj1 = strtotime($rowj->wed1);
	$wedj2 = strtotime($rowj->wed2);
	$thuj1 = strtotime($rowj->thu1);
	$thuj2 = strtotime($rowj->thu2);
	$frij1 = strtotime($rowj->fri1);
	$frij2 = strtotime($rowj->fri2);
	$satj1 = strtotime($rowj->sat1);
	$satj2 = strtotime($rowj->sat2);
	$sunj1 = strtotime($rowj->sun1);
	$sunj2 = strtotime($rowj->sun2);

	$monp1 = strtotime($rowp->mon1);
	$monp2 = strtotime($rowp->mon2);
	$tuep1 = strtotime($rowp->tue1);
	$tuep2 = strtotime($rowp->tue2);
	$wedp1 = strtotime($rowp->wed1);
	$wedp2 = strtotime($rowp->wed2);
	$thup1 = strtotime($rowp->thu1);
	$thup2 = strtotime($rowp->thu2);
	$frip1 = strtotime($rowp->fri1);
	$frip2 = strtotime($rowp->fri2);
	$satp1 = strtotime($rowp->sat1);
	$satp2 = strtotime($rowp->sat2);
	$sunp1 = strtotime($rowp->sun1);
	$sunp2 = strtotime($rowp->sun2);

	if(abs($monj1-$monj2) == 0){ //full match if no time selected
		$mon = 100;
	}else{
		if(abs($monp1-$monp2) == 0){
			$mon =0;
		}else{
			if($monj1 >= $monp1 && $monj2 <= $monp2 ){ //within the job timing
				$mon = 100;
			}else if($monj1 >= $monp1 && $monj2 >= $monp2){ //from match and to not match
				$mon = 50;
			}else if($monj1 <= $monp1 && $monj2 <= $monp2 ){ // from not match and to match
				$mon = 50;
			}else{
				$mon = 0;
			}
		}
	}

	if(abs($tuej1-$tuej2) == 0){ 
		$tue = 100;
	}else{
		if(abs($tuep1-$tuep2) == 0){
			$tue =0;
		}else{
			if($tuej1 >= $tuep1 && $tuej2 <= $tuep2 ){ //within the job timing
				$tue = 100;
			}else if($tuej1 >= $tuep1 && $tuej2 >= $tuep2){ //from match and to not match
				$tue = 50;
			}else if($tuej1 <= $tuep1 && $tuej2 <= $tuep2 ){ // from not match and to match
				$tue = 50;
			}else{
				$tue = 0;
			}
		}
	}

	if(abs($wedj1-$wedj2) == 0){ 
		$wed = 100;
	}else{
		if(abs($wedp1-$wedp2) == 0){
			$wed =0;
		}else{
			if($wedj1 >= $wedp1 && $wedj2 <= $wedp2 ){ //within the job timing
				$wed = 100;
			}else if($wedj1 >= $wedp1 && $wedj2 >= $wedp2){ //from match and to not match
				$wed = 50;
			}else if($wedj1 <= $wedp1 && $wedj2 <= $wedp2 ){ // from not match and to match
				$wed = 50;
			}else{
				$wed = 0;
			}
		}
	}

	if(abs($thuj1-$thuj2) == 0){ 
		$thu = 100;
	}else{
		if(abs($thup1-$thup2) == 0){
			$thu =0;
		}else{
			if($thuj1 >= $thup1 && $thuj2 <= $thup2 ){ //within the job timing
				$thu = 100;
			}else if($thuj1 >= $thup1 && $thuj2 >= $thup2){ //from match and to not match
				$thu = 50;
			}else if($thuj1 <= $thup1 && $thuj2 <= $thup2 ){ // from not match and to match
				$thu = 50;
			}else{
				$thu = 0;
			}
		}
	}

	if(abs($frij1-$frij2) == 0){ 
		$fri = 100;
	}else{
		if(abs($frip1-$frip2) == 0){
			$fri =0;
		}else{
			if($frij1 >= $frip1 && $frij2 <= $frip2 ){ //within the job timing
				$fri = 100;
			}else if($frij1 >= $frip1 && $frij2 >= $frip2){ //from match and to not match
				$fri = 50;
			}else if($frij1 <= $frip1 && $frij2 <= $frip2 ){ // from not match and to match
				$fri = 50;
			}else{
				$fri = 0;
			}
		}
	}
	if(abs($satj1-$satj2) == 0){ 
		$sat = 100;
	}else{
		if(abs($satp1-$satp2) == 0){
			$sat =0;
		}else{
			if($satj1 >= $satp1 && $satj2 <= $satp2 ){ //within the job timing
				$sat = 100;
			}else if($satj1 >= $satp1 && $satj2 >= $satp2){ //from match and to not match
				$sat = 50;
			}else if($satj1 <= $satp1 && $satj2 <= $satp2 ){ // from not match and to match
				$sat = 50;
			}else{
				$sat = 0;
			}
		}
	}

	if(abs($sunj1-$sunj2) == 0){ 
		$sun = 100;
	}else{
		if(abs($sunp1-$sunp2) == 0){
			$sun =0;
		}else{
			if($sunj1 >= $sunp1 && $sunj2 <= $sunp2 ){ //within the job timing
				$sun = 100;
			}else if($sunj1 >= $sunp1 && $sunj2 >= $sunp2){ //from match and to not match
				$sun = 50;
			}else if($sunj1 <= $sunp1 && $sunj2 <= $sunp2 ){ // from not match and to match
				$sun = 50;
			}else{
				$sun = 0;
			}
		}
	}

$final = compact("mon", "tue", "wed", "thu", "fri", "sat", "sun","t1","t2","diffdays");
return $final;

}

function timeDiffSeekerFixed($jobid, $profileid, $t1p, $t2p, $con){
	$smtj = $con->prepare("SELECT * FROM timediffjobs WHERE jobid=? AND status='1'");
	$smtj->execute(array($jobid));
	$rowj =$smtj->fetch(PDO::FETCH_OBJ);
	
	$mon = $tue = $wed = $thu = $fri = $sat = $sun = $t1 = $t2 = $diffdays = 0;

	$monj1 = strtotime($rowj->mon1);
	$monj2 = strtotime($rowj->mon2);
	$tuej1 = strtotime($rowj->tue1);
	$tuej2 = strtotime($rowj->tue2);
	$wedj1 = strtotime($rowj->wed1);
	$wedj2 = strtotime($rowj->wed2);
	$thuj1 = strtotime($rowj->thu1);
	$thuj2 = strtotime($rowj->thu2);
	$frij1 = strtotime($rowj->fri1);
	$frij2 = strtotime($rowj->fri2);
	$satj1 = strtotime($rowj->sat1);
	$satj2 = strtotime($rowj->sat2);
	$sunj1 = strtotime($rowj->sun1);
	$sunj2 = strtotime($rowj->sun2);

	$t1p = strtotime($t1p);
	$t2p = strtotime($t2p);

	if(abs($monj1-$monj2) == 0){ //full match if no time selected
		$mon = 100;
	}else{
			if($monj1 >= $t1p && $monj2 <= $t2p ){ //within the job timing
				$mon = 100;
			}else if($monj1 >= $t1p && $monj2 >= $t2p){ //from match and to not match
				$mon = 50;
			}else if($monj1 <= $t1p && $monj2 <= $t2p ){ // from not match and to match
				$mon = 50;
			}else{
				$mon = 0;
			}
		}
	

	if(abs($tuej1-$tuej2) == 0){ 
		$tue = 100;
	}else{
			if($tuej1 >= $t1p && $tuej2 <= $t2p ){ //within the job timing
				$tue = 100;
			}else if($tuej1 >= $t1p && $tuej2 >= $t2p){ //from match and to not match
				$tue = 50;
			}else if($tuej1 <= $t1p && $tuej2 <= $t2p ){ // from not match and to match
				$tue = 50;
			}else{
				$tue = 0;
			}
		}

	if(abs($wedj1-$wedj2) == 0){ 
		$wed = 100;
	}else {
			if($wedj1 >= $t1p && $wedj2 <= $t2p ){ //within the job timing
				$wed = 100;
			}else if($wedj1 >= $t1p && $wedj2 >= $t2p){ //from match and to not match
				$wed = 50;
			}else if($wedj1 <= $t1p && $wedj2 <= $t2p ){ // from not match and to match
				$wed = 50;
			}else{
				$wed = 0;
			}
		}
	

	if(abs($thuj1-$thuj2) == 0){ 
		$thu = 100;
	}else{
			if($thuj1 >= $t1p && $thuj2 <= $t2p ){ //within the job timing
				$thu = 100;
			}else if($thuj1 >= $t1p && $thuj2 >= $t2p){ //from match and to not match
				$thu = 50;
			}else if($thuj1 <= $t1p && $thuj2 <= $t2p ){ // from not match and to match
				$thu = 50;
			}else{
				$thu = 0;
			}
		}
	

	if(abs($frij1-$frij2) == 0){ 
		$fri = 100;
	} else{
			if($frij1 >= $t1p && $frij2 <= $t2p ){ //within the job timing
				$fri = 100;
			}else if($frij1 >= $t1p && $frij2 >= $t2p){ //from match and to not match
				$fri = 50;
			}else if($frij1 <= $t1p && $frij2 <= $t2p ){ // from not match and to match
				$fri = 50;
			}else{
				$fri = 0;
			}
		}
	
	if(abs($satj1-$satj2) == 0){ 
		$sat = 100;
	} else{
			if($satj1 >= $t1p && $satj2 <= $t2p ){ //within the job timing
				$sat = 100;
			}else if($satj1 >= $t1p && $satj2 >= $t2p){ //from match and to not match
				$sat = 50;
			}else if($satj1 <= $t1p && $satj2 <= $t2p ){ // from not match and to match
				$sat = 50;
			}else{
				$sat = 0;
			}
		}
	

	if(abs($sunj1-$sunj2) == 0){ 
		$sun = 100;
	} else{
			if($sunj1 >= $t1p && $sunj2 <= $t2p ){ //within the job timing
				$sun = 100;
			}else if($sunj1 >= $t1p && $sunj2 >= $t2p){ //from match and to not match
				$sun = 50;
			}else if($sunj1 <= $t1p && $sunj2 <= $t2p ){ // from not match and to match
				$sun = 50;
			}else{
				$sun = 0;
			}
		}
	

$final = compact("mon", "tue", "wed", "thu", "fri", "sat", "sun","t1","t2","diffdays");
return $final;

}


function timeDiffEmpFixed($jobid, $profileid, $tj1, $tj2, $con){


	$smtp = $con->prepare("SELECT * FROM timediffprofiles WHERE profileid=?");
	$smtp->execute(array($profileid));
	$rowp =$smtp->fetch(PDO::FETCH_OBJ);

	$mon = $tue = $wed = $thu = $fri = $sat = $sun = $t1 = $t2 = $diffdays = 0;

	$tj1 = strtotime($tj1);
	$tj2 = strtotime($tj2);


	$monp1 = strtotime($rowp->mon1);
	$monp2 = strtotime($rowp->mon2);
	$tuep1 = strtotime($rowp->tue1);
	$tuep2 = strtotime($rowp->tue2);
	$wedp1 = strtotime($rowp->wed1);
	$wedp2 = strtotime($rowp->wed2);
	$thup1 = strtotime($rowp->thu1);
	$thup2 = strtotime($rowp->thu2);
	$frip1 = strtotime($rowp->fri1);
	$frip2 = strtotime($rowp->fri2);
	$satp1 = strtotime($rowp->sat1);
	$satp2 = strtotime($rowp->sat2);
	$sunp1 = strtotime($rowp->sun1);
	$sunp2 = strtotime($rowp->sun2);

		if(abs($monp1-$monp2) == 0){
			$mon =0;
		}else{
			if($tj1 >= $monp1 && $tj2 <= $monp2 ){ //within the job timing
				$mon = 100;
			}else if($tj1 >= $monp1 && $tj2 >= $monp2){ //from match and to not match
				$mon = 50;
			}else if($tj1 <= $monp1 && $tj2 <= $monp2 ){ // from not match and to match
				$mon = 50;
			}else{
				$mon = 0;
			}
		}
	


		if(abs($tuep1-$tuep2) == 0){
			$tue =0;
		}else{
			if($tj1 >= $tuep1 && $tj2 <= $tuep2 ){ //within the job timing
				$tue = 100;
			}else if($tj1 >= $tuep1 && $tj2 >= $tuep2){ //from match and to not match
				$tue = 50;
			}else if($tj1 <= $tuep1 && $tj2 <= $tuep2 ){ // from not match and to match
				$tue = 50;
			}else{
				$tue = 0;
			}
		}
	


		if(abs($wedp1-$wedp2) == 0){
			$wed =0;
		}else{
			if($tj1 >= $wedp1 && $tj2 <= $wedp2 ){ //within the job timing
				$wed = 100;
			}else if($tj1 >= $wedp1 && $tj2 >= $wedp2){ //from match and to not match
				$wed = 50;
			}else if($tj1 <= $wedp1 && $tj2 <= $wedp2 ){ // from not match and to match
				$wed = 50;
			}else{
				$wed = 0;
			}
		}
	


		if(abs($thup1-$thup2) == 0){
			$thu =0;
		}else{
			if($tj1 >= $thup1 && $tj2 <= $thup2 ){ //within the job timing
				$thu = 100;
			}else if($tj1 >= $thup1 && $tj2 >= $thup2){ //from match and to not match
				$thu = 50;
			}else if($tj1 <= $thup1 && $tj2 <= $thup2 ){ // from not match and to match
				$thu = 50;
			}else{
				$thu = 0;
			}
		}
	


		if(abs($frip1-$frip2) == 0){
			$fri =0;
		}else{
			if($tj1 >= $frip1 && $tj2 <= $frip2 ){ //within the job timing
				$fri = 100;
			}else if($tj1 >= $frip1 && $tj2 >= $frip2){ //from match and to not match
				$fri = 50;
			}else if($tj1 <= $frip1 && $tj2 <= $frip2 ){ // from not match and to match
				$fri = 50;
			}else{
				$fri = 0;
			}
		}
	


		if(abs($satp1-$satp2) == 0){
			$sat =0;
		}else{
			if($tj1 >= $satp1 && $tj2 <= $satp2 ){ //within the job timing
				$sat = 100;
			}else if($tj1 >= $satp1 && $tj2 >= $satp2){ //from match and to not match
				$sat = 50;
			}else if($tj1 <= $satp1 && $tj2 <= $satp2 ){ // from not match and to match
				$sat = 50;
			}else{
				$sat = 0;
			}
		}
	

		if(abs($sunp1-$sunp2) == 0){
			$sun =0;
		}else{
			if($tj1 >= $sunp1 && $tj2 <= $sunp2 ){ //within the job timing
				$sun = 100;
			}else if($tj1 >= $sunp1 && $tj2 >= $sunp2){ //from match and to not match
				$sun = 50;
			}else if($tj1 <= $sunp1 && $tj2 <= $sunp2 ){ // from not match and to match
				$sun = 50;
			}else{
				$sun = 0;
			}
		}
	

$final = compact("mon", "tue", "wed", "thu", "fri", "sat", "sun","t1","t2","diffdays");
return $final;

}


function timeDiffAllFixed($tj1, $tj2, $tp1, $tp2){

	$tj1 = strtotime($tj1);
	$tj2 = strtotime($tj2);
	$tp1 = strtotime($tp1);
	$tp2 = strtotime($tp2);

	$available = 0;
	$mon = $tue = $wed = $thu = $fri = $sat = $sun =  $diffdays = 0;
	$diffdays = 1;
			if($tj1 >= $tp1 && $tj2 <= $tp2 ){ //within the job timing
				$available = 100;
			}else if($tj1 >= $tp2 && $tj2 >= $tp2){ //from match and to not match
				$available = 50;
			}else if($tj1 <= $tp1 && $tj2 <= $tp2 ){ // from not match and to match
				$available = 50;
			}else{
				$available = 0;
			}
	$t1 = $available/2;
	$t2 = $available/2;
	$final = compact("mon", "tue", "wed", "thu", "fri", "sat", "sun","t1","t2","diffdays");

return $final;

}



?>