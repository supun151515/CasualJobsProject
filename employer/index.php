<?php
require_once("../php/header.php");

require_once("../php/session.php");
if($_SESSION['type'] != '1'){
	echo "You are not allowed to access this feature";
	return false;
}
?>
<script>
$(document).ready(function () {

$("#reload").click(function(){
	var parsedData;
	$.ajax({url:"data.php", type:"POST", data:{Reload:'Reload'}, async:true, success:function(data){
          try {
            parsedData = JSON.parse(data);
            }
          catch(err) {
            alertify.error(data);
            return false;
          }
        $(".badge").remove();
        $.each(parsedData.match, function(i,v){
    	var getName = $("#"+v.jobid).html();
    	var newName = "<span class='badge badge-primary'>"+v.countdata+"</span> "+getName;
    	$("#"+v.jobid).html(newName); 
    	});

     }});
});
var parsedData;
$.ajax({url:"data.php", type:"POST", data:{LoadData:'LoadData'}, async:true, success:function(data){
          try {
            parsedData = JSON.parse(data);
            }
          catch(err) {
            alertify.error(data);
            return false;
          }
    var num = 1;
    $.each(parsedData.jobs, function(i,v){

    	var html = '<td style="display: none;" scope="col">'+v.id+'</td><td scope="col" width="10px">'+num+'</td><td scope="col">'+moment(v.dateAdd).format('YYYY-MM-DD')+'</td><td scope="col" id="'+v.id+'">'+v.jobTitle+'</td><td scope="col">'+v.locsub+'</td><td scope="col">'+v.jobTypeName+'</td><td scope="col"><a href="../matchedjobs?id='+v.id+'" target="_blank">Details</a></td><td scope="col"><a href="../matchedjbs?id='+v.id+'" target="_blank">Edit</a></td>';
    	$('<tr>'+html+'</tr>').insertAfter($("#jobs").find('tr:last'));
    	num++;
    });

    $.each(parsedData.match, function(i,v){
    	var getName = $("#"+v.jobid).html();
    	var newName = "<span class='badge badge-primary'>"+v.countdata+"</span> "+getName;
    	$("#"+v.jobid).html(newName);
    	 
    });
   // var html = 
}});

});
</script>

<title>Employer Dashboard</title>
<link href="index.css" rel="stylesheet" />
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 pageHeader">Employer Dashboard</div>
    </div>
</div>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 imgContainer align-items-center">
			<img alt="Employer" src="images/<?php echo $_SESSION['id']; ?>.jpg" class="img-thumbnail pb-2" width="auto" height="200" />
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
					<a href="">Edit Profile</a>
				</div>
				<div class="card-footer">
					<a href="../php/logout.php">Logout</a>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<h5>
				Posted Jobs
			</h5>
			<a href="../addjob">Add a new Job</a>&nbsp;&nbsp;<button type="button" class="btn btn-outline-info btn-sm" id="reload" style="font-size: 9px; margin-bottom: 5px;">Reload Matching</button>
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
							Job Title
						</th>
						<th scope="col">
							Location
						</th>
						<th scope="col">
							Type
						</th>
						<th scope="col">		
						</th>
						<th scope="col">
							
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