<?php
@ob_start();

if (session_status() == PHP_SESSION_NONE) {
   ini_set('session.gc_maxlifetime', 28800);
   session_set_cookie_params(28800);
   session_start();
}


if(isset($_SESSION['email'])){
	if($_SESSION['type'] == 1){
		header('Location: ../employer');
		//echo "<script type='text/javascript'> document.location = '../employer'; </script>";
	}else {
		header('Location: ../seeker');
		//echo "<script type='text/javascript'> document.location = '../seeker'; </script>";
	}
}
?>