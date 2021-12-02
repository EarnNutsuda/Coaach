<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <link rel="stylesheet" href="styleSheet/home2.css">
    <link rel="stylesheet" href="styleSheet/rootstyle.css">
    <link rel="stylesheet" href="styleSheet/header.css">
    <meta charset="UTF-8">
    <title>Furreal</title>
    <link rel="shortcut icon" href="../media/logo.png">
</head>
<body>


<?php include_once('header.php') ?>

<div class="bg">
    <h1 class="banner">Find The Perfect COACH for You</h1>
    <div class="c">
        <div class="c1">
            <img src="../media/indeximage/fashion.jpg">
            <form class="full">
                <button class="btn2" ><a href="courses/index.php" class="linkstyle">Explore All</a></button>
            </form>
        </div>
        <div class="c2">
            <div class="r1">
                <div class="c1c1"><span class="topic">Fitness Lessons</span><img src="../media/indeximage/fitness.jpg"></div>
                <div class="c1c2"><img src="../media/indeximage/dance.png"></div>
                <div class="c1c3"><img src="../media/indeximage/craft.jpg"></div>
            </div>
            <div class="r2">
                <div class="c2c1"><img src="../media/indeximage/cooking.jpg"></div>
                <div class="c2c2"><span class="topic">Gaming</span><img src="../media/indeximage/gaming2.jpg"></div>
                <div class="c2c3"><img src="../media/indeximage/travel.jpg"></div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    window.addEventListener('load',function(){
        let img =document.getElementsByClassName("logo_img")[0]
        img.src ="../media/indeximage/logo.png"
    })
</script>
</html>