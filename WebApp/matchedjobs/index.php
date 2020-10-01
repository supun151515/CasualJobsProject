<?php
include ('../php/session.php');
require_once("../php/header.php");

$_SESSION['dropdown'] = '1';
require_once("../php/session.php");
if($_SESSION['type'] != '1'){
	echo "You are not allowed to access this feature";
	return false;
}
 
?>

<title>Matched Jobs</title>
<link href="index.css" rel="stylesheet" />
<script>

$(document).ready(function () {

var pathname = window.location.pathname;
var url      = window.location.href;
var jobID;
try{
var pieces = url.split("?");
var pieces = pieces[1];
pieces = pieces.split("&");

var status = pieces[0];

jobID = status.split("=");
jobID = jobID[1];
 
} catch(err) {

}

$(document).on("click", "#jobs tr", function(){
var rowID = this.id;
var thisDetails = $('#jobDetails'+rowID).css("display");

if(thisDetails == 'none'){
	$(".jobDetailsClass").hide(500)
	$("#jobDetails"+rowID).show(500);
}else{
	$(".jobDetailsClass").hide(500);
}


});

$(document).on("click", ".cv", function(e){
    e.stopPropagation();
    var matchid=this.id;
    matchid = matchid.substring(2, matchid.length);
    var created_date = moment().format('YYYY-MM-DD');
    var created_time = moment().format('hh:mm a');
    LockPage();
    $.ajax({url:'downloadcv.php', type:'POST', async:false, data:{matchid:matchid, created_date:created_date, created_time:created_time}, success:function(data){
        UnlockPage();
        try{
        if(data=='ok'){
            window.open("report");
        }else{
            alertify.alert("You do not have permission to view this candidate");
            return false;
        }
        }catch(err){
        console.log(err.message);
        return false;
        }
    }});
});
$(document).on("click", ".short", function(e){
    e.stopPropagation();
    var thishref = jQuery(this);
    var matchid = jQuery(this).closest('tr').attr('id');
    if ( $( this ).hasClass( "shortlisted" ) ){
        alertify.confirm('Confirm Decline', 'Are you sure, you would like to decline this candidate', function(){ 
        LockPage();
        $.ajax({url:'short.php', type:'POST', async:false, data:{short:"remove", jobID:jobID, matchid:matchid}, success:function(data){
            UnlockPage();
        try{
        if(data=='ok'){
            thishref.removeClass("shortlisted");
            thishref.text("Shortlist");
        }
        }catch(err){
        console.log(err.message);
        return false;
        }
        }});
        }
                , function(){ 

    });
    }else{
    alertify.confirm('Confirm Shortlist', 'Are you sure, you would like to shortlist this candidate', function(){
        LockPage(); 
        $.ajax({url:'short.php', type:'POST', async:false, data:{short:"add", jobID:jobID, matchid:matchid}, success:function(data){
            UnlockPage();
        try{
        if(data=='ok'){
            thishref.addClass("shortlisted");
            thishref.text("Shortlisted");
        }
        }catch(err){
        console.log(err.message);
        return false;
        }
        }});
        }
                , function(){ 

    });

    }


    
});
 



var parsedData;
LockPage();
$.ajax({url:'getJobs.php', type:'POST', async:false, data:{jobID:jobID}, success:function(data){
    UnlockPage();
    try{
        parsedData = JSON.parse(data);
        var jobs = parsedData.job;
        var matched = parsedData.match;
        $("#jobName").html(jobs.jobTitle);
        var htmlData = '<table id="displayJob" class="jobData table table-fixed table-striped"><tbody><tr><td>Posted Date</td><td>'+moment(jobs.dateAdd).format("YYYY-MM-DD")+'</td></tr>'

        htmlData+='<tr><td>Job Title</td><td>'+jobs.jobTitle+'</td></tr>';
        htmlData+='<tr><td>Job Type</td><td>'+jobs.jobTypeName+'</td></tr>';
        htmlData+='<tr><td>Location</td><td>'+jobs.location+'</td></tr>';
        htmlData+='<tr><td>Sub Location</td><td>'+jobs.locationsub+'</td></tr>';
        htmlData+='<tr><td>Pay Rate</td><td>'+jobs.payRate+'</td></tr>';
        htmlData+='<tr><td>Job Des</td><td>'+jobs.jobDes+'</td></tr>';
        htmlData+='<tr><td id"jstartDate">Start Date</td><td>'+moment(jobs.startDate).format("YYYY-MM-DD")+'</td></tr>';
        htmlData+='<tr><td id"jendDate">End Date</td><td>'+moment(jobs.endDate).format("YYYY-MM-DD")+'</td></tr>';

        if(jobs.timeDiff=='0'){
        	htmlData+='<tr class="daysdisplay"><td>From Time</td><td>'+ moment(jobs.fromTime,"HH:mm:ss").format("HH:mm") +'</td></tr>';
        	htmlData+='<tr class="daysdisplay"><td>To Time</td><td>'+moment(jobs.toTime,"HH:mm:ss").format("HH:mm")+'</td></tr>';
        }else{
        	htmlData+='<tr class="daysdisplayall"><td>Monday</td><td>'+moment(jobs.mon1,"HH:mm:ss").format("HH:mm")+'-'+moment(jobs.mon2,"HH:mm:ss").format("HH:mm")+'</td></tr>';
	        htmlData+='<tr class="daysdisplayall"><td>Tuesday</td><td>'+moment(jobs.tue1,"HH:mm:ss").format("HH:mm")+'-'+moment(jobs.tue2,"HH:mm:ss").format("HH:mm")+'</td></tr>';
	        htmlData+='<tr class="daysdisplayall"><td>Wednesday</td><td>'+moment(jobs.wed1,"HH:mm:ss").format("HH:mm")+'-'+moment(jobs.wed2,"HH:mm:ss").format("HH:mm")+'</td></tr>';
	        htmlData+='<tr class="daysdisplayall"><td>Thursday</td><td>'+moment(jobs.thu1,"HH:mm:ss").format("HH:mm")+'-'+moment(jobs.thu2,"HH:mm:ss").format("HH:mm")+'</td></tr>';
	        htmlData+='<tr class="daysdisplayall"><td>Friday</td><td>'+moment(jobs.fri1,"HH:mm:ss").format("HH:mm")+'-'+moment(jobs.fri2,"HH:mm:ss").format("HH:mm")+'</td></tr>';
	        htmlData+='<tr class="daysdisplayall"><td>Saturday</td><td>'+moment(jobs.sat1,"HH:mm:ss").format("HH:mm")+'-'+moment(jobs.sat2,"HH:mm:ss").format("HH:mm")+'</td></tr>';
	        htmlData+='<tr class="daysdisplayall"><td>Sunday</td><td>'+moment(jobs.sun1,"HH:mm:ss").format("HH:mm")+'-'+moment(jobs.sun2,"HH:mm:ss").format("HH:mm")+'</td></tr>';
        }
        
        htmlData+='<tr><td>Total Hours</td><td>'+moment.duration(jobs.totalHours, 'minutes').format('HH:mm')+'</td></tr>';
        htmlData+='<tr><td>Qualifications</td><td>'+jobs.qualification+'</td></tr>';
        htmlData+='<tr><td>Experience</td><td>'+jobs.experience+'</td></tr>';
        htmlData+='<tr><td>Skills</td><td>'+jobs.skills+'</td></tr>';
        htmlData+='<tr><td>Visa Type</td><td>'+jobs.visaType+'</td></tr>';
        htmlData+='<tr><td>License</td><td>'+jobs.license+'</td></tr>';
        htmlData+='<tr><td>Vehicle</td><td>'+jobs.vehicle+'</td></tr>';
        htmlData+='<tr><td>Ethnicity</td><td>'+jobs.ethnicity+'</td></tr>';
        htmlData+='<tr><td>Age Range</td><td>'+jobs.age1+' - '+jobs.age2+'</td></tr>';
        htmlData+='<tr><td>Gender</td><td>'+jobs.gender+'</td></tr>';

        htmlData+='</tbody></table>';
        $("#jobData").append(htmlData);



        //add job matched profiles table
        var num = 1;
  
        $.each(matched, function(i,v){

    	var html = '<tr id="'+v.id+'"><td style="display: none;" scope="col">'+v.id+'</td><td style="display: none;" scope="col">'+v.profileid+'</td><td scope="col" width="10px">'+num+'</td><td scope="col">'+moment(v.dateAdd).format('YYYY-MM-DD')+'</td><td scope="col" id="'+v.id+'">'+v.jobnames+'</td><td scope="col">'+v.location+'</td><td scope="col">'+v.userName+'</td><td scope="col">'+v.totalMatch+'%</td><td scope="col"><a href="#" class="short" id="short'+v.id+'" target="">Shortlist</a></td></tr>';


        //details
    	var htmldetails = '<tr id="jobDetails'+v.id+'" class="jobDetailsClass" style="display:none;" ><td colspan="7"><table id="" class="table table-fixed table-striped"><thead><tr><th scope="col">Compare</th><th scope="col">Employer</th><th scope="col">Seeker</th><th scope="col" class="text-right">Matched</th></tr></thead>';
    	
    	htmldetails+='<tbody><tr><th>Job Type</th><td>'+v.jjobTypeName+'</td><td>'+v.pjobTypeName+'</td><td class="text-right">'+v.jobType+'%</td></tr>'

        htmldetails +='<tr><th>Sub Location</th><td>'+v.jlocation+'</td><td>'+v.location+'</td><td class="text-right">'+v.locationSub+'%</td></tr>';
    	htmldetails +='<tr><th>Pay Rate</th><td>'+v.jpayRate+'</td><td>'+v.ppayRate+'</td><td class="text-right">'+v.payRate+'%</td></tr>';
    	htmldetails +='<tr><th>Start Date</th><td>'+moment(v.jstartDate).format("YYYY-MM-DD")+'</td><td>'+moment(v.pstartDate).format("YYYY-MM-DD")+'</td><td class="text-right">'+v.startDate+'%</td></tr>';
    	htmldetails +='<tr><th>End Date</th><td>'+moment(v.jendDate).format("YYYY-MM-DD")+'</td><td>'+moment(v.pendDate).format("YYYY-MM-DD")+'</td><td class="text-right">'+v.endDate+'%</td></tr>';


    	var jmon1 = jmon2=jtue1=jtue2=jwed1=jwed2=jthu1=jthu2=jfri1=jfri2=jsat1=jsat2=jsun1=jsun2=0;
    	var pmon1 = pmon2=ptue1=ptue2=pwed1=pwed2=pthu1=pthu2=pfri1=pfri2=psat1=psat2=psun1=psun2=0;
    	if(v.jtimeDiff == '1'){
    		jmon1 = v.jmon1;
    		jmon2 = v.jmon2;
    		jtue1 = v.jtue1;
    		jtue2 = v.jtue2;
    		jwed1 = v.jwed1;
    		jwed2 = v.jwed2;
    		jthu1 = v.jthu1;
    		jthu2 = v.jthu2;
    		jfri1 = v.jfri1;
    		jfri2 = v.jfri2;
    		jsat1 = v.jsat1;
    		jsat2 = v.jsat2;
    		jsun1 = v.jsun1;
    		jsun2 = v.jsun2;
    	}else{
    		jmon1 = v.jfromTime;
    		jmon2 = v.jtoTime;
    		jtue1 = v.jfromTime;
    		jtue2 = v.jtoTime;
    		jwed1 = v.jfromTime;
    		jwed2 = v.jtoTime;
    		jthu1 = v.jfromTime;
    		jthu2 = v.jtoTime;
    		jfri1 = v.jfromTime;
    		jfri2 = v.jtoTime;
    		jsat1 = v.jfromTime;
    		jsat2 = v.jtoTime;
    		jsun1 = v.jfromTime;
    		jsun2 = v.jtoTime;
    	}
    	 if(v.ptimeDiff == '1'){
    		pmon1 = v.pmon1;
    		pmon2 = v.pmon2;
    		ptue1 = v.ptue1;
    		ptue2 = v.ptue2;
    		pwed1 = v.pwed1;
    		pwed2 = v.pwed2;
    		pthu1 = v.pthu1;
    		pthu2 = v.pthu2;
    		pfri1 = v.pfri1;
    		pfri2 = v.pfri2;
    		psat1 = v.psat1;
    		psat2 = v.psat2;
    		psun1 = v.psun1;
    		psun2 = v.psun2;
    	}else{
    		pmon1 = v.pfromTime;
    		pmon2 = v.ptoTime;
    		ptue1 = v.pfromTime;
    		ptue2 = v.ptoTime;
    		pwed1 = v.pfromTime;
    		pwed2 = v.ptoTime;
    		pthu1 = v.pfromTime;
    		pthu2 = v.ptoTime;
    		pfri1 = v.pfromTime;
    		pfri2 = v.ptoTime;
    		psat1 = v.pfromTime;
    		psat2 = v.ptoTime;
    		psun1 = v.pfromTime;
    		psun2 = v.ptoTime;
    	}
    	
    	if(v.noWeek == '1'){
    		htmldetails +='<tr><th>From Time</th><td>'+moment(v.jfromTime,"HH:mm:ss").format("HH:mm")+'</td><td>'+moment(v.pfromTime,"HH:mm:ss").format("HH:mm")+'</td><td class="text-right">'+v.t1+'%</td></tr>';
    		htmldetails +='<tr><th>To Time</th><td>'+moment(v.jtoTime,"HH:mm:ss").format("HH:mm")+'</td><td>'+moment(v.ptoTime,"HH:mm:ss").format("HH:mm")+'</td><td class="text-right">'+v.t2+'%</td></tr>';
    	}else{

    	htmldetails +='<tr><th>Mon</th><td>'+moment(jmon1,"HH:mm:ss").format("HH:mm")+' - '+moment(jmon2,"HH:mm:ss").format("HH:mm")+'</td><td>'+moment(pmon1,"HH:mm:ss").format("HH:mm")+' - '+moment(pmon2,"HH:mm:ss").format("HH:mm")+'</td><td class="text-right">'+v.mon+'%</td></tr>';
    	htmldetails +='<tr><th>Tue</th><td>'+moment(jtue1,"HH:mm:ss").format("HH:mm")+' - '+moment(jtue2,"HH:mm:ss").format("HH:mm")+'</td><td>'+moment(ptue1,"HH:mm:ss").format("HH:mm")+' - '+moment(ptue2,"HH:mm:ss").format("HH:mm")+'</td><td class="text-right">'+v.tue+'%</td></tr>';
    	htmldetails +='<tr><th>Wed</th><td>'+moment(jwed1,"HH:mm:ss").format("HH:mm")+' - '+moment(jwed2,"HH:mm:ss").format("HH:mm")+'</td><td>'+moment(pwed1,"HH:mm:ss").format("HH:mm")+' - '+moment(pwed2,"HH:mm:ss").format("HH:mm")+'</td><td class="text-right">'+v.wed+'%</td></tr>';
    	htmldetails +='<tr><th>Thu</th><td>'+moment(jthu1,"HH:mm:ss").format("HH:mm")+' - '+moment(jthu2,"HH:mm:ss").format("HH:mm")+'</td><td>'+moment(pthu1,"HH:mm:ss").format("HH:mm")+' - '+moment(pthu2,"HH:mm:ss").format("HH:mm")+'</td><td class="text-right">'+v.thu+'%</td></tr>';
    	htmldetails +='<tr><th>Fri</th><td>'+moment(jfri1,"HH:mm:ss").format("HH:mm")+' - '+moment(jfri2,"HH:mm:ss").format("HH:mm")+'</td><td>'+moment(pfri1,"HH:mm:ss").format("HH:mm")+' - '+moment(pfri2,"HH:mm:ss").format("HH:mm")+'</td><td class="text-right">'+v.fri+'%</td></tr>';
    	htmldetails +='<tr><th>Sat</th><td>'+moment(jsat1,"HH:mm:ss").format("HH:mm")+' - '+moment(jsat2,"HH:mm:ss").format("HH:mm")+'</td><td>'+moment(psat1,"HH:mm:ss").format("HH:mm")+' - '+moment(psat2,"HH:mm:ss").format("HH:mm")+'</td><td class="text-right">'+v.sat+'%</td></tr>';
    	htmldetails +='<tr><th>Sun</th><td>'+moment(jsun1,"HH:mm:ss").format("HH:mm")+' - '+moment(jsun2,"HH:mm:ss").format("HH:mm")+'</td><td>'+moment(pmon1,"HH:mm:ss").format("HH:mm")+' - '+moment(psun2,"HH:mm:ss").format("HH:mm")+'</td><td class="text-right">'+v.sun+'%</td></tr>';
    	}
    	
    	htmldetails +='<tr><th>Qualification</th><td>'+v.jqualification+'</td><td>'+v.pqualification+'</td><td class="text-right">'+v.qualification+'%</td></tr>';
    	htmldetails +='<tr><th>Experience</th><td>'+v.jexperience+'</td><td>'+v.pexperience+'</td><td class="text-right">'+v.experience+'%</td></tr>';
    	htmldetails +='<tr><th>Skills</th><td>'+v.jskills+'</td><td>'+v.pskills+'</td><td class="text-right">'+v.skills+'%</td></tr>';
    	htmldetails +='<tr><th>Visa</th><td>'+v.jvisaType+'</td><td>'+v.pvisaType+'</td><td class="text-right">'+v.visa+'%</td></tr>';
    	htmldetails +='<tr><th>License</th><td>'+v.jlicense+'</td><td>'+v.plicense+'</td><td class="text-right">'+v.license+'%</td></tr>';
    	htmldetails +='<tr><th>Vehicle</th><td>'+v.jvehicle+'</td><td>'+v.pvehicle+'</td><td class="text-right">'+v.vehicle+'%</td></tr>';
    	htmldetails +='<tr><th>Ethnicity</th><td>'+v.jethnicity+'</td><td>'+v.pethnicity+'</td><td class="text-right">'+v.ethnicity+'%</td></tr>';
    	htmldetails +='<tr><th>Age</th><td>'+v.jage1+' - '+v.jage2+'</td><td>'+v.page+'</td><td class="text-right">'+v.age+'%</td></tr>';
    	htmldetails +='<tr><th>Gender</th><td>'+v.jgender+'</td><td>'+v.pgender+'</td><td class="text-right">'+v.gender+'%</td></tr>';
    	htmldetails +='<tr><th colspan="2"><b>Overall Job Matching percentage</b></th><td><button type="button" id="cv'+v.id+'" class="btn btn-primary btn-xs cv">Download CV</button></td><td class="text-right"><b>'+v.totalMatch+'%</b></td></tr>';
    	htmldetails +='</tbody></table></td></tr>';
    	html += htmldetails;






    		//end details
    	//$('<tr>'+html+'</tr>').insertAfter($("#jobs").find('tr:last'));
    	$("#jobs").append(html);
        if(v.short == '1'){
            $("#short"+v.id).addClass("shortlisted");
            $("#short"+v.id).text("Shortlisted");   
        }else if(v.short =='2'){
            $("#short"+v.id).addClass("shortlisted blue");
            $("#short"+v.id).text("Accepted"); 
        }
    	num++;
    	});
        }catch(err){
        console.log(err.message);
        return false;
        }

}});

}); //end doc
</script>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 pageHeader">Matched Candidates</div>
    </div>
