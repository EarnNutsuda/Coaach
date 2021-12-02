<?php session_start(); ?>
<?php require_once('../connect.php'); ?>

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
    <?php include_once('../header.php');
    ?>
    <div class="content">
        <div class="title">My Courses</div>
        <div class="column">
            <!-- wrapper-->
            <?php
            $q = 'select * from course WHERE course.unique_id=' . $_SESSION['unique_id'] . ' ORDER BY course_id DESC;';

            if ($result = $mysqli->query($q)) {
                $count = 0;
                while ($row = $result->fetch_array()) {
                    if ($count % 3 == 0) {
                        echo '<div class="row">';
                    }
                    $img = explode(",", $row['image_video'])[0];
                    echo '<div class="course_wrapper">';
                    echo '<img class="course_img" src="../../uploads/course_image/'.$img.'">';
                    echo '<div class="course_explanation">
                    <div class="course_title">
                        <span>' . $row["course_name"] . '</span>
                    </div>
                    <div class="course_description">
                    <span>'
                        . $row['course_short_description'] . '
                    </span>
                    </div>
                </div>
              
                    <div class="submit_button2">
                    <a href="../courses/course.php?course_id=' . $row["course_id"] . '"  class="linkstyle">
                        <input type="submit" value="See Course" class="btn3">
                        </a>
                        <a href="delete.php?course_id=' . $row["course_id"] . '"  class="linkstyle">
                        <input type="submit" value="Delete This Course" class="btn4">
                        </a>
                    </div>
          
            </div>';
                    if ($count % 3 == 2 || $count == ($row . length - 1)) {
                        echo '</div>';
                    }
                    $count++;
                }


            } else {
                echo 'Query error: ' . $mysqli->error;
            }
            if(mysqli_num_rows($result)==0){
                echo "You don't have any course...";
            }
            ?>


        </div>
    </div>


    </body>
</html>



