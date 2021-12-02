<?php require_once('../connect.php'); ?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <link rel="stylesheet" href="../styleSheet/rootstyle.css">
    <link rel="stylesheet" href="../styleSheet/regisHistory.css">
    <meta charset="UTF-8">
    <title>Furreal</title>
    <link rel="shortcut icon" href="../../media/logo.png">
</head>
<body>
<?php include_once('../header.php') ?>
<?php
$uid = $_SESSION['unique_id'];
?>
<div class="content">

    <h1 class="title">My Booking</h1>
    <div>

    </div>
    <div class="inner">
    <?php
    $q='select * from registration,course,users WHERE registration.unique_id='.$uid.
        ' AND course.course_id = registration.course_id AND users.unique_id = course.unique_id  ORDER BY timestamp DESC;';
    if($result=$mysqli->query($q)){
        if(mysqli_num_rows($result)==0){
            echo "You haven't book any course...";
        }
        while($row=$result->fetch_array()){
            echo '<div class="row" style="margin: 20px 0;"><div>';
            echo '<div class="bold rr">'.$row['course_name'].'</div>';
            echo '<div class="bold rr">By '.$row['fname'].' '.$row['lname'].'</div>';
            echo '<div class="bold rr">Registered hour : '.$row['study_hour'].'</div>';
            echo '<div class="bold rr">Total '.((int)$row['amount']+(int)$row['fee']).' baht</div>';
            echo '<div class="light  date">'.$row['timestamp'].'</div></div></div>';
        }
    }else{
        echo 'Query error: '.$mysqli->error;
    }
    ?>
    </div>
</div>
</body>
</html>

