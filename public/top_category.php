<?php
require_once('../connect.php');
?>
<link rel="stylesheet" href="../styleSheet/courses.css">
<link rel="stylesheet" href="styleSheet/courses.css">
<style>
    .top_category_menu{
        background: white;
        border-bottom: 1px solid;
        border-color: rgba(0, 0, 0, 0.05);
    }
</style>
<div class="top_category_menu" >
    <ul>
        <?php
        $q = 'select * from category;';
        if ($result = $mysqli->query($q)) {
            while ($row = $result->fetch_array()) {
                echo '<li><a href="../courses/courses.php?category=' . $row["category_id"] . '">' . $row["category_name"] . '</a></li>';
            }
        } else {
            echo 'Query error: ' . $mysqli->error;
        }
        ?>
    </ul>
</div>