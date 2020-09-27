<?php
require_once("../php/header.php");
require_once("../php/session.php");
if($_SESSION['type'] != '2'){
	echo "You are not allowed to access this feature";
	return false;
}
$imagePath = 'images/'.$_SESSION["id"].'.jpg';
if(!file_exists($imagePath)){
	$imagePath = '../css/images/nologo.png';
}
?>
<script>

function loadData(){
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

     $('#profiles > tbody  > tr').each(function(index) {
        if(index == 0 ){
        }else{
            $(this).closest('tr').remove();
        }
     });
    var num = 1;

    $.each(profiles, function(i,v){
    	var jobnames = v.jobnames;
    	jobnames = jobnames.replace(/,/g, ", ");
    	var locations = v.location;
    	locations = locations.replace(/,/g, ", ");
    	var html = '<td style="display: none;">'+v.id+'</td><td>'+num+'</td><td>'+moment(v.dateAdd).format('YYYY-MM-DD')+'</td><td id="'+v.id+'">'+jobnames+'</td><td>'+locations+'</td><td>'+v.jobTypeName+'</td><td><a href="../matchedprofiles?id='+v.id+'" target="">Details</a></td><td><a href="../editjobprofile?id='+v.id+'" target="" class="edits">Edit</a></td><td><a href="" id="'+v.id+'" class="downloadcv" target="">Download CV</a></td><td scope="col"><a class="delete" href="" id="'+v.id+'" target=""><i class="fas fa-minus-circle"></i></a></td>';
    	$('<tr id="p'+v.id+'">'+html+'</tr>').insertAfter($("#profiles").find('tr:last'));
    	num++;
    });

       $.each(parsedData.match, function(i,v){
 
    	var getName = $("#"+v.profileid).html();

    	var newName = "<span class='badge badge-primary'>"+v.countdata+"</span> "+getName;
    	$("#"+v.profileid).html(newName);
    	 
    });
   // var html = 
}});
}
$(document).ready(function () {

loadData();

$("#reload").click(function(){
	loadData();
});

$(document).on("click", "#profiles tbody>tr", function(e){
e.preventDefault();
e.stopPropagation();
var itemId = this.id;
var itemId = itemId.substring(1, itemId.length);
window.location.href = "../matchedprofiles?id="+itemId;
});

$(document).on("click", ".edits", function(e){
	e.stopPropagation();
});
$(document).on("click", ".delete", function(e){
	e.preventDefault();
	e.stopPropagation();
	var jobid = this.id;

	alertify.confirm('Confirm Delete', 'Are you sure, you want to delete this profile?', function(){ 

				$.ajax({url:'deleteprofile.php', type:'POST', async:false, data:{sendType: 'delete', jobID:jobid}, success:function(data){
			        try{
			        if(data=='ok'){
			            loadData();
			        }else{
			            alertify.alert("You do not have permission to delete this profile");
			            return false;
			        }
			        }catch(err){
			        console.log(err.message);
			        return false;
			        }
			    }});

					 }
                , function(){ }).set('labels', {ok:'Yes', cancel:'No'}, 'defaultFocus', 'cancel');

});


$(document).on("click", ".downloadcv", function(e){
	e.preventDefault();
	e.stopPropagation();
	var matchid = this.id;
	
	var created_date = moment().format('YYYY-MM-DD');
    var created_time = moment().format('hh:mm a');
    $.ajax({url:'downloadcv.php', type:'POST', async:false, data:{matchid:matchid, created_date:created_date, created_time:created_time}, success:function(data){
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
			<img alt="Job Seeker" src="<?php echo $imagePath; ?>" class="img-thumbnail pb-2" width="auto" height="150" />
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
		</div>
		<div class="col-md-8">
			<h5>
				Posted Profiles
			</h5>
			<a href="../addprofile">Add a new Profile</a>&nbsp;&nbsp;<button type="button" class="btn btn-outline-info btn-sm" id="reload" style="font-size: 9px; margin-bottom: 5px;">Reload Matching</button>
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