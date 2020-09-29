<?php
require_once("../php/session.php");
require_once("../php/header.php");

if($_SESSION['type'] != '1'){
	echo "You are not allowed to access this feature";
	return false;
}
 
?>

<link href="../css/jquery.tagsinput-revisited.min.css" rel="stylesheet" />
<script src="../js/jquery.tagsinput-revisited.min.js"></script>
<script src="wizard.js"></script>
<script src="jobTitle.js"></script>
<script src="locations.js"></script>
<script src="locations_sub.js"></script>

<script>
var jobid = '0';
var locationVal = '0';
var locationSub = '0';

function Validate(){
	return false;
}

var t1, t2, mon1, mon2, tue1, tue2, wed1, wed2, thu1, thu2, fri1, fri2, sat1, sat2, sun1, sun2;

function getTotalHrs(){
	t1 = $("#timefrom").jqxDateTimeInput('getDate');
	t1 = moment(t1);
	t2 = $("#timeto").jqxDateTimeInput('getDate');
	t2 = moment(t2);
	var diffa = t2.diff(t1, 'minutes');
	diffa = moment.utc(moment.duration(diffa, "minutes").asMilliseconds()).format("HH:mm");
	$("#totalHours").html(diffa);
}
function getTotalHrsWeek(){
	mon1 = $("#timefrommon").jqxDateTimeInput('getDate');
	mon1 = moment(mon1);
	mon2 = $("#timetomon").jqxDateTimeInput('getDate');
	mon2 = moment(mon2);
	var totmon = mon2.diff(mon1, 'minutes');
	//totmon = moment.utc(moment.duration(totmon, "minutes").asMilliseconds()).format("HH:mm");

	tue1 = $("#timefromtue").jqxDateTimeInput('getDate');
	tue1 = moment(tue1);
	tue2 = $("#timetotue").jqxDateTimeInput('getDate');
	tue2 = moment(tue2);
	var tottue = tue2.diff(tue1, 'minutes');
	//tottue = moment.utc(moment.duration(tottue, "minutes").asMilliseconds()).format("HH:mm");

	wed1 = $("#timefromwed").jqxDateTimeInput('getDate');
	wed1 = moment(wed1);
	wed2 = $("#timetowed").jqxDateTimeInput('getDate');
	wed2 = moment(wed2);
	var totwed = wed2.diff(wed1, 'minutes');
	//totwed = moment.utc(moment.duration(totwed, "minutes").asMilliseconds()).format("HH:mm");

	thu1 = $("#timefromthu").jqxDateTimeInput('getDate');
	thu1 = moment(thu1);
	thu2 = $("#timetothu").jqxDateTimeInput('getDate');
	thu2 = moment(thu2);
	var totthu = thu2.diff(thu1, 'minutes');
	//totthu = moment.utc(moment.duration(totthu, "minutes").asMilliseconds()).format("HH:mm");

	fri1 = $("#timefromfri").jqxDateTimeInput('getDate');
	fri1 = moment(fri1);
	fri2 = $("#timetofri").jqxDateTimeInput('getDate');
	fri2 = moment(fri2);
	var totfri = fri2.diff(fri1, 'minutes');
	//totfri = moment.utc(moment.duration(totfri, "minutes").asMilliseconds()).format("HH:mm");

	sat1 = $("#timefromsat").jqxDateTimeInput('getDate');
	sat1 = moment(sat1);
	sat2 = $("#timetosat").jqxDateTimeInput('getDate');
	sat2 = moment(sat2);
	var totsat = sat2.diff(sat1, 'minutes');
	//totsat = moment.utc(moment.duration(totsat, "minutes").asMilliseconds()).format("HH:mm");
	//console.log(sat1+ ' - ' + sat2 + ' - '+ totsat);
	sun1 = $("#timefromsun").jqxDateTimeInput('getDate');
	sun1 = moment(sun1);
	sun2 = $("#timetosun").jqxDateTimeInput('getDate');
	sun2 = moment(sun2);
	var totsun = sun2.diff(sun1, 'minutes');
	//totsun = moment.utc(moment.duration(totsun, "minutes").asMilliseconds()).format("HH:mm");
	var finalhours = parseFloat(totmon + tottue + totwed + totthu + totfri + totsat + totsun);
	var newtotalHours = Math.floor(finalhours / 60) + ':' + finalhours % 60;
	newtotalHours = moment.duration(newtotalHours, 'minutes');
 
	$("#totalHours").html(newtotalHours.format('HH:mm'));
	//$("#totalHours").html(moment.utc(moment.duration(finalhours, "minutes").asMilliseconds()).format("HH:mm"));
}


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
$("#datestart, #dateend").jqxDateTimeInput({ formatString: "dd/MM/yyyy", width: '120px' });
$("#timefrom, #timeto, .timeweek").jqxDateTimeInput({formatString: 'HH:mm', showTimeButton: true, showCalendarButton: false, width: '80px', editMode: 'full'});

