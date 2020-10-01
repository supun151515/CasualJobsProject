<?php
require_once("../php/sessionPanel.php");
require_once("../php/header.php");


?>
<script>
$(document).ready(function(){
// $("#userType").val(<?php echo $_SESSION['dropdown']; ?>);
$("#email").focus();
$("#login-form").submit(function(e){
    return false;
});
$("#email").keydown(function(e){
  
  if (e.which == 13){
    e.preventDefault();
    $("#password").focus();  
  }
});

$("#password").keydown(function(e){
  if (e.which == 13){
   // $('#login-form').submit();
  }
})

}); // doc ready end


function Login_Data(){
 var email = $("#email").val();
 var pass = $("#password").val();
 //var type = $("#userType").val();
 LockPage();
 $.post("check.php",{ email: email, password: pass},
      function(data) {
        UnlockPage();
        if(data == 'ok'){
          location.reload();
        }else{
          alertify.alert("Error","Invalid username or password");
          return false;
        }
      });
}
</script>

<title>Login</title>
<link href="index.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          
          <form id ="login-form" class="form-inline" target="temp" onsubmit="Login_Data();">
<fieldset>

<!-- Form Name -->
<legend>Login</legend>

<!-- Select Basic -->
<div class="form-group" style="display: none;">
  <label class="col-md-6 control-label" for="userType">I am a</label>
  <div class="col-md-4">
    <select id="userType" name="userType" class="form-control">
      <option value="1">Employer</option>
      <option value="2">Job Seeker</option>
    </select>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="email">Email/Username</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>
<!-- Password input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<!-- Buttons -->
<div class="form-group pt-3">
  <label class="col-md-6 control-label" for="singlebutton"></label>
  <div class="col-md-6">
    <input type="submit" id="submit" value="Login" class="btn btn-primary" />
    <input type="reset" id="singlebutton" name="singlebutton" value="Clear" class="btn btn-primary" />
  </div>
</div>
</fieldset>
</form>


        </div>
        <div class="col-sm-3"></div>
    </div>
</div>






