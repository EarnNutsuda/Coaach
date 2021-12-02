<?php
session_start();
require_once('../connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../styleSheet/profile.css">
    <link rel="stylesheet" href="../styleSheet/courses.css">
    <title>Furreal</title>
    <link rel="shortcut icon" href="../../media/logo.png">
</head>
<body>
<?php include_once('../header.php') ?>
<?php include_once('../top_category.php') ?>
<?php
$q = "SELECT Coach.*, users.fname, users.lname FROM `Coach`,`users` WHERE Coach.unique_id = users.unique_id AND Coach.unique_id = {$_SESSION['unique_id']};";
$result = $mysqli->query($q);
if (!$result) {
    echo "Select failed. Error: " . $mysqli->error;
}
if ($result) {
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $q2 = "SELECT * FROM `users` WHERE unique_id = {$_SESSION['unique_id']};";
        $result2 = $mysqli->query($q2);
        $row2 = $result2->fetch_array();
        header('location:registration-history.php');
        ?>
        <?php
    }
}
while ($row = $result->fetch_array()) { ?>
        <img src="../../media/arrow.png" class="arrow">
    <div class="menu">
        <div class="box" >
            <li><a href="create-new-course">Add New Course</a></li>
        </div>

        <div class="box">
            <li><a href="balancecheck.php">Balance Check</a></li>
        </div>


        <div class="box">
            <li><a href="mystudents.php">Student History</a></li>
        </div>

        <div class="box">
            <li><a href="mycourses.php">My Courses</a></li>
        </div>

        <div class="box">
            <li><a href="registration-history.php"> My Booking </a></li>
        </div>
    </div>

    <div class="profile">

        <div class="name">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>

            <button class="link">
                <a href="edit-profile.php">Edit</a>
            </button>
        </div>

        <div class="information">
            <div class=textbox>
                <label>Education</label>
                <br>
                <?= $row['education'] ?>
                <br>
                <br>
            </div>
            <label>Occupation</label>
            <br>
            <?= $row['occupation'] ?>
            <br><br>
            <label>Skills</label>
            <br>
            <?= $row['skills'] ?>
            <br><br>
            <label>Available Time</label>
            <br>
            <?= $row['available_time'] ?>
            <br><br>
            <label>Social Media</label>
            <br>
            <?= $row['social_media'] ?>
            <br><br>
            <label>Description</label>
            <br>
            <?= $row['description'] ?>
            <br><br>

        </div>
    </div>
<?php } ?>


<div class="wave">
    <img src="../../media/wave.png">
</div>
</body>
</html>