$("#payrate").keyup(function() {
    var $this = $(this);
    $this.val($this.val().replace(/[^\d.]/g, ''));        
});

var parsedData;
 $.ajax({url:'loadData.php', type:'POST', data:{jobid:jobID}, async:false, success:function(data){
        try{
         parsedData = JSON.parse(data);
        }catch(err){
        console.log(err.message);
        return false;
        }
 	
 	var job = parsedData.job;
 	var times = parsedData.times;

 	$("#jobTitle").jqxDropDownList('val', job.jobTitleid);
 	$("#jobtype").val(job.jobType);
 	$("#location").jqxDropDownList('val', job.location);
	$("#location_sub").jqxDropDownList('val', job.locationSub);
	$("#payrate").val(job.payRate);
	$("#jobdes").val(job.jobDes);

	$("#datestart").jqxDateTimeInput('setDate', new Date(job.startDate));
	$("#dateend").jqxDateTimeInput('setDate', new Date(job.endDate));
	if(job.startType == '1'){
		$( "#ongoing" ).prop( "checked", true );
		$("#datestart").jqxDateTimeInput({ disabled: true });
	}
	if(job.endType == '1'){
		$( "#endno" ).prop( "checked", true );
		$("#dateend").jqxDateTimeInput({ disabled: true });
	}
 
	var fromTime = moment(job.fromTime, "HH:mm:ss").format("HH:mm");
	var toTime = moment(job.toTime, "HH:mm:ss").format("HH:mm");
	 
	$("#timefrom").jqxDateTimeInput('setDate', fromTime);
	$("#timeto").jqxDateTimeInput('setDate', toTime);

	var totalHours = moment.duration(job.totalHours, 'minutes');
	$("#totalHours").html(totalHours.format("HH:mm"));
	if(job.timeDiff == '1'){
		$( "#diff" ).prop( "checked", true );
	 	$(".timeweektable").show();
		$("#timefrom, #timeto").jqxDateTimeInput({ disabled: true });

		var mon1 = moment(times.mon1, "HH:mm:ss").format("HH:mm");
		var mon2 = moment(times.mon2, "HH:mm:ss").format("HH:mm");
		var tue1 = moment(times.tue1, "HH:mm:ss").format("HH:mm");
		var tue2 = moment(times.tue2, "HH:mm:ss").format("HH:mm");
		var wed1 = moment(times.wed1, "HH:mm:ss").format("HH:mm");
		var wed2 = moment(times.wed2, "HH:mm:ss").format("HH:mm");
		var thu1 = moment(times.thu1, "HH:mm:ss").format("HH:mm");
		var thu2 = moment(times.thu2, "HH:mm:ss").format("HH:mm");
		var fri1 = moment(times.fri1, "HH:mm:ss").format("HH:mm");
		var fri2 = moment(times.fri2, "HH:mm:ss").format("HH:mm");
		var sat1 = moment(times.sat1, "HH:mm:ss").format("HH:mm");
		var sat2 = moment(times.sat2, "HH:mm:ss").format("HH:mm");
		var sun1 = moment(times.sun1, "HH:mm:ss").format("HH:mm");
		var sun2 = moment(times.sun2, "HH:mm:ss").format("HH:mm");
 
		$("#timefrommon").jqxDateTimeInput('setDate', mon1);
		$("#timetomon").jqxDateTimeInput('setDate', mon2);
		$("#timefromtue").jqxDateTimeInput('setDate', tue1);
		$("#timetotue").jqxDateTimeInput('setDate', tue2);
		$("#timefromwed").jqxDateTimeInput('setDate', wed1);
		$("#timetowed").jqxDateTimeInput('setDate', wed2);
		$("#timefromthu").jqxDateTimeInput('setDate', thu1);
		$("#timetothu").jqxDateTimeInput('setDate', thu2);
		$("#timefromfri").jqxDateTimeInput('setDate', fri1);
		$("#timetofri").jqxDateTimeInput('setDate', fri2);
		$("#timefromsat").jqxDateTimeInput('setDate', sat1);
		$("#timetosat").jqxDateTimeInput('setDate', sat2);
		$("#timefromsun").jqxDateTimeInput('setDate', sun1);
		$("#timetosun").jqxDateTimeInput('setDate', sun2);

	}

	$("#qualification").val(job.qualification);
	$("#experience").val(job.experience);
	$("#skills").val(job.skills);
	$("#visa").val(job.visaType);
	$("#license").val(job.license);
	$("#vehicle").val(job.vehicle);
	$("#ethnicity").val(job.ethnicity);
	$("#age1").val(job.age1);
	$("#age2").val(job.age2);
	$("#gender").val(job.gender);


}});


