<?php session_start(); ?>
<?php require_once('../../connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="../../styleSheet/carouselStyle.css">
    <link rel="stylesheet" href="../../styleSheet/addCourse.css">
    <link rel="stylesheet" href="../../styleSheet/rootstyle.css" type='text/css'>

    <meta charset="UTF-8">
    <title>Furreal</title>
    <link rel="shortcut icon" href="../../../media/logo.png">
</head>
<body>

<?php include_once('../header.php');


?>
<!-- Progress -->
<div class="progress c">

    <div class="wrapper">
        <ul>
            <li class="bold active">Step1</li>
            <li>Tell us what your course is about</li>
        </ul>
    </div>
    <div class="wrapper">
        <ul>
            <li class="bold active">Step2</li>
            <li>Upload course image</li>
        </ul>
    </div>
</div>

<div class="content">
    <div class="c">
        <div class="content_left">
            <div class="title">
                <span>Your Course Summary</span>
            </div>


            <!--- image box BEGIN-->
            <div class="image_wrapper">
                <div class="container">
                    <!-- main images
                    write a for loop here -->
                    <div class="holder">
                        <?php
                        foreach ($_SESSION['image_video'] as $value) {
                            echo '<div class="slides">
                            <img src="../../../uploads/course_image/' . $value . '">
                        </div>';
                        }
                        ?>
                    </div>

                    <!--- Slide Button-->
                    <div class="slide_buttons">
                    </div>
                    <div class="directional_nav">
                        <div class="previous_btn prev" title="Previous" onclick="plusSlides(-1)">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
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
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
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
                        $count = 1;
                        foreach ($_SESSION['image_video'] as $value) {
                            echo '<div class="column">
                            <img class="slide-thumbnail" src="../../../uploads/course_image/' . $value . '" onclick="currentSlide(' . $count . ')">
                        </div>';
                            $count++;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="r2">
                <div class="title2">Course Name</div>
                <span class="p" id="course_name">
                <?php
                echo $_SESSION['course_name'];
                ?>
            </span>
            </div>
            <div class="r2">
                <div class="title2">Category</div>
                <span class="p" id="course_cat">
                <?php
                $q = 'select * from category WHERE category_id =' . $_SESSION['category_id'] . ';';
                if ($result = $mysqli->query($q)) {
                    while ($row = $result->fetch_array()) {
                        echo $row["category_name"]  ;
                    }
                } else {
                    echo 'Query error: ' . $mysqli->error;
                }
                ?>
            </span>
            </div>
            <div class="r2">
                <div class="title2">Short Description</div>
                <p id="short_description">
                    <?php
                    echo $_SESSION['course_short_description'];
                    ?>
                </p>
            </div>

            <div class="r2">
                <div class="title2">Long Description</div>
                <p id="long_description">
                    <?php
                    echo $_SESSION['course_description'];
                    ?>
                </p>
            </div>
        </div>


        <div class="content_right">
            <div class="r">
                <div class="title2" id="course_title2">Price</div>
            </div>
            <div class="r">
                <div class="r"><span class="bold">Regular Course : </span><span
                            class="price"><?php echo $_SESSION['regular_price']; ?> Baht/ 1 Hour</span></div>
                <div class="r"><span class="bold">Buffet Course : </span><span
                            class="price"><?php echo $_SESSION['buffet_price']; ?> Baht/ <?php echo $_SESSION['buffet_price']; ?> Hours</span>
                </div>
            </div>
        </div>
    </div>
    <form method="post">
        <div style="display: flex;justify-content: center;">
            <input type="submit" value="Confirm" class="btn2" name="submit">
        </div>
    </form>
</div>
<?php

if (isset($_POST["submit"])) {
    $describe  = $_SESSION['course_short_description'];
    $describe2 = $_SESSION['course_description'];
    $describe = str_replace("'","\'",$describe);
    $describe2 = str_replace("'","\'",$describe2);
    $_SESSION['uid'] = $_SESSION['unique_id'];
    $q = 'INSERT INTO course(image_video,course_name,category_id,course_short_description,course_description,regular_price,buffet_price,buffet_hour,unique_id) 
VALUES("' . implode(",", $_SESSION['image_video']) . '","' . $_SESSION['course_name'] . '","' . $_SESSION['category_id'] . '","' . $describe . '",
"' .  $describe2  . '","' . $_SESSION['regular_price'] . '","' . $_SESSION['buffet_price'] . '","' . $_SESSION['buffet_hour'] . '",' . $_SESSION['uid'] . ');';

    $result = $mysqli->query($q);
    if (!$result) {
        echo "INSERT failed. Error: " . $mysqli->error;

    } else {
        // remove all session variables
        foreach($_SESSION as $key => $val)
        {
            if ($key !== 'unique_id')
            {
                unset($_SESSION[$key]);
            }
        }
        echo "<script>window.location.href='../mycourses.php';</script>";
    }
}

?>
<script src="../../script/image_slider.js"></script>
</body>
</html>