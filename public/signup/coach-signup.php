<?php 
  session_start();
  include_once "../php/config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <link rel="stylesheet" href="../styleSheet/info_style.css">
    <title>Furreal</title>
    <link rel="shortcut icon" href="../../media/logo.png">
</head>
<body>
<?php include_once("../header.php") ?>
<div class="content">
    <section class="form info">
        <header>Coach Info</header>
        <form action="coachinfo.php" method="post">
            <div class="container">
                <div class="field input">
                    <Label>National ID</Label>
                    <input type="text" name="national_id">
                </div>
                <div class="field input">
                    <Label>Address Line 1</Label>
                    <input type="text" name="address1">
                </div>
                <div class="field input">
                    <Label>Address Line 2</Label>
                    <input type="text" name="address2">
                </div>

            </div>
                <div class="topic">
                    <label>Background (This will show on your profile)</label>
                </div>
            <div class="container">
                <div class="field input">
                    <Label>Education</Label>
                    <input type="text" name="education">
                </div>
                <div class="field input">
                    <Label>Occupation</Label>
                    <input type="text" name="occupation">
                </div>
                <div class="field input">
                    <Label>Skills</Label>
                    <input type="text" name="skill">
                </div>
            </div>
                <div class="topic">
                    <label>Tell us and your student about yourself (This will show on your profile)</label>
                </div>
            <div class="container">
                <div class="field input">
                    <Label>Describe Yourself</Label>
                    <textarea rows=2 type="text" name="describe" ></textarea>
                </div>
                <div class="field input">
                    <Label>Available Time Per Week</Label>
                    <textarea row=2 type="text" name="available" placeholder="eg. Mon:18:00-20:00..."></textarea>
                </div>
                <div class="field input">
                    <Label>Social Media</Label>
                    <input type="text" name="socialmedia">
                </div>
            </div>
                <div class="topic">
                    <label>Payment method</label>
                </div>
            <div class="container">
                <div class="field input">
                    <Label>Bank Account Name</Label>
                    <input type="text" name="bankaccname">
                </div>
                <div class="field input">
                    <Label>Bank Account Number</Label>
                    <input type="text" name="bankaccnumber">
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Submit">
                </div>

        </form>
    </section>
</div>
</body>
</html>