$("#timefrom, #timeto, .timeweek").on('valueChanged', function (event) {
	$("#diff").is(':checked') ? getTotalHrsWeek() : getTotalHrs();
});
jobid = $("#jobTitle").jqxDropDownList('getSelectedItem');
if(jobid != null){
	jobid = jobid.value;
}else{
	jobid = '0';
}
$('#jobTitle').on('change', function (event)
{     
    var args = event.args;
    if (args) {                      
    var index = args.index;
    var item = args.item;
    jobid = item.value;
	} 
});

var parsedData;
$.ajax({url:"tags.php", type:"POST", data:{jobid:jobid}, async:true, success:function(data){
          try {
            parsedData = JSON.parse(data);
            }
          catch(err) {
            alertify.error(data);
            return false;
          }
        }});


$("#skills").tagsInput({
	interactive: true,
	unique:true,
	minChars: 2,
    maxChars: 20,
	autocomplete:{
	source: function(request, response) {
  		$.ajax({
     	url: "tags.php",
     	dataType: "json",
     	type:"POST",
     	data: {
        	jobid: jobid
     		},
	     	success: function(data) {
	        	response( $.map( data, function( item ) {
	                        return {
	                            label: item.skill,
	                            value: item.skill
	                        }
	          }));

	     	}
  		})
	}}
});



$("#diff").click(function(){
	if($(this).is(':checked')){
		$(".timeweektable").show();
		$("#timefrom, #timeto").jqxDateTimeInput({ disabled: true });
	}else {
		$(".timeweektable").hide();
		$("#timefrom, #timeto").jqxDateTimeInput({ disabled: false });
	}
	});



