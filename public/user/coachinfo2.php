<?php
 session_start();
require_once('../connect.php');
	if(isset($_POST['edit'])) {

		$education= $_POST['education']; 
		$occupation =$_POST['occupation'];
		$skills = $_POST['skills'];
		$avaliable_time = $_POST['available_time'];
        $social_media = $_POST['social_media'];
        $description = $_POST['description'];
        $img = $_POST['img'];
	


		$q1="UPDATE `Coach` SET `description`='$description',`occupation`='$occupation',`skills`='$skills',`available_time`='$avaliable_time',`education`='$education',`social_media`='$social_media'
        where unique_id = {$_SESSION['unique_id']};";
        
	
		$result1= $mysqli->query($q1);
		if(!$result1){
			echo "INSERT failed. Error: ".$mysqli->error ;
			return false;
			}
		header("Location: index.php");
	}
?>