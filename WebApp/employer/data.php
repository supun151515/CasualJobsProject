<?php
include ('../php/db.php');
require_once('timeDiff.php');
require_once('qua_other.php');
if(!isset($_SESSION['id']))
{
echo "Error";
return false;
}

if(isset($_POST['Reload'])){
	$_SESSION['updateMatch'] = '1';
	LoadData($con);
}
if(isset($_POST['LoadData'])){
	$_SESSION['updateMatch'] = '0';
	LoadData($con);
}


function runMatch($con){

$empID = $_SESSION['id'];

$smtjob = $con->prepare("SELECT * FROM job WHERE status = '1' AND userid=?");
$smtjob->execute(array($empID));

$smtprofile = $con->prepare("SELECT * FROM profile WHERE status = '1'");
$smtprofilemultiJobTitles = $con->prepare("SELECT * FROM profilemultijobtitles WHERE profileid=? AND jobTitleid = ?");
$smtprofileMultiLocationSub = $con->prepare("SELECT * FROM profilemultilocationsub WHERE profileid=? AND locationSubid=?");

while($rowjob=$smtjob->fetch(PDO::FETCH_OBJ)){
	$smtprofile->execute();
	while($rowprofile=$smtprofile->fetch(PDO::FETCH_OBJ)){
		if($rowprofile->multiJobTitle == '1'){ //checking seeker multiple jobTitle selections
			$smtprofilemultiJobTitles->execute(array($rowprofile->id, $rowjob->jobTitleid)); //check seeker jobtitles with job table title
			$rowCountMultiJobTitle = $smtprofilemultiJobTitles->rowCount();
			if($rowCountMultiJobTitle != 0){ //jobTitle found in profilemulti table. Now continue to location match

				$locationj = $rowjob->location;
				$locationp = $rowprofile->location;
				if($locationj == $locationp){

					$locationSub = 0;
					if($rowprofile->multiLocation == '0'){
						$locationSub = 100;
					}else {
							//Location Sub matching
							$smtprofileMultiLocationSub->execute(array($rowprofile->id, $rowjob->locationSub)); //check profile sub locations match with job sub location
							$rowCountMultiLocationSub = $smtprofileMultiLocationSub->rowCount();
							if($rowCountMultiLocationSub == 0){
									$locationSub = 0;
								}else {
									$locationSub = 100;
							}
					}

					//Job Title and location Matched
					AddToMatchedTable($rowjob, $rowprofile, $locationSub, $con);
				}

			}

		} else if($rowprofile->multiJobTitle == '0'){//any job title selected by seeker

				$locationj = $rowjob->location;
				$locationp = $rowprofile->location;
				if($locationj == $locationp){
					
					$locationSub = 0;
					if($rowprofile->multiLocation == '0'){
						$locationSub = 100;
					}else{
						//Location Sub matching
						$smtprofileMultiLocationSub->execute(array($rowprofile->id, $rowjob->locationSub)); //check profile sub locations match with job sub location
						$rowCountMultiLocationSub = $smtprofileMultiLocationSub->rowCount();
						if($rowCountMultiLocationSub == 0){
							$locationSub = 0;
							}else {
								$locationSub = 100;
						}
					}
					
					//Job Title any and location Matched
					AddToMatchedTable($rowjob, $rowprofile, $locationSub, $con);
			
					}
			}     
    }//end profiles loop

  } //end jobs loop
} //end function

function LoadData($con){

$empID = $_SESSION['id'];
runMatch($con);

$allData = new stdClass();

$smt=$con->prepare("SELECT j.*, CASE WHEN j.jobType = 1 THEN 'Casual' WHEN j.jobType = 2 THEN 'Part-time' WHEN j.jobType = 3 THEN 'One-Off' END as jobTypeName, l.location loc, ls.location locsub, jt.jobTitle FROM job j LEFT JOIN locations l ON j.location = l.id LEFT JOIN locations_sub ls ON j.locationSub = ls.id LEFT JOIN jobtitle jt ON j.jobTitleid = jt.id WHERE j.userid=? AND j.status='1'");
$smt->execute(array($empID));
$row = $smt->fetchAll(PDO::FETCH_OBJ);
$allData->jobs = $row;

$smt=$con->prepare("SELECT empid, jobid, COUNT(*) as countdata FROM jobmatch WHERE empid=? AND status ='1' GROUP BY jobid");
$smt->execute(array($empID));
$row = $smt->fetchAll(PDO::FETCH_OBJ);
$allData->match = $row;

$smt=$con->prepare("SELECT rp.userid, rp.comment, rp.rating, rp.timeStamp as timeStamp, r.userName FROM ratingemp rp LEFT JOIN register r ON rp.userid=r.id WHERE rp.empid=? AND rp.status ='1' ORDER BY rp.timeStamp DESC LIMIT 5");
$smt->execute(array($empID));
$row = $smt->fetchAll(PDO::FETCH_OBJ);
$allData->comment = $row;


print json_encode($allData);
}
?>