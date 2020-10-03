<?php
include ('../../php/session2.php');
include("../../php/mpdf/autoload.php");
include ("../../php/db.php");

if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
if(!isset($_SESSION['created_date'])){
	echo "You do not have permission to access this area";
	return false;
}

$seekerid= $_SESSION['id'];
$profileid ='0';
$created_date = $_SESSION['created_date'];
$created_time = $_SESSION['created_time'];


if(isset($_SESSION['profileidcv'])){
	$profileid = $_SESSION['profileidcv'];
}


if(isset($_SESSION['profileidcv']) && $_SESSION['seekeridcv']){
	$seekerid = $_SESSION['seekeridcv'];
	$profileid = $_SESSION['profileidcv'];
}

$smt = $con->prepare("SELECT * FROM job WHERE id=? AND userid=?");
$smt->execute(array($profileid, $seekerid));
$rowCount = $smt->rowCount();
if($rowCount == 0){
	echo "You do not have permission to access this page.";
	return false;
}
$rowprofile = $smt->fetch(PDO::FETCH_OBJ);

$smt = $con->prepare("SELECT * FROM register WHERE id=?");
$smt->execute(array($seekerid));
$rowregister = $smt->fetch(PDO::FETCH_OBJ);
if($rowregister->image == '0'){
	$imagePath = '../../css/images/nologo.png';
}else{
	$imagePath = '../../employer/images/'.$seekerid.'.jpg';
}



$sql = "SELECT p.dateAdd, jt.jobTitle, l.location location, ls.location sub_location,  
	CASE WHEN p.jobType=0 THEN 'Any' 
	WHEN p.jobType=1 THEN 'Casual' 
	WHEN p.jobType=2 THEN 'Part-time' 
	WHEN p.jobType=3 THEN 'One-Off' 
	END as TypeName, p.jobDes, 
	p.payRate as ppayRate, p.startDate as pstartDate, p.startType as pstartType, p.endDate as pendDate, p.endType as pendType, p.fromTime as pfromTime, p.toTime as ptoTime, p.timeDiff as ptimeDiff, p.totalHours as totalHours,  
	CASE WHEN p.qualification=0 THEN 'Any' 
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
	WHEN p.ethnicity=5 THEN 'MELAA (Middle Eastern/Latin American/African)' END AS pethnicity, p.age1 page1, p.age2 page2, 
	CASE WHEN p.gender=0 THEN 'Any' 
	WHEN p.gender=1 THEN 'Male' 
	WHEN p.gender=2 THEN 'Female' END as pgender, p.status as pstatus, pt.mon1 pmon1, pt.mon2 pmon2, pt.tue1 ptue1, pt.tue2 ptue2, pt.wed1 pwed1, pt.wed2 pwed2, pt.thu1 pthu1, pt.thu2 pthu2, pt.fri1 pfri1, pt.fri2 pfri2, pt.sat1 psat1, pt.sat2 psat2, pt.sun1 psun1, pt.sun2 psun2 


	FROM job p 
	LEFT JOIN jobtitle jt ON p.jobTitleid = jt.id 
	LEFT JOIN locations_sub ls ON p.locationSub = ls.id  
	LEFT JOIN locations l ON p.location = l.id 
	LEFT JOIN timediffjobs pt ON pt.jobid=p.id  
	WHERE p.id=?";
	$smt = $con->prepare($sql);
	$smt->execute(array($profileid));
	$profile = $smt->fetch(PDO::FETCH_OBJ);

$startDate = '0';
$endDate = '0';
if($profile->pstartType == 1){
	$startDate = '<span style="font-size:10px;">On Going job</span>';
}else{
	$startDate = $profile->pstartDate;
}
if($profile->pendType== 1){
	$endDate = '<span style="font-size:10px;">Not applicable</span>';
}else{
	$endDate = $profile->pendDate;
}

$fromTime = '0';
$toTime = '0';
if($profile->ptimeDiff == 0) {
	$fromTime = date('H:i', strtotime($profile->pfromTime));
	$toTime = date('H:i', strtotime($profile->ptoTime));
}else{
	$fromTime = '<span style="font-size:10px;">See Week Table</span>';
	$toTime = '<span style="font-size:10px;">See Week Table</span>';
}


$mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'pad']);
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;
$stylesheet = file_get_contents('../../employer/report/index.css');
$mpdf->WriteHTML($stylesheet,1);

$html = '
<div class="f1">
General Information
</div>
<br>
 
<table class="floatedTable" align="left"><tbody>
<tr>
<td class="generaltd">
Company Name:
</td>
<td align="left" class="secondtd">
'.$rowregister->userName.'
</td>
<td class="generaltd">
Job Offer:
</td>
<td align="left" class="secondtd">
'.$profile->jobTitle.'
</td>
</tr>
<tr>
<td class="generaltd">
Address:
</td>
<td align="left">
'.$rowregister->address1.'
</td>
<td class="generaltd">
Job Type:
</td>
<td align="left" class="secondtd">
'.$profile->TypeName.'
</td>
</tr>
<tr>
<td class="generaltd">