$("#finish").click(function(){
 var today = moment($.datepicker.formatDate('yy-mm-dd', new Date()), 'YYYY-MM-DD');
	if(jobid == '0' ){
		alertify.error("Please select the Job Title");
		$('a[href="#step-1"]').trigger("click");
		$("#jobTitle").jqxDropDownList('open' ); 
		return false;
	}
	locationVal = $("#location").jqxDropDownList('getSelectedItem');
	locationSub = $("#location_sub").jqxDropDownList('getSelectedItem');
	if(locationVal == null || locationSub == null){
		alertify.error("Please select the Location and sub location");
		$('a[href="#step-1"]').trigger("click");
		$("#location_sub").jqxDropDownList('open' ); 
		return false;
	}
	var payRate = $("#payrate").val();
	if(!$.isNumeric(payRate)){
		
		alertify.error("Invalid Pay Rate input detected");
		$('a[href="#step-1"]').trigger("click");
		$("#payrate").focus();
		return false;
		
	}

	var dateStart = moment($('#datestart').jqxDateTimeInput('getDate'), 'YYYY-MM-DD'); 
	var dateEnd = moment($('#dateend').jqxDateTimeInput('getDate'), 'YYYY-MM-DD');
	var diffDate = dateEnd.diff(dateStart, 'days');

	if(today > dateStart){
		if(!$("#ongoing").is(':checked')){
		alertify.error("Invalid start date selected");
		$('a[href="#step-2"]').trigger("click");
		return false;
		}
	}
	if(today > dateEnd){
		if(!$("#endno").is(':checked')){
		alertify.error("Invalid end date selected");
		$('a[href="#step-2"]').trigger("click");
		return false;
		}
	}
	
	if($("#ongoing").is(':checked') || $("#endno").is(':checked')){

	}else{
		if(diffDate < 0 ){
		alertify.error("Invalid date range selection.");
		$('a[href="#step-2"]').trigger("click");
		return false;
		}
	}
	

	var totalHours = $("#totalHours").html();
	if(totalHours == '' || totalHours == '0'){
		alertify.error("Invalid Total hours. Please select work durations");
		$('a[href="#step-2"]').trigger("click");
		return false;
	}

	var age1 = $("#age1").val();
	var age2 = $("#age2").val();
	if(age1 < '18'){
		alertify.error("Invalid age selection");
		$("#age1").focus();
		return false;
	}
	if(age1 > age2) {
		alertify.error("Invalid age selection");
		$("#age1").focus();
		return false;
	}
   	t1 = $("#timefrom").jqxDateTimeInput('getDate');
	t1 = moment(t1);
	t2 = $("#timeto").jqxDateTimeInput('getDate');
	t2 = moment(t2);
	getTotalHrsWeek();
   var dateNow = Date.now(); 
   dateNow = moment(dateNow).format('YYYY-MM-DD');
   var data = $("#myform").serializeArray();
   var onGoing = +$("#ongoing").is(':checked');
   var endDateCheck = +$("#endno").is(':checked');
   var diffTimes = +$("#diff").is(':checked');
   var totalHours = $("#totalHours").html();
   data.push({name:'update', value: '1'});
   data.push({name:'jobid', value: jobID });
   data.push({name: 'dateAdd', value: dateNow});
   data.push({name:'jobTitle', value: jobid});
   data.push({name:'Location', value: locationVal.value});
   data.push({name:'LocationSub', value: locationSub.value});
   data.push({name:'dateStart', value: moment(dateStart).format("YYYY-MM-DD")});
   data.push({name:'dateEnd', value: moment(dateEnd).format("YYYY-MM-DD")});
   data.push({name:'onGoing', value: onGoing});
   data.push({name:'endDateCheck', value: endDateCheck});
   data.push({name:'diffTimes', value: diffTimes});
   data.push({name:'totalHours', value: totalHours});
   data.push({name:'t1', value: moment(t1).format('HH:mm')});
   data.push({name:'t2', value: moment(t2).format('HH:mm')});
   data.push({name:'mon1', value: moment(mon1).format('HH:mm')});
   data.push({name:'mon2', value: moment(mon2).format('HH:mm')});
   data.push({name:'tue1', value: moment(tue1).format('HH:mm')});
   data.push({name:'tue2', value: moment(tue2).format('HH:mm')});
   data.push({name:'wed1', value: moment(wed1).format('HH:mm')});
   data.push({name:'wed2', value: moment(wed2).format('HH:mm')});
   data.push({name:'thu1', value: moment(thu1).format('HH:mm')});
   data.push({name:'thu2', value: moment(thu2).format('HH:mm')});
   data.push({name:'fri1', value: moment(fri1).format('HH:mm')});
   data.push({name:'fri2', value: moment(fri2).format('HH:mm')});
   data.push({name:'sat1', value: moment(sat1).format('HH:mm')});
   data.push({name:'sat2', value: moment(sat2).format('HH:mm')});
   data.push({name:'sun1', value: moment(sun1).format('HH:mm')});
   data.push({name:'sun2', value: moment(sun2).format('HH:mm')});


   $.post("data.php", data, function(data){
       if(data == 'ok'){
        alertify.alert("Success", "Your job has been updated successfully", function(){
          document.location = '../employer';
        });
        
        return false;
       }
       else {
        alertify.alert("Error", "Unable to continue. Please contact your system administrator");
        return false;
       }
    });

});

