<?php

include ('../php/db.php');
include ('../php/session.php');

if(!isset($_POST['jobID'])){
	return false;
}
$empType = $_SESSION['type'];
if(!$empType == '1'){
	return false;
}
$allData = new stdClass();
$empID = $_SESSION['id'];
$jobID = $_POST['jobID'];

	$sql = "SELECT j.dateAdd, jt.jobTitle,
	CASE WHEN j.jobType=0 THEN 'ANY' 
	WHEN j.jobType=1 THEN 'Casual' 
	WHEN j.jobType=2 THEN 'Part-time' 
	WHEN j.jobType=3 THEN 'One-Off' 
	END as jobTypeName, l.location, ls.location as locationsub, j.payRate, j.jobDes, j.startDate, j.startType, j.endDate, j.endType, j.fromTime, j.toTime, j.totalHours, j.timeDiff, 
	CASE WHEN j.qualification=0 THEN 'Not Required' 
	WHEN j.qualification=1 THEN 'Ordinary level' 
	WHEN j.qualification=2 THEN 'College level' 
	WHEN j.qualification=3 THEN 'High-School level' 
	WHEN j.qualification=4 THEN 'University level' 
	END as qualification,
	CASE WHEN j.experience=0 THEN 'Any' 
	WHEN j.experience=1 THEN '1-3 Months' 
	WHEN j.experience=2 THEN '3-6 Months' 
	WHEN j.experience=3 THEN '6-12 Months' 
	WHEN j.experience=4 THEN '12+ Months' 
	END as experience, j.skills,
	CASE WHEN j.visaType=0 THEN 'Any' 
	WHEN j.visaType=1 THEN 'Student Work Visa' 
	WHEN j.visaType=2 THEN 'General Work Visa' 
	WHEN j.visaType=3 THEN 'Working Holiday Visa' 
	WHEN j.visaType=4 THEN 'Other Visa Type' END as visaType, 
	CASE WHEN j.license=0 THEN 'Any' 
	WHEN j.license=1 THEN 'Full' 
	WHEN j.license=2 THEN 'Restricted' 
	WHEN j.license=3 THEN 'International' END as license, 
	CASE WHEN j.vehicle=0 THEN 'Not Required' 
	WHEN j.vehicle=1 THEN 'Own Vehicle' END as vehicle, 
	CASE WHEN j.ethnicity=0 THEN 'Any' 
	WHEN j.ethnicity=1 THEN 'European' 
	WHEN j.ethnicity=2 THEN 'Māori' 
	WHEN j.ethnicity=3 THEN 'Pasifika' 
	WHEN j.ethnicity=4 THEN 'Asian' 
	WHEN j.ethnicity=5 THEN 'MELAA (Middle Eastern/Latin American/African)' END AS ethnicity, j.age1, j.age2, 
	CASE WHEN j.gender=0 THEN 'Any' 
	WHEN j.gender=1 THEN 'Male' 
	WHEN j.gender=2 THEN 'Female' END as gender, j.status, t.mon1, t.mon2, t.tue1, t.tue2, t.wed1, t.wed2, t.thu1, t.thu2, t.fri1, t.fri2, t.sat1, t.sat2, t.sun1, t.sun2
	FROM job j
	LEFT JOIN jobtitle jt ON j.jobTitleid = jt.id 
	LEFT JOIN locations l ON j.location = l.id 
	LEFT JOIN locations_sub ls ON ls.id = j.locationSub 
	LEFT JOIN timediffjobs t ON t.jobid = j.id WHERE j.userid = ? AND j.id = ?";
	$smt = $con->prepare($sql);
	$smt->execute(array($empID, $jobID));
	$row = $smt->fetch(PDO::FETCH_OBJ);
	$allData->job = $row;



	$sql = "SELECT jm.id, jm.profileid as profileid, r.userName, p.dateAdd, IFNULL(x.jobnames, 'Any') as jobnames, IFNULL(y.location, CONCAT('All ', l.location)) AS location, lsubj.location jlocation,  
	CASE WHEN p.jobType=0 THEN 'Any' 
	WHEN p.jobType=1 THEN 'Casual' 
	WHEN p.jobType=2 THEN 'Part-time' 
	WHEN p.jobType=3 THEN 'One-Off' 
	END as pjobTypeName,
	CASE WHEN j.jobType=0 THEN 'Any' 
	WHEN j.jobType=1 THEN 'Casual' 
	WHEN j.jobType=2 THEN 'Part-time' 
	WHEN j.jobType=3 THEN 'One-Off' 
	END as jjobTypeName, 
	jm.jobType, jm.locationSub, jm.payRate, jm.startDate, jm.endDate, jm.t1, jm.t2, jm.noWeek, jm.mon, jm.tue, jm.wed, jm.thu, jm.fri, jm.sat, jm.sun, jm.qualification, jm.experience, jm.skills, jm.visa, jm.license, jm.vehicle, jm.ethnicity, jm.age, jm.gender, jm.totalMatch, jm.short, 
	j.payRate as jpayRate, j.startDate as jstartDate, j.startType as jstartType, j.endDate as jendDate, j.endType as jendType, j.fromTime as jfromTime, j.toTime as jtoTime, j.timeDiff as jtimeDiff,
	CASE WHEN j.qualification=0 THEN 'Not Required' 
	WHEN j.qualification=1 THEN 'Ordinary level' 
	WHEN j.qualification=2 THEN 'College level' 
	WHEN j.qualification=3 THEN 'High-School level' 
	WHEN j.qualification=4 THEN 'University level' 
	END as jqualification,
	CASE WHEN j.experience=0 THEN 'Any' 
	WHEN j.experience=1 THEN '1-3 Months' 
	WHEN j.experience=2 THEN '3-6 Months' 
	WHEN j.experience=3 THEN '6-12 Months' 
	WHEN j.experience=4 THEN '12+ Months' 
	END as jexperience, j.skills jskills,
	CASE WHEN j.visaType=0 THEN 'Any' 
	WHEN j.visaType=1 THEN 'Student Work Visa' 
	WHEN j.visaType=2 THEN 'General Work Visa' 
	WHEN j.visaType=3 THEN 'Working Holiday Visa' 
	WHEN j.visaType=4 THEN 'Other Visa Type' END as jvisaType, 
	CASE WHEN j.license=0 THEN 'Any' 
	WHEN j.license=1 THEN 'Full' 
	WHEN j.license=2 THEN 'Restricted' 
	WHEN j.license=3 THEN 'International' END as jlicense, 
	CASE WHEN j.vehicle=0 THEN 'Not Required' 
	WHEN j.vehicle=1 THEN 'Own Vehicle' END as jvehicle, 
	CASE WHEN j.ethnicity=0 THEN 'Any' 
	WHEN j.ethnicity=1 THEN 'European' 
	WHEN j.ethnicity=2 THEN 'Māori' 
	WHEN j.ethnicity=3 THEN 'Pasifika' 
	WHEN j.ethnicity=4 THEN 'Asian' 
	WHEN j.ethnicity=5 THEN 'MELAA (Middle Eastern/Latin American/African)' END AS jethnicity, j.age1 jage1, j.age2 jage2, 
	CASE WHEN j.gender=0 THEN 'Any' 
	WHEN j.gender=1 THEN 'Male' 
	WHEN j.gender=2 THEN 'Female' END as jgender, j.status as jstatus, jt.mon1 jmon1, jt.mon2 jmon2, jt.tue1 jtue1, jt.tue2 jtue2, jt.wed1 jwed1, jt.wed2 jwed2, jt.thu1 jthu1, jt.thu2 jthu2, jt.fri1 jfri1, jt.fri2 jfri2, jt.sat1 jsat1, jt.sat2 jsat2, jt.sun1 jsun1, jt.sun2 jsun2, 

	p.payRate as ppayRate, p.startDate as pstartDate, p.startType as pstartType, p.endDate as pendDate, p.endType as pendType, p.fromTime as pfromTime, p.toTime as ptoTime, p.timeDiff as ptimeDiff, 
	CASE WHEN p.qualification=0 THEN 'Not Required' 
	WHEN p.qualification=1 THEN 'Ordinary level' 
	WHEN p.qualification=2 THEN 'College level' 
	WHEN p.qualification=3 THEN 'High-School level' 
	WHEN p.qualification=4 THEN 'University level' 
	END as pqualification,
	CASE WHEN p.experience=0 THEN 'Any' 
	WHEN p.experience=1 THEN '1-3 Months' 
	WHEN p.experience=2 THEN '3-6 Months' 
	WHEN p.experience=3 THEN '6-12 Months' 
	WHEN p.experience=4 THEN '12+ Months' 
	END as pexperience, p.skills as pskills,
	CASE WHEN p.visaType=0 THEN 'Any' 
	WHEN p.visaType=1 THEN 'Student Work Visa' 
	WHEN p.visaType=2 THEN 'General Work Visa' 
	WHEN p.visaType=3 THEN 'Working Holiday Visa' 
	WHEN p.visaType=4 THEN 'Other Visa Type' END as pvisaType, 
	CASE WHEN p.license=0 THEN 'Any' 
	WHEN p.license=1 THEN 'Full' 
	WHEN p.license=2 THEN 'Restricted' 
	WHEN p.license=3 THEN 'International' END as plicense, 
	CASE WHEN p.vehicle=0 THEN 'Not Required' 
	WHEN p.vehicle=1 THEN 'Own Vehicle' END as pvehicle, 
	CASE WHEN p.ethnicity=0 THEN 'Any' 
	WHEN p.ethnicity=1 THEN 'European' 
	WHEN p.ethnicity=2 THEN 'Māori' 
	WHEN p.ethnicity=3 THEN 'Pasifika' 
	WHEN p.ethnicity=4 THEN 'Asian' 
	WHEN p.ethnicity=5 THEN 'MELAA (Middle Eastern/Latin American/African)' END AS pethnicity, p.age page, 
	CASE WHEN p.gender=0 THEN 'Any' 
	WHEN p.gender=1 THEN 'Male' 
	WHEN p.gender=2 THEN 'Female' END as pgender, p.status as pstatus, pt.mon1 pmon1, pt.mon2 pmon2, pt.tue1 ptue1, pt.tue2 ptue2, pt.wed1 pwed1, pt.wed2 pwed2, pt.thu1 pthu1, pt.thu2 pthu2, pt.fri1 pfri1, pt.fri2 pfri2, pt.sat1 psat1, pt.sat2 psat2, pt.sun1 psun1, pt.sun2 psun2 


	FROM jobmatch jm 
	LEFT JOIN profile p ON p.id = jm.profileid 
	LEFT JOIN register r ON p.userid = r.id 
	LEFT JOIN (SELECT pj.profileid as profileid1, GROUP_CONCAT(jt.jobTitle) as jobnames FROM profilemultijobtitles pj LEFT JOIN jobtitle jt ON pj.jobTitleid = jt.id GROUP BY pj.profileid) x ON x.profileid1 = p.id 
	LEFT JOIN (SELECT pl.profileid, GROUP_CONCAT(sl.location) as location FROM
	profilemultilocationsub pl LEFT JOIN locations_sub sl ON pl.locationSubid = sl.id GROUP BY pl.profileid) y ON y.profileid = p.id 
	LEFT JOIN locations l ON p.location = l.id 
	LEFT JOIN job j ON j.id=jm.jobid 
	LEFT JOIN locations_sub lsubj ON j.locationSub = lsubj.id 
	LEFT JOIN timediffjobs jt ON jt.jobid=jm.jobid 
	LEFT JOIN timediffprofiles pt ON pt.profileid=p.id  
	WHERE jm.empid=? and jm.jobid=? AND jm.status=1 ORDER BY jm.totalMatch DESC";
	$smt = $con->prepare($sql);
	$smt->execute(array($empID, $jobID));
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	$allData->match = $row;

	print json_encode($allData);

	/*
	SELECT p.*, IFNULL(x.jobnames, 'Any') AS jobnames, IFNULL(y.location, CONCAT('All ', l.location)) AS location,
CASE WHEN p.jobType=0 THEN 'ANY' WHEN p.jobType=1 THEN 'Casual' WHEN p.jobType=2 THEN 'Part-time' WHEN p.jobType=3 THEN 'One-Off' END as jobTypeName
FROM profile p
LEFT JOIN (SELECT pj.profileid, GROUP_CONCAT(jt.jobTitle) as jobnames FROM profilemultijobtitles pj LEFT JOIN jobtitle jt ON pj.jobTitleid = jt.id GROUP BY pj.profileid) x ON x.profileid = p.id
LEFT JOIN (SELECT pl.profileid, GROUP_CONCAT(sl.location) as location FROM
	profilemultilocationsub pl LEFT JOIN locations_sub sl ON pl.locationSubid = sl.id GROUP BY pl.profileid) y ON y.profileid = p.id
LEFT JOIN locations l ON p.location = l.id 
WHERE p.userid=?
*/
?>