</td>
<td align="left">
'.$rowregister->address2.'
</td>
<td class="generaltd">
Location:
</td>
<td align="left" class="secondtd">
'.$profile->location.'
</td>
</tr>
<tr>
<td class="generaltd">
Suburb:
</td>
<td align="left">
'.$rowregister->suburb.'
</td>
<td class="generaltd">
Sub Locations:
</td>
<td align="left" class="secondtd">
'.$profile->sub_location.'
</td>
</tr>
<tr>
<td class="generaltd">
City:
</td>
<td align="left">
'.$rowregister->city.'
</td>
<td class="generaltd">
Pay Rate:
</td>
<td align="left" class="secondtd">
'.$profile->ppayRate.'
</td>
</tr>
<tr>
<td class="generaltd">
Post Code:
</td>
<td align="left">
'.$rowregister->postcode.'
</td>
<td class="generaltd">
Telephone
</td>
<td align="left">
'.$rowregister->telephone.'
</td>
</tr>
<tr>
<td class="generaltd">
Email
</td>
<td align="left">
'.$rowregister->email.'
</td>
</tr>
</tbody>
</table>
<br>
<div class="des">
Job Description: '.nl2br($profile->jobDes).'</div>
<br><br>
<div class="f1">
Time Availability
</div>
<br>
<table class="timing">
<tbody>
<tr>
<td class="time1">
Start Date:
</td>
<td class="time2">
'.$startDate.'
</td>
<td class="time3">
End Date
</td>
<td class="time4">
'.$endDate.'
</td>
<td class="time5">
Start time
</td>
<td class="time6">
'.$fromTime.'
</td>
<td class="time7">
End Time
</td>
<td class="time8">
'.$toTime.'
</td>
</tr>
</tbody>
</table>
';
if($profile->ptimeDiff == 1){
	$html .= '<br>
	<div class="f1">
Weekly Time Availability Table
</div>
<br>
<table width="100%">
<tbody>
<tr>
<td class="timetable1">
Monday:
</td>
<td class="timetable2">
'.date("H:i",strtotime($profile->pmon1)).' - '.date("H:i",strtotime($profile->pmon2)).'
</td>
<td class="timetable3">
Tuesday:
</td>
<td class="timetable4">
'.date("H:i",strtotime($profile->ptue1)).' - '.date("H:i",strtotime($profile->ptue2)).'
</td>
<td class="timetable5">
Wednesday:
</td>
<td class="timetable6">
'.date("H:i",strtotime($profile->pwed1)).' - '.date("H:i",strtotime($profile->pwed2)).'
</td>
</tr>
<tr>
<td class="timetable1">
Thursday:
</td>
<td class="timetable2">
'.date("H:i",strtotime($profile->pthu1)).' - '.date("H:i",strtotime($profile->pthu2)).'
</td>
<td class="timetable3">
Friday:
</td>
<td class="timetable4">
'.date("H:i",strtotime($profile->pfri1)).' - '.date("H:i",strtotime($profile->pfri2)).'
</td>
<td class="timetable5">
Saturday:
</td>
<td class="timetable6">
'.date("H:i",strtotime($profile->psat1)).' - '.date("H:i",strtotime($profile->psat2)).'
</td>
</tr>
<tr>
<td class="timetable1">
Sunday
</td>
<td class="timetable2">
'.date("H:i",strtotime($profile->psun1)).' - '.date("H:i",strtotime($profile->psun2)).'
</td>
</tr>
</tbody>
</table>

<br>
<div class="totalHours">Total Hours: '.date("H:i",strtotime($profile->totalHours)).'</div>

';
}

$html .= '<br><div class="f1">
Qualifications
</div>
<br>
<table width="100%">
<tbody>
<tr>
<td class="q1">
Qualifications:
</td>
<td class="q2">
'.$profile->pqualification.'
</td>
<td class="q3">
Experience:
</td>
<td class="q4">
'.$profile->pexperience.'
</td>
<td class="q5">
Skills:
</td>
<td class="q6">
'.$profile->pskills.'
</td>
</tr>
</tbody>
</table>

<br><div class="f1">
Other details
</div>
<br>

<table width="100%">
<tbody>
<tr>
<td class="q1">
Visa Type:
</td>
<td class="q2">
'.$profile->pvisaType.'
</td>
<td class="q3">
Driving Licence:
</td>
<td class="q4">
'.$profile->plicense.'
</td>
<td class="q5">
Vehicle Availability:
</td>
<td class="q6">
'.$profile->pvehicle.'
</td>
</tr>
<tr>
<td class="q1">
Ethnicity:
</td>
<td class="q2">
'.$profile->pethnicity.'
</td>
<td class="q3">
Age:
</td>
<td class="q4">
'.$profile->page1.' - '.$profile->page2.'
</td>
<td class="q5">
Gender:
</td>
<td class="q6">
'.$profile->pgender.'
</td>
</tr>
</tbody>
</table>
';
$mpdf->SetHTMLHeader('<table width="100%" align="left"><tbody>
<tr>
<td width="50%" class="userName">
'.$rowregister->userName.'
</td>
<td align="right">
<img class="profile" src="'.$imagePath.'" height="100" width="auto" />
</td>
</tr>
<tr>
<td colspan="2">
We are looking for '.$profile->jobTitle.' job vacancy in '.$profile->location.' greater suburbs. We mostly prefer candidates living near '.$profile->sub_location.' and walking distance areas to fulfil this job vacancy. 
</td>
</tr>
</tbody>
</table>');
$mpdf->SetHTMLFooter('<div class="print">
Printed by: '.$_SESSION['userName'].' on '.$created_date.' at '.$created_time.'
</div>');

$_SESSION['seekeridcv'] = '';
$_SESSION['profileidcv'] = '';
$_SESSION['created_time'] = '';
$_SESSION['created_date'] = '';
$mpdf->SetTitle(''.$rowregister->userName.'');
$mpdf->SetAuthor('Supun Silva');
$mpdf->SetCreator('Supun Silva');
$mpdf->WriteHTML($html,2); 
$mpdf->Output($rowregister->userName.' - '.$created_date.'.pdf','I');


?>