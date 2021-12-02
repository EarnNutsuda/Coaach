<?php require_once('../connect.php'); ?>
<?php session_start() ?>
<?php $selected_course_id = $_GET['course_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <link rel="stylesheet" href="../styleSheet/coursePage.css">
    <link rel="stylesheet" href="../styleSheet/carousel.css">
    <meta charset="UTF-8">
    <title>Furreal</title>
    <link rel="shortcut icon" href="../../media/logo.png">
</head>
<body>
<?php include_once('../header.php') ?>
<!--- top category menu-->

<div class="top_category_menu">
    <ul>
        <?php
        $q = 'select * from category;';
        if ($result = $mysqli->query($q)) {
            while ($row = $result->fetch_array()) {
                echo '<li><a href="courses.php?category=' . $row["category_name"] . '">' . $row["category_name"] . '</a></li>';
            }
        } else {
            echo 'Query error: ' . $mysqli->error;
        }
        ?>
    </ul>
</div>
<?php

$q = 'Select * from course where course_id=' . $selected_course_id . ';';
if ($result = $mysqli->query($q)) {
    $row = $result->fetch_array();
} else {
    echo 'Query error: ' . $mysqli->error;
}

$q2 = 'Select * from coach where coach.unique_id=' . $row["unique_id"] . ';';
if ($result2 = $mysqli->query($q2)) {
    $coach = $result2->fetch_array();
} else {
    echo 'Query error: ' . $mysqli->error;
}

$q4 = 'Select * from users where users.unique_id=' . $row["unique_id"] . ';';
if ($result4 = $mysqli->query($q4)) {
    $user = $result4->fetch_array();
} else {
    echo 'Query error: ' . $mysqli->error;
}


$q3 = 'Select COUNT(*) AS count from course where course.unique_id=' . $row["unique_id"] . ';';
if ($result3 = $mysqli->query($q3)) {
    $totalcourse = $result3->fetch_array();
} else {
    echo 'Query error: ' . $mysqli->error;
}



if (isset($_POST['submit'])) {
    $_SESSION['selected_course_id'] = $_POST['course_id'];
    $_SESSION['totalHour'] = $_POST['hour'];
    $_SESSION['total_price'] = $_POST['total_price'];
    header('location:course-registration.php');
    exit();
}

?>
<div class="content">
    <div class="content_left course_explanation">
        <div id="course_title">
            <span><?php echo $row['course_name'] ?></span>
        </div>


        <!--- image box BEGIN-->
        <div class="image_wrapper">
            <div class="container">
                <!-- main images
                write a for loop here -->
                <div class="holder">
                    <?php
                    $img = explode(",", $row['image_video']);
                    foreach ($img as $value) {
                        echo '<div class="slides">';
                        echo '<img src="../../uploads/course_image/' . $value . '">';
                        echo '</div>';
                    }
                    ?>
                </div>

                <!--- Slide Button-->
                <div class="slide_buttons">
                </div>

                <div class="directional_nav">
                    <div class="previous_btn prev" title="Previous" onclick="plusSlides(-1)">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             viewBox="-11 -11.5 65 66">
                            <circle cx="22" cy="22" r="32" fill="rgba(255,255,255,0.8)"/>
                            <g>
                                <g>
                                    <path fill="#474544"
                                          d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z"/>
                                </g>
                            </g>

                        </svg>
                    </div>
                    <div class="next_btn next" title="Next" onclick="plusSlides(1)">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             viewBox="-11 -11.5 65 66">
                            <circle cx="22" cy="22" r="32" fill="rgba(255,255,255,0.8)"/>
                            <g>
                                <g>
                                    <path fill="#474544"
                                          d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>

                <!-- thumnails in a row -->
                <!-- main images
                write a for loop here -->
                <div class="row">
                    <?php
                    $img = explode(",", $row['image_video']);
                    $count = 1;
                    foreach ($img as $value) {
                        echo '<div class="column">';
                        echo '<img class="slide-thumbnail" src="../../uploads/course_image/' . $value . '" onclick="currentSlide(' . $count . ')">';
                        echo '</div>';
                        $count++;
                    }
                    ?>
                </div>
            </div>
        </div>

        <div style="font-size:20px;font-weight:500;margin:24px 0;">Description</div>
        <div id="long_description">
            <p>
                <?php echo $row['course_description'] ?>
            </p>
        </div>
        <div class="avail_time">
            Available Time: <span id="time"><?php echo $coach['available_time'] ?></span>
        </div>

        <div class="coach_wrapper">
            <div class="left">
                <div class="coach_header">
                    <div class="user_img">
                        <img src="../../uploads/user_image/<?php echo $user['img']?>">
                    </div>
                    <div class="course_info">
                        <div id="user_name"><?php echo $user['fname']." ".$user['lname'] ?></div>
                        <div id="coach_title"><?php echo $coach['occupation'] ?></div>
                    </div>
                </div>
                <div id="coach_msg">
                    <p><?php echo $coach['description'] ?></p>
                </div>
            </div>
            <div class="right">
                <div class="icon_column">
                    <div class="icon">
                        <span class="iconify" data-icon="bi:book"></span>
                    </div>
                    <div>
                        <span>Teaches<br></span>
                        <span><?php echo $totalcourse['count'] ?> Courses</span>
                    </div>
                </div>
                <div class="icon_column">
                    <div class="icon">
                        <span class="iconify" data-icon="ph:student"></span>
                    </div>
                    <div>
                        <span>Had<br></span>
                        <span><?php echo 0; ?> Enrollment</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="content_right">
        <div class="book_wrapper">
            <div class="r">
                <div class="t" id="course_title2"><?php echo $row['course_name'] ?></div>
            </div>
            <div class="r">
                <div><span class="t tt">Regular Course : </span><span class="price"><?php echo $row['regular_price'] ?> Baht/ 1 Hour</span>
                </div>
                <div><span class="t tt">Buffet Course : </span><span class="price"><?php echo $row['buffet_price'] ?> Baht/ <?php echo $row['buffet_hour'] ?> Hours</span>
                </div>
            </div>
            <form method="post" enctype='multipart/form-data'
                  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="r f">
                    <span class="t"> Book Lesson</span>
                    <div class="c">
                        <div>
                            <label for="hour">Hour</label>
                            <select name="hour" id="hour" >
                                <?php
                                $max = $row['buffet_hour'];
                                $max = (int)$max;

                                for ($x = 1; $x <= $max; $x++) {
                                    echo '<option value="' . $x . '">' . $x . '</option>';
                                }
                                ?>
                            </select>

                        </div>
                        <div>
                            <span id="cal_price">Total <?php
                                        echo $row['regular_price'];
                                   ?>
                                 Baht</span>
                        </div>
                    </div>
                </div>
                <div class="r">
                    <input type="txt" id="totalPrice" name="total_price" value="" hidden>
                    <input type="txt" name="course_id" value="<?php echo $selected_course_id ?>" hidden>
                    <input class="btn b" type="submit" name="submit" value="Book Lesson">
                    <button class="btn msg" value="SendMessage"><a href="../chat/chat.php?user_id=
                    <?php $coach['unique_id'] ?>" style="color:#B0A698">
                            Send Message</a></button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
echo '<script type="text/javascript">
    var hour= document.getElementById("hour");
    var total = document.getElementById("cal_price")
    var total2 = document.getElementById("totalPrice")
    var temptotal;
    hour.addEventListener("change",function(){
        var temp = parseInt(hour.value)
        if (temp <'.$max.'){
            temptotal = temp*parseInt('.$row['regular_price'].');
        }
        else{
            temptotal ='.$row['buffet_price'].'
    }
        total.innerText = "Total "+temptotal+" Baht" 
        total2.value = temptotal
    })

</script>';
?>


</script>

<script src="../script/image_slider.js"></script>
</body>
</html>