</div>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 imgContainer align-items-center">
			<img alt="Employer" src="<?php echo $imagePath; ?>" class="img-thumbnail pb-2" width="auto" height="200" />
			<div class="card bg-default">
				<h5 class="card-header">
					<?php echo $_SESSION['userName']; ?>
				</h5>
				<div class="card-body">
					<div class="card-text table-responsive" id="jobData">

					</div>
				</div>
				<div class="card-footer">
					<a href="../editprofile">Edit Profile</a>
				</div>
				<div class="card-footer">
					<a href="../php/logout.php">Logout</a>
				</div>
			</div>
		</div>
		<br>
		<div class="col-md-8">
        
			<h5>
				Matched Profiles for the job:<br><b> <span id="jobName"></span></b>
			</h5>
		 <div class="table-responsive-sm">
			<table class="table table-hover table-fixed table-striped jobs" id="jobs">
				<thead>
					<tr>
						<th scope="col" width="10px">
							#
						</th>
						<th scope="col">
							Date Posted
						</th>
						<th scope="col">
							Job Titles
						</th>
						<th scope="col">
							Locations
						</th>
						<th scope="col">
							Candidate Name
						</th>
						<th scope="col">
							Match		
						</th>
						<th scope="col">
							Details
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
 

</div>
<?php
 require_once("../php/footer.php");
?>