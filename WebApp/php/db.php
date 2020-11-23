<?php
//declare(strict_types=1);
//error_reporting(-1); // maximum errors
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_errors', '1'); // show on screen
ini_set('max_execution_time', 30000);


if (session_status() == PHP_SESSION_NONE) {
   
   session_set_cookie_params(28800);
   session_start();
   //ini_set('session.gc_maxlifetime', 288000);
}
//ini_set('max_execution_time', 12000); 
date_default_timezone_set('NZ');


$DateNow = date("Y-m-d H:i:s");
$dbname = 'casualjobs';
$user = 'root';
$password = 'supun123';

/*
//Remote Data
$dbname = 'sinergyl_casualjobs';
$user = 'sinergyl_casualjobs';
$password = 'password';

*/
try{
$con = new PDO("mysql:host=localhost; dbname=".$dbname."; charset=utf8", $user, $password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}catch(PDOException $e){
echo $e->getMessage();
die();
}

?>