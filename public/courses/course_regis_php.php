<?php
if($hour==$course['buffet_hour']){
    $price =$course['buffet_price'];
}else{
    $price = (int)$hour * (int)$course['regular_price'];
}
$fees = $price*0.15;
$uid = $_SESSION['unique_id'];
$amt = $fees+$price;
$inertQ = "INSERT INTO registration(course_id,timestamp,study_hour,slip_photo,sub_total,fees,unique_id,amount)
VALUES({$selected_course_id},CURDATE(),{$hour},'{$fileNameNew}',{$price},{$fees},{$uid},{$amt});";
if ($insresult = $mysqli->query($inertQ)) {
    header('location:../user/registration-history.php');
} else {
    echo $inertQ;
    echo 'Query error: ' . $mysqli->error;
}
?>