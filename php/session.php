<?php

if (session_status() == PHP_SESSION_NONE) {
   ini_set('session.gc_maxlifetime', 28800);
   session_set_cookie_params(28800);
   session_start();
}

if(!isset($_SESSION['email'])) {
	//header('Location: ../login');
	echo "<script type='text/javascript'> document.location = '../login'; </script>";
}
?>