<?php
require_once("../php/header.php");
require_once("../php/session.php");
if($_SESSION['type'] != '2'){
	echo "You are not allowed to access this feature";
	return false;
}
?>
<script>
$(document).ready(function () {

var parsedData;
var profiles;
$.ajax({url:"data.php", type:"POST", async:true, success:function(data){
          try {
            parsedData = JSON.parse(data);
            profiles = parsedData.profiles;

            }
          catch(err) {
            alertify.error(data);
            return false;
          }
    var num = 1;

    $.each(profiles, function(i,v){
    	var jobnames = v.jobnames;
    	jobnames = jobnames.replace(/,/g, ", ");
    	var locations = v.location;
    	locations = locations.replace(/,/g, ", ");
    	var html = '<td style="display: none;">'+v.id+'</td><td>'+num+'</td><td>'+moment(v.dateAdd).format('YYYY-MM-DD')+'</td><td id="'+v.id+'">'+jobnames+'</td><td>'+locations+'</td><td>'+v.jobTypeName+'</td><td><a href="../matchedprofiles?id='+v.id+'" target="_blank">Details</a></td><td><a href="../matchedprofiles?id='+v.id+'" target="_blank">Edit</a></td>';
    	$('<tr>'+html+'</tr>').insertAfter($("#profiles").find('tr:last'));
    	num++;
    });

       $.each(parsedData.match, function(i,v){
 
    	var getName = $("#"+v.profileid).html();

    	var newName = "<span class='badge badge-primary'>"+v.countdata+"</span> "+getName;
    	$("#"+v.profileid).html(newName);
    	 
    });
   // var html = 
}});

});
</script>
<title>Seeker Dashboard</title>
<link href="index.css" rel="stylesheet" />
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 pageHeader">Job Seeker Dashboard</div>
    </div>
</div>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 imgContainer align-items-center">
			<img alt="Job Seeker" src="images/<?php echo $_SESSION['id']?>.jpg" class="img-thumbnail pb-2" width="auto" height="150" />
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
				Posted Profiles
			</h5>
			<a href="../addprofile">Add a new Profile</a>
			<div class="table-responsive-sm">
				<table class="table table-hover table-fixed table-striped profiles" id="profiles">
				<thead>
					<tr>
						<th scope="col">
							#
						</th>
						<th scope="col">
							Date Posted
						</th>
						<th scope="col">
							Jobs wanted
						</th>
						<th scope="col">
							Locations preferred
						</th>
						<th scope="col">
							Job Type
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