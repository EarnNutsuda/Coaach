<?php require_once('../connect.php'); ?>
<?php $selected_category = $_GET['category']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

    <link rel="stylesheet" href="../styleSheet/courses.css">
    <link rel="stylesheet" href="../styleSheet/rootstyle.css">
    <meta charset="UTF-8">
    <title>Coaach</title>
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
                echo '<li><a href="courses.php?category=' . $row["category_id"] . '">' . $row["category_name"] . '</a></li>';
            }
        } else {
            echo 'Query error: ' . $mysqli->error;
        }
        ?>
    </ul>
</div>

<div class="title_wrapper">
    <div class="title_section">
        <?php
        $q = 'select * from category WHERE category_id=' . $selected_category . ';';
        if ($result = $mysqli->query($q)) {
            while ($row = $result->fetch_array()) {
                echo '<h1 class="title">' . $row["category_name"] . '</h1>';
                echo '<h2 class="description">' . $row["category_description"] . '</h2>';
            }
        } else {
            echo 'Query error: ' . $mysqli->error;
        }
        ?>
    </div>
</div>

<div class="content">
    <div class="column">

        <!-- wrapper-->
        <?php
        $q = 'select * from course WHERE category_id="' . $selected_category . '" ORDER BY RAND ( )  ;';

        if ($result = $mysqli->query($q)) {
            $count = 0;
            while ($row = $result->fetch_array()) {
                if ($count % 3 == 0) {
                    echo '<div class="row">';
                }

                $q2 = 'select * from Coach,Users WHERE coach.unique_id = users.unique_id AND users.unique_id="' . $row['unique_id'] . '";';
                echo '<div class="course_wrapper">';
                if ($result2 = $mysqli->query($q2)) {
                    while ($row2 = $result2->fetch_array()) {
                        echo '<div class="course_header">
                            <div class="user_img">';
                        echo '<img src="../../uploads/user_image/' . $row2["img"] . '"></div>';
                        echo '<div class="course_info">';
                        echo '<p class="user_name">' . $row2['fname'] . ' ' . $row2['lname'] . '</p>';
                        echo '<span class="light">'.$row2['occupation'].'</span>';
                        echo '</div></div>';
                    }
                } else {
                    echo 'Query error: ' . $mysqli->error;
                }

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
              
                    <div class="submit_button">
                    <a href="course.php?course_id=' . $row["course_id"] . '"  class="linkstyle">
                        <input type="submit" value="See Course">
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
        ?>


    </div>
</div>

</body>
</html>
