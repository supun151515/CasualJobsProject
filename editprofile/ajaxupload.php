<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
error_reporting(0);
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){

$filename = '../css/images/temp/';
if (!file_exists($filename)) {
	mkdir($filename, 0777);
}

$path_temp ='../css/images/temp/'; // to show pic from index.php
$filename = $_FILES['photoimg']['tmp_name']; //get the temporary uploaded image name
$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg","GIF","JPG","PNG"); //add the formats you want to upload
	
		$name = $_FILES['photoimg']['name']; //get the name of the image
		$size = $_FILES['photoimg']['size']; //get the size of the image
		if(strlen($name)) //check if the file is selected or cancelled after pressing the browse button. 
		{
			list($txt, $ext) = explode(".", $name); //extract the name and extension of the image
			if(in_array($ext,$valid_formats)) //if the file is valid go on.
			{
			if($size < 2098888) // check if the file size is more than 2 mb
			{
				

			$actual_image_name =  str_replace(" ", "_", $txt)."_".time().".".$ext; //actual image name going to store in your folder
			
			$tmp = $_FILES['photoimg']['tmp_name']; 

$files = glob($path_temp.'*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

			if(move_uploaded_file($tmp, $path_temp.$actual_image_name)) //check the path if it is fine
				{


					move_uploaded_file($tmp, $path_temp.$actual_image_name); //move the file to the folder
					//display the image after successfully upload
					echo "<img src='$path_temp/".$actual_image_name."' id='mypic' style='height:220px; width:auto;'> <input type='hidden' name='actual_image_name' id='actual_image_name' value='$actual_image_name' />";
				//echo "<script>$('img').attr('src','../jquery/temp/". $actual_image_name . "');</script>";
				}

			else
				{
				echo "<img src='../css/images/nologo.png' id='mypic' style='height:70px; width:200px;'>failed to retrive picture. try other one<script>var controlInput = $('#photoimg'); controlInput.replaceWith(controlInput = controlInput.val('').clone(true)); </script>";
				}
			}
			else
			{
				echo "<img src='../css/images/nologo.png' id='mypic' style='height:70px; width:200px;'>Image file size max 2MB. try choosing picture less than 2MB <script>var controlInput = $('#photoimg'); controlInput.replaceWith(controlInput = controlInput.val('').clone(true)); </script>";					
			}
			}
			else
			{
				echo "<img src='../css/images/nologo.png' id='mypic' style='height:70px; width:200px;'>Invalid file format or file name contains symbols.. try choosing picture file or change the file name.<script>var controlInput = $('#photoimg'); controlInput.replaceWith(controlInput = controlInput.val('').clone(true)); </script>";	
			}
		}
		else
		{		
			echo "Please select image..! <script>var controlInput = $('#photoimg'); controlInput.replaceWith(controlInput = controlInput.val('').clone(true)); </script>";
		}		
	exit;
	}
?>
