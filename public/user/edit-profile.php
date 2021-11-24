<?php
session_start();
require_once('../connect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../styleSheet/profile.css">
</head>

<body>
<?php include_once('../header.php') ?>
<?php include_once('../top_category.php') ?>

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
        <li><a href="registration-history.php">My Booking </a></li>
    </div>


</div>


<form action="coachinfo2.php" method="post">
    <?php

    $q = "SELECT Coach.*, users.fname, users.lname FROM `Coach`,`users` WHERE Coach.unique_id = users.unique_id AND Coach.unique_id = {$_SESSION['unique_id']};";

    $result = $mysqli->query($q);
    if (!$result) {
        echo "Select failed. Error: " . $mysqli->error;
        return false;
    }
    while ($row = $result->fetch_array()) { ?>

    <div class="profile">

        <div class="name">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
        </div>

        <div class="information">
            <div class=textbox>
                <label>Education</label>
                <br>
                <input type="text" name="education" value="<?php echo $row['education']?>">
                <br><br>
            </div>
            <label>Occupation</label>
            <br>
            <input type="text" name="occupation" value="<?php echo $row['occupation']?>">
            <br><br>
            <label>Skills</label>
            <br>
            <input type="text" name="skills" value="<?php echo $row['skills']?>">
            <br><br>
            <label>Avaliable Time</label>
            <br>
            <textarea type="text" name="available_time"><?php echo $row['available_time']?>
            </textarea>
            <br><br>
            <label>Social Media</label>
            <br>
            <input type="text" name="social_media" value="<?php echo $row['social_media']?>">
            <br><br>
            <label>Description</label>
            <br>
            <textarea rows=4 type="text" name="description"><?php echo $row['description']?>
            </textarea>
            <br><br>
            <label> Insert profile picture </label>
            <br>
            <input type="file" name="img">
            <?php } ?>
        </div>
    </div>
    <div class="submit">
        <input type="submit" value="submit" name="edit">
    </div>
</form>

<div class="wave">
    <img src="../../media/wave.png">
</div>


</body>