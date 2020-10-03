<?php
include ('../php/db.php');

if(!isset($_SESSION['id']))
{
echo "Error";
}

$empID = $_SESSION['id'];
$allData = new stdClass();

$sql ="SELECT p.*, IFNULL(x.jobnames, 'Any') AS jobnames, IFNULL(y.location, CONCAT('All ', l.location)) AS location,
CASE WHEN p.jobType=0 THEN 'Any' WHEN p.jobType=1 THEN 'Casual' WHEN p.jobType=2 THEN 'Part-time' WHEN p.jobType=3 THEN 'One-Off' END as jobTypeName
FROM profile p
LEFT JOIN (SELECT pj.profileid, GROUP_CONCAT(jt.jobTitle) as jobnames FROM profilemultijobtitles pj LEFT JOIN jobtitle jt ON pj.jobTitleid = jt.id GROUP BY pj.profileid) x ON x.profileid = p.id
LEFT JOIN (SELECT pl.profileid, GROUP_CONCAT(sl.location) as location FROM
	profilemultilocationsub pl LEFT JOIN locations_sub sl ON pl.locationSubid = sl.id GROUP BY pl.profileid) y ON y.profileid = p.id
LEFT JOIN locations l ON p.location = l.id 
WHERE p.userid=? AND p.status='1'";

$smt=$con->prepare($sql);
$smt->execute(array($empID));
$rowProfile = $smt->fetchAll(PDO::FETCH_OBJ);

$allData->profiles = $rowProfile;


$smt=$con->prepare("SELECT empid, jobid, profileid,  COUNT(*) as countdata FROM jobmatch WHERE seekerid=? AND status ='1' and short='1' GROUP BY profileid");
$smt->execute(array($empID));
$row = $smt->fetchAll(PDO::FETCH_OBJ);
$allData->match = $row;

$smt=$con->prepare("SELECT rp.userid, rp.comment, rp.rating, rp.timeStamp as timeStamp, r.userName FROM ratingseeker rp LEFT JOIN register r ON rp.userid=r.id WHERE rp.seekerid=? AND rp.status ='1' ORDER BY rp.timeStamp DESC LIMIT 5");
$smt->execute(array($empID));
$row = $smt->fetchAll(PDO::FETCH_OBJ);
$allData->comment = $row;

print json_encode($allData);
?>