$("#endno").change(function(){
	$(this).is(':checked') ? $("#dateend").jqxDateTimeInput({ disabled: true }) : $("#dateend").jqxDateTimeInput({ disabled: false });
});

$("#ongoing").change(function(){
	$(this).is(':checked') ? $("#datestart").jqxDateTimeInput({ disabled: true }) : $("#datestart").jqxDateTimeInput({ disabled: false });
});

 

});// end doc.ready
    
</script>
<title>Update Job</title>
<link href="index.css" rel="stylesheet" />
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 pageHeader">Employer Update Job</div>
    </div>
</div>
<br>
<div class="container-fluid pb-5">
	<div class="row">
			<div class="col-md-4 imgContainer align-items-center">
			<img alt="Employer" src="<?php echo $imagePath; ?>" class="img-thumbnail pb-2" width="auto" height="200" />
			<div class="card bg-default">
				<h5 class="card-header">
					<?php echo $_SESSION['userName']; ?>
				</h5>
				<div class="card-body">
					<p class="card-text">
						<p><?php echo $_SESSION['address1'].' '. $_SESSION['address2'].', '. $_SESSION['suburb'].', '.$_SESSION['city'].', '.$_SESSION['postcode']; ?></p>
						<p><?php echo $_SESSION['email']; ?></p>
						<p><?php echo $_SESSION['telephone']; ?></p>
					</p>
				</div>
				<div class="card-footer">
					<a href="../editprofile">Edit Profile</a>
				</div>
				<div class="card-footer">
					<a href="../php/logout.php">Logout</a>
				</div>
			</div>
		</div> <!-- Profile end -->
	
	<div class="col-md-8">
		<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Job Details</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Job Timing</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Qualifications</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Other</small></p>
            </div>
        </div>
    </div>
    
    <form role="form" class="" id="myform" onsubmit="return Validate();">
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Job Details</h3>
            </div>
            <br>
            <div class="panel-body">
             <div class="form-group row">
				  <label class="col-md-2 control-label" for="jobtitle">Job Title</label>
				  <div class="col-md-6">
				    <div id="jobTitle"></div>
				  </div>
			</div>
              <div class="form-group row">
				  <label class="col-md-2 control-label" for="jobtype">Job Type</label>
				  <div class="col-md-4">
				    <select id="jobtype" name="jobtype" class="form-control">
				      <option value="1" selected="">Casual</option>
				      <option value="2">Part-time</option>
				      <option value="3">One-Off</option>
				    </select>
				  </div>
				</div>
			<div class="form-group row">
				  <label class="col-md-2 control-label" for="joblocation">Job Location</label>
				  <div class="col-md-6">
					  <div id="location"></div>
				  </div>
			</div>
			<div class="form-group row" id="location_sub_group" style="display: none;">
				  <label class="col-md-2 control-label" for="joblocation">Sub Location</label>
				  <div class="col-md-6">
					  <div id="location_sub"></div>
				  </div>
			</div>
			<div class="form-group row">
				  <label class="col-md-2 control-label" for="payrate">Pay Rate: $/hour</label>  
				  <div class="col-md-2">
				  <input id="payrate" name="payrate" type="text" placeholder="" class="form-control input-md" required="" value="18.90">
				  </div>
			</div>
			<div class="form-group row">
				  <label class="col-md-2 control-label" for="jobdes">Job Description</label>
				  <div class="col-md-6">                     
				    <textarea maxlength="500" class="form-control" id="jobdes" name="jobdes" rows="5"></textarea>
				  </div>
			</div>
			<div class="form-group row" style="float: right;">
				  <div class="col-md-6">
				    <button id="singlebutton" name="singlebutton" class="btn btn-primary nextBtn pull-right">Next</button>
				  </div>
			</div>
			</div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title">Job Timing</h3>
            </div>
            <br>
       	<div class="panel-body">
				<div class="form-group row">
				  <label class="col-md-2 control-label" for="dateend">Start Date</label>  
				  <div class="col-md-4">
				  <div id='datestart'></div>
				  </div>
				 </div>
				 <div class="form-group row mt-n3">
				 <div class="col-md-2">
				 </div>
				  <div class="col-md-4 checkfont"><label for="ongoing">
				      <input type="checkbox" name="ongoing" id="ongoing" value="1">
				      On Going
				    </label>
			    	</div>
				</div>

				<div class="form-group row">
				  <label class="col-md-2 control-label" for="dateend">End Date</label>  
				  <div class="col-md-4">
				  <div id='dateend'></div>
				  </div>
				 </div>
				 <div class="form-group row mt-n3">
				 <div class="col-md-2">
				</div>
				  <div class="col-md-4 checkfont"><label for="endno">
				      <input type="checkbox" name="endno" id="endno" value="1">
				      Not applicable
				    </label>
			    	</div>
				</div>
		
				<div class="form-group row">
				  <label class="col-md-2 control-label" for="timeto">From time</label>  
				  <div class="col-md-2">
				  <div id='timefrom'></div>
				  </div>
				  <label class="col-md-1 control-label" for="timeto">To </label>
				    <div class="col-md-1">
				  <div id='timeto'></div>
				  </div>
				</div>
				<div class="form-group row">
					<div class="checkbox">
				    <label for="diff">
				      <input type="checkbox" name="diff" id="diff" value="1">
				      Different timing
				    </label>
					</div>
				</div>
				<div class="form-group timeweektable" style="display: none;">
				<table>
				<tr>
				<td width="70"><b>Mon</b></td>
				<td width="50">From</td>
				<td width="70"><div id="timefrommon" class="timeweek"></div></td>
				<td width="50" class="pl-4">To</td>
				<td width="70"><div id="timetomon" class="timeweek"></div></td>
				</tr>
				<tr>
				<td width="70"><b>Tue</b></td>
				<td width="50">From</td>
				<td width="70"><div id="timefromtue" class="timeweek"></div></td>
				<td width="50" class="pl-4">To</td>
				<td width="70"><div id="timetotue" class="timeweek"></div></td>
				</tr>
				<tr>
				<td width="70"><b>Wed</b></td>
				<td width="50">From</td>
				<td width="70"><div id="timefromwed" class="timeweek"></div></td>
				<td width="50" class="pl-4">To</td>
				<td width="70"><div id="timetowed" class="timeweek"></div></td>
				</tr>
				<tr>
				<td width="70"><b>Thu</b></td>
				<td width="50">From</td>
				<td width="70"><div id="timefromthu" class="timeweek"></div></td>
				<td width="50" class="pl-4">To</td>
				<td width="70"><div id="timetothu" class="timeweek"></div></td>
				</tr>
				<tr>
				<td width="70"><b>Fri</b></td>
				<td width="50">From</td>
				<td width="70"><div id="timefromfri" class="timeweek"></div></td>
				<td width="50" class="pl-4">To</td>
				<td width="70"><div id="timetofri" class="timeweek"></div></td>
				</tr>
				<tr>
				<td width="70"><b>Sat</b></td>
				<td width="50">From</td>
				<td width="70"><div id="timefromsat" class="timeweek"></div></td>
				<td width="50" class="pl-4">To</td>
				<td width="70"><div id="timetosat" class="timeweek"></div></td>
				</tr>
				<tr>
				<td width="70"><b>Sun</b></td>
				<td width="50">From</td>
				<td width="70"><div id="timefromsun" class="timeweek"></div></td>
				<td width="50" class="pl-4">To</td>
				<td width="70"><div id="timetosun" class="timeweek"></div></td>
				</tr>
				</table>
				</div>
				<div>Total Hours <div id="totalHours"></div></div>
			<div class="form-group row" style="float: right;">
				  <div class="col-md-6">
				    <button id="singlebutton" name="singlebutton" class="btn btn-primary nextBtn pull-right">Next</button>
				  </div>
			</div>


       	</div>
       </div>
        
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title">Qualifications</h3>
            </div>
            <div class="panel-body">
            	<div class="form-group row">
					  <label class="col-md-4 control-label" for="experience">Minimum Qualification required</label>
					  <div class="col-md-4">
					    <select id="qualification" name="qualification" class="form-control">
					      <option value="0">Not required</option>
					      <option value="1">Ordinary level</option>
					      <option value="2">College level</option>
					      <option value="3">High-School level</option>
					      <option value="4">University level</option>
					    </select>
					  </div>
				</div>

					<div class="form-group row">
					  <label class="col-md-4 control-label" for="experience">Experience</label>
					  <div class="col-md-4">
					    <select id="experience" name="experience" class="form-control">
					      <option value="0">Any</option>
					      <option value="1">1-3 Months</option>
					      <option value="2">3-6 Months</option>
					      <option value="3">6-12 Months</option>
					      <option value="4">12+ Months</option>
					    </select>
					  </div>
					  </div>
					  <div class="form-group row">
					  <label class="col-md-4 control-label" for="experience">Skills</label>
					  <div class="col-md-6">
					      <input type="text" id="skills" name="skills" value=""><div style="font-size: 10px;">You can select skills from the list and press enter. Also you can add new tags. These new tags will be monitored by the site administrator.</div>
					  </div>
					  </div>
					  <div class="form-group row" style="float: right;">
				  		<div class="col-md-6">
				    		<button id="singlebutton" name="singlebutton" class="btn btn-primary nextBtn pull-right">Next</button>
				  		</div>
			</div>
        </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                 <h3 class="panel-title">Other</h3>
            </div>
            <div class="panel-body">
                <div class="form-group row">
					  <label class="col-md-4 control-label" for="visa">Visa Type</label>
					  <div class="col-md-5">
					    <select id="visa" name="visa" class="form-control">
					      <option value="0">Any</option>
					      <option value="1">Student Work Visa</option>
					      <option value="2">General Work Visa</option>
					      <option value="3">Working Holiday Visa</option>
					      <option value="4">Other Visa Type</option>
					    </select>
					  </div>
				</div>

				<div class="form-group row">
					  <label class="col-md-4 control-label" for="license">Driving License</label>
					  <div class="col-md-4">
					    <select id="license" name="license" class="form-control">
					      <option value="0">Any</option>
					      <option value="1">Full</option>
					      <option value="2">Restricted</option>
					      <option value="3">International</option>
					    </select>
					  </div>
				</div>

				<div class="form-group row">
					  <label class="col-md-4 control-label" for="vehicle">Vehicle Requirement</label>
					  <div class="col-md-4">
					    <select id="vehicle" name="vehicle" class="form-control">
					      <option value="0">Not Required</option>
					      <option value="1">Own Vehicle</option>
					    </select>
					  </div>
				</div>

				<div class="form-group row">
					  <label class="col-md-4 control-label" for="ethnicity">Ethnicity Requirement</label>
					  <div class="col-md-6">
					    <select id="ethnicity" name="ethnicity" class="form-control">
					      <option value="0">Any</option>
					      <option value="1">European</option>
					      <option value="2">Māori</option>
					      <option value="3">Pasifika</option>
					      <option value="4">Asian</option>
					      <option value="5">MELAA (Middle Eastern/Latin American/African)</option>
					    </select>
					  </div>
				</div>

				<div class="form-group row">
					  <label class="col-md-4 control-label" for="age">Age Preference</label>  
					  <div class="col-md-2">
					  <input id="age1" name="age1" value="18" type="number" placeholder="" class="form-control input-md">
					  </div>
					  <div class="col-md-2">
					  <input id="age2" name="age2" value="55" type="number" placeholder="" class="form-control input-md">
					  </div>
				</div>

				<div class="form-group row">
					  <label class="col-md-4 control-label" for="gender">Gender Preference</label>
					  <div class="col-md-4">
					    <select id="gender" name="gender" class="form-control">
					      <option value="0">Any</option>
					      <option value="1">Male</option>
					      <option value="2">Female</option>
					    </select>
					  </div>
				</div>

				<div class="form-group row" style="float: right;">
				  <div class="col-md-6">
				    <button id="finish" name="finish" type="submit" class="btn btn-success pull-right">Finish</button>
				  </div>
				</div>
                
            </div>
        </div>
    </form>
</div>
	
	</div>

	</div> <!-- Row end -->

</div>
<?php
require_once("../php/footer.php");
?>