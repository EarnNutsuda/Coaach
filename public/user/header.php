<?php
session_start();
$curPageName = $_SERVER["SCRIPT_NAME"];
$index = '../public/index.php';
require_once("../../connect.php");
$sql = mysqli_query($mysqli, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}
$sql2 = mysqli_query($mysqli, "SELECT * FROM coach WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql2) == 0) {
    $isCoach = false;
}else{
    $isCoach = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="https://kit.fontawesome.com/32597fd7ba.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styleSheet/header.css">
    <link rel="stylesheet" href="../../styleSheet/header.css">
    <title>Furreal</title>
    <link rel="shortcut icon" href="../../../media/logo.png">

</head>
<body>
<div class="header_menu">
    <div class="header_left">
        <a href="<?php
        echo '../../index.php';
        ?>" class="linkstyle am">
            <div class="logo_img am">
                <img src="../../../media/logo.png">
            </div>
            <span class="mg am">Furreal</span>
        </a>
    </div>

    <div class="header_right">
        <div class="menu_wrapper">
            <a href="<?php

            echo '../../index.php';

            ?>" class="linkstyle">Home</a>
            <span class="dot_separator">·</span>
            <a href="<?php echo '../../courses';
            ?>" class="linkstyle">Courses</a>

            <?php
            if (!$isCoach){
            ?>
                <span class="dot_separator">·</span>
            <a class="linkstyle" href="<?php
            echo '../../signup/coach-signup.php';
             ?>">Become Coach</a>
            <?php  } ?>
        </div>
        <div class="user_display">
            <img id="user" src="<?php

            echo '../../../uploads/user_image/' . $row['img'];

            ?>" alt="profile_img">
            <ul>
                <li><i class="fas fa-user"></i><a href="
                <?php echo '../user';
                    ?>">
                        Profile</a></li>
                <li><i class="fas fa-comments"></i><a href="<?php

                    echo '../../chat/users.php';
                    ?>">Chat</a></li>
                <li><i class="fas fa-sign-out-alt"></i><a href="<?php
                    echo '../../php/logout.php?logout_id=' . $_SESSION['unique_id'];
                    ?>">Logout</a></li>

            </ul>
        </div>
    </div>

</div>
<div class="title_section">
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#user').click(function () {
            $('ul').toggleClass('active')
        })
    })
</script>
</body>
</html>