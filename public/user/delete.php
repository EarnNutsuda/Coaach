<?php session_start(); ?>
<?php require_once('../connect.php'); ?>

<?php
$course_id = $_GET['course_id'];
$user = $_SESSION['unique_id'];
$display="";
$delQ= 'DELETE FROM COURSE WHERE course_id='.$course_id.' AND unique_id='.$user.';';
$delRes = $mysqli->query($delQ);
if (!$delRes) {
    $display= "Your course is already removed. <Br> Redirecting back to your course page...";
}
else{
    $display= "You don't have the permission. <Br> Redirecting back to your course page...";
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">

        <link rel="stylesheet" href="../styleSheet/rootstyle.css" type='text/css'>
        <link rel="stylesheet" href="../styleSheet/courses.css" type='text/css'>
        <meta charset="UTF-8">
        <title>Furreal</title>
        <link rel="shortcut icon" href="../../../media/logo.png">
    </head>
    <body>
<?php include_once('../header.php'); ?>
    <div class="content">
        <div class="title">
            <?php echo $display;?>
        </div>
    </div>
    <?php
    sleep(3);
    header('location:mycourses.php')
    ?>
    </body>
</html>
