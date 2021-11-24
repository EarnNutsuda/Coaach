<?php
session_start();
require_once('../connect.php');
if(isset($_POST['submit'])){
    $national_id = $_POST['national_id'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $education = $_POST['education'];
    $occupation = $_POST['occupation'];
    $skill = $_POST['skill'];
    $describe = $_POST['describe'];
    $describe = str_replace("'","\'",$describe);
    $avaliable = $_POST['available'];
    $socialmedia = $_POST['socialmedia'];
    $bankaccname = $_POST['bankaccname'];
    $bankaccnumber = $_POST['bankaccnumber'];
    $unique_id = $_SESSION['unique_id'];

    $q = "INSERT INTO `Coach`(`unique_id`, `national_id`, `address1`, `address2`, `description`, `occupation`, `skills`,
                                     `available_time`, `education`, `social_media`,`Bank_account`, `Bankaccount_name`) 
                                     VALUES ('$unique_id','$national_id','$address1','$address2','$describe','$occupation','$skill','$avaliable',
                                     '$education','$socialmedia','$bankaccname','$bankaccnumber')";
    echo $q;

    $result = $mysqli->query($q);
    if (!$result) {
        echo "INSERT failed. Error: " . $mysqli->error;
        return false;
    }
    header("location: ../user/index.php");
}
?>