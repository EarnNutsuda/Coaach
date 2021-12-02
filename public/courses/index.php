<?php require_once('../connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../styleSheet/category.css">
    <meta charset="UTF-8">
    <title>Furreal</title>
    <link rel="shortcut icon" href="../../media/logo.png">
</head>
<body>
<?php include_once('../header.php'); ?>

<!-- title section-->
<div class="title_wrapper">
    <div class="title_section">
        <h1 class="title">Find Your Personal Coach</h1>
        <h3 class="description title">Increase Your Learning Ability</h3>
    </div>
</div>

<div class="main_div">
    <!-- side menu --->
    <div class="side_menu">
        <ul>
            <?php
            $q='select * from category;';
            if($result=$mysqli->query($q)){
                while($row=$result->fetch_array()){
                    echo '<li><a href="courses.php?category='.$row["category_id"].'" class="linkstyle">'.$row["category_name"].'</a></li>';
                }
            }else{
                echo 'Query error: '.$mysqli->error;
            }
            ?>
        </ul>
    </div>

    <div class="category_display">
        <div class="category_display_column">
            <?php
            $q = 'select * from category;';
            if ($result = $mysqli->query($q)) {
                $countitem = 0;
                while ($row = $result->fetch_array()) {
                    if($countitem%2==0){
                        echo'<div class="category_display_row">';
                    }
                    echo '<div class="category_wrapper">';
                    echo '<a href="courses.php?category='. $row["category_id"].'" class="linkstyle">';
                    echo '<img src="../../media/category_image/'.$row["category_id"].'.jpg">';
                    echo '<p class="category_title ">'.$row["category_name"].'</p>';
                    echo '</a></div>';
                    if($countitem%2==1){
                        echo'</div>';
                    }
                    $countitem++;
                }
            } else {
                echo 'Query error: ' . $mysqli->error;
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
