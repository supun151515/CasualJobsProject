<?php
include ('../php/session.php');
require_once("../php/header.php");

?>
 
<script src="../js/image_upload.js"></script>
<script>
var addyKey = '493a57297bdd4b40b7decdf09d15b85c';
function initAddy() {
  var addyComplete = new AddyComplete(document.getElementById('address_line_1'));
  addyComplete.options.excludePostBox = false;
  addyComplete.fields = {
    address1: document.getElementById('address_line_1'),
    address2: document.getElementById('address_line_2'),
    suburb: document.getElementById('suburb'),
    city: document.getElementById('city'),
    postcode: document.getElementById('postcode'),
  }
}

(function (d, w) {
  // Add the address autocomplete JavaScript
  var s = d.createElement('script');
  var addyUrl = 'https://www.addy.co.nz/scripts/addy.js';
  s.src = addyUrl + '?loadcss=true&enableLocation=true&key=' + addyKey;
  s.type = 'text/javascript';
  s.async = 1;
  s.onload=initAddy;
  d.body.appendChild(s);
})(document, window);

$(document).ready(function () {

$("#deleteprofile").click(function(){
  alertify.confirm('Confirm Delete', 'Are you sure, you want to delete you profile?<br>This will delete all your posts and matchings.', function(){ 
LockPage();
        $.ajax({url:'deleteprofile.php', type:'POST', async:false, data:{sendType: 'delete'}, success:function(data){
          UnlockPage();
              try{
              if(data=='ok'){
                  location.reload();
              }else{
                  alertify.alert("You do not have permission to delete your profile");
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



$("#imagechanged").val('0');
  $("#removeimage").click(function(){
     $("#mypic").attr("src","../css/images/nologo.png");
     $("#imagechanged").val('1');
  });
var parsedData;
LockPage();
 $.ajax({url:'loadData.php', type:'POST', async:false, success:function(data){
  UnlockPage();
        try{
         parsedData = JSON.parse(data);
        }catch(err){
        console.log(err.message);
        return false;
        }

  $("#userType").val(parsedData.user_type);
  $("#email").val(parsedData.email);
  $("#empName").val(parsedData.userName);
  $("#address_line_1").val(parsedData.address1);
  $("#address_line_2").val(parsedData.address2);
  $("#suburb").val(parsedData.suburb);
  $("#city").val(parsedData.city);
  $("#postcode").val(parsedData.postcode);
  $("#emp_tel").val(parsedData.telephone);
  var image = parsedData.image;
  if(image == '1'){
    //$("#actual_image_name").val(parsedData.id);
    if(parsedData.user_type == '1'){
      $("#mypic").attr("src","../employer/images/"+parsedData.id+".jpg");
    }else{
      $("#mypic").attr("src","../seeker/images/"+parsedData.id+".jpg");
    }
  }else{
    $("#mypic").attr("src","../css/images/nologo.png");
  }
}});


$("#photoimg").change(function(e){
  $("#imagechanged").val('1');

  $("#imagePath").val(this.value);
  e.preventDefault();
  e.stopPropagation();
  $("#imageform").ajaxForm({
    target: '#preview'
    }).submit()
});
$('#userType').on('change', function() {
  if(this.value == '2'){
  	$("#lbl_empName").text("Job Seeker Name");
    $("#lbl_empAddress").text("Job Seeker Address");
    $("#lbl_logo").text("Profile Image");
  }else{
  	$("#lbl_empName").text("Employer Name");
    $("#lbl_empAddress").text("Employer Address");
    $("#lbl_logo").text("Company Logo");
  }
});

$("#register").click(function(){
  var userType = $("#userType option:selected").val();
  var email = $("#email").val();
  var password = $("#password").val();
  var passwordConfirm = $("#passwordConfirm").val();
  var empName = $("#empName").val();
  var address_line_1 = $("#address_line_1").val();
  var address_line_2 = $("#address_line_2").val();
  var suburb = $("#suburb").val();
  var city = $("#city").val();
  var postcode = $("#postcode").val();
  var emp_tel = $("#emp_tel").val();
  var imagePath = $("#imagePath").val();
 
 if(password != '' && passwordConfirm != ''){
    if(password != passwordConfirm){
    alertify.error("Invalid password confirmation");
    $("#password").focus();
    return false;
  }
 }
 
  if(email == '' || empName =='' || address_line_1 == '' || emp_tel ==''){
    alertify.error("Please complete the form");
    return false;
  }
   var data = $("#imageform").serialize();
   LockPage();
   $.post("data.php", data, function(data){
    UnlockPage();
       if(data == 'ok'){
        alertify.alert("Success", "Your profile has been updated successfully", function(){
          //window.location.replace("../login");
        });
        
        return false;
       } else {
        alertify.alert("Error", "Unable to register. Please contact your system administrator");
       }
    });

});


}); //end doc

</script>
<title>Edit Profile</title>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 pageHeader">Edit Profile</div>
    </div>
</div>
<form id="imageform" method="post" enctype="multipart/form-data" action="ajaxupload.php">
<input id="myid" type="hidden" name="myid" />
<div class="container-fluid mt-5">
<div class="row">
   <div class="col-sm-3"></div>
   <div class="col-sm-6">
   <div class="form-group row">
  <label class="col-md-4 control-label" for="userType">I am</label>
  <div class="col-md-5">
    <select id="userType" name="userType" class="form-control">
      <option value="1">an Employer</option>
      <option value="2">a Job Seeker</option>
    </select>
  </div>
  </div>

<div class="form-group row">
  <label class="col-md-4 control-label" for="email">Email/User Name</label>  
  <div class="col-md-5">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

  <div class="form-group row">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
  </div>
  </div>


<div class="form-group row">
  <label class="col-md-4 control-label" for="passwordConfirm">Confirm Password</label>
  <div class="col-md-5">
    <input id="passwordConfirm" name="passwordConfirm" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<div id="emp_data">
<div class="form-group row">
  <label class="col-md-4 control-label" id="lbl_empName" for="empName">Employer Name</label>  
  <div class="col-md-5">
  <input id="empName" name="empName" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group row">
  <label class="col-md-4 control-label" id="lbl_empAddress" for="empAddress">Employer Address</label>  
  <div class="col-md-5">
  <input id="address_line_1" name="address_line_1" type="text" placeholder="Start typing an address.." class="form-control input-md addy-line1" required="">
  </div>
</div>

<div class="form-group row">
  <label class="col-md-4 control-label" for="empAddress">Address Line 2</label>  
  <div class="col-md-5">
  <input id="address_line_2" name="address_line_2" type="text" class="form-control input-md addy-line2">
  </div>
</div>
<div class="form-group row">
  <label class="col-md-4 control-label" for="empAddress">Suburb</label>  
  <div class="col-md-5">
  <input id="suburb" name="suburb" type="text" class="form-control input-md addy-suburb">
  </div>
</div>
<div class="form-group row">
  <label class="col-md-4 control-label" for="empAddress">City</label>  
  <div class="col-md-3">
  <input id="city" name="city" type="text" class="form-control input-md addy-city"> 
  </div>
  <div class="col-md-2">
      <input id="postcode" name="postcode" type="text" placeholder="Postcode" class="form-control input-xs addy-postcode">
  </div>
  
</div>
 


<div class="form-group row">
  <label class="col-md-4 control-label" for="emp_tel">Telephone</label>  
  <div class="col-md-4">
  <input id="emp_tel" name="emp_tel" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>


<div class="form-group row">
  <label class="col-md-4 control-label" for="companyLogo" id="lbl_logo">Company Logo</label>
  <div class="col-md-5">
    <input name="photoimg" type="file" id="photoimg" />
    <input type="hidden" id="actual_image_name" name="actual_image_name">
    <input type="hidden" id="actual_image_name_old" name="actual_image_name_old">  
  </div>
</div>
<div class="" id="preview" style="font-size:9px;"><img id="mypic" draggable="false" src="../css/images/nologo.png" style='height:220px; width:auto;' />


</div> 
<br>
<button type="button" id="removeimage" class="btn btn-secondary btn-sm" style="font-size:8px;">Remove Image</button>
<input type="hidden" id="imagechanged" name="imagechanged">
<div class="form-group row">
  <label class="col-md-4 control-label" for=" "></label>
  <div class="col-md-8">
   <input type="button" id="register" value="Update Profile" class="btn btn-primary btn-sm">
    <input type="reset" value="Clear" class="btn btn-warning btn-sm">
    <input type="button" id="deleteprofile" value="Delete Profile" class="btn btn-danger btn-sm">
  </div>
</div>
</div> <!-- col finish -->
   <div class="col-sm-3"></div>

</div> <!-- row end -->
</div><!-- container end -->

</form>
<?php
 require_once("../php/footer.php");
?>