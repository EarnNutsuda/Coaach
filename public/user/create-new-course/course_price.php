<?php session_start();?>
<?php require_once('../../connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="../../styleSheet/addCourse.css">
    <link rel="stylesheet" href="../../styleSheet/rootstyle.css" type='text/css'>

    <meta charset="UTF-8">
    <title>Furreal</title>
    <link rel="shortcut icon" href="../../../media/logo.png">
</head>
<body>
<?php include_once('../header.php') ?>

<!-- Progress -->
<div class="progress c ">
    <div class="wrapper">
        <ul>

                <li class="bold active" >Step1</li>
                <li>Tell us what your course is about</li>

        </ul>
    </div>

    <div class="wrapper">
        <ul>

                <li class="bold">Step 2</li>
                <li>Tell us what your course is about</li>

        </ul>
    </div>
</div>
<?php
$err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $name => $value) {
        if (empty($_POST[$name])) {
            $err = "Please fill in every field.";
        } else {
            $_SESSION[$name] = $_POST[$name];
        }
    }
    if ($err == "") {
        header('location:course_summary.php');
        exit;
    }
}

?>
<div class="content">
    <div class="inner">
        <form action="" method="post" id="add_course" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div style="margin-bottom: 80px;">
                <div class="title" style="margin-bottom: 8px">How much is your course ?</div>
                <div class="r">
                    <div class="r">Price per hour</div>
                    <input placeholder="e.g. 800" type="text" id="perhour" style="width: 50%" name="regular_price">
                    <span>baht</span>
                </div>
            </div>
            <div style="margin-bottom: 80px;">
                <div class="title" style="margin-bottom: 8px">Price for the full course</div>
                <div class="r c">
                    <div class="group c">
                        <input type="text" placeholder="e.g. 7800" name="buffet_price">
                        <span>Baht</span>
                    </div>
                    <div class="group c">
                        <span>/</span>
                        <input type="text" placeholder="e.g. 10" name="buffet_hour">
                        <span>hours</span>
                    </div>
                </div>
            </div>
            <div class="err"><?php echo $err; ?></div>
            <div style="display: flex;justify-content: flex-end;">

                <input type="submit" value="Next" class="btn" style="padding: 8px 96px ">
            </div>
        </form>

    </div>
</div>

</body>
</html>