<?php

if (session_status() == PHP_SESSION_NONE) {
   ini_set('session.gc_maxlifetime', 288000);
   session_set_cookie_params(28800);
   session_start();
}
session_destroy();
//header('Location: ../home');
echo "<script type='text/javascript'> document.location = '../home'; </script>";
?>