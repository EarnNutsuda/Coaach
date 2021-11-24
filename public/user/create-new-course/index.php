<?php session_start();?>
<?php require_once('../../connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">

    <link rel="stylesheet" href="../../styleSheet/addCourse.css">
    <link rel="stylesheet" href="../../styleSheet/rootstyle.css">

    <meta charset="UTF-8">
    <title>Coaach</title>
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
require_once('index_include1.php');
?>

<!--main-->
<div class="content">
    <form method="post"  enctype='multipart/form-data' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="inner">
            <div class="title">Step 1</div>
            <div class="r">
                <label>Course Name</label><br>
                <input type="text" name="course_name" value="<?php echo $_SESSION['course_name']; ?>">
                <div class="err"><?php echo $name_err; ?></div>
            </div>
            <div class="r">
                <label>Category of you course</label><br>
                <select name="category_id" >

                    <?php
                    $q = 'select * from category;';
                    if ($result = $mysqli->query($q)) {
                        while ($row = $result->fetch_array()) {
                            if($row["category_id"]==$_SESSION["category_id"]){
                                echo '<option value="' . $row["category_id"] . '" selected>' . $row["category_name"] . '</option>';
                            }
                            else{
                                echo '<option value="' . $row["category_id"] . '">' . $row["category_name"] . '</option>';
                            }
                            }
                    } else {
                        echo 'Query error: ' . $mysqli->error;
                    }
                    ?>
                </select>
            </div>
            <div class="r">
                <label>Short Description (Max 200 characters)</label><br>
                <textarea rows="2" name="short_description" >
                    <?php echo $_SESSION['short_description'];?>
                </textarea>
                <div class="err"><?php echo $s_description_err; ?></div>
            </div>
            <div class="r">
                <label>Long Description (Maximum 1000 characters)</label><br>
                <textarea rows="10" name="long_description">
                    <?php echo $_SESSION['long_description'];?>
                </textarea>
                <div class="err"><?php echo $l_description_err; ?></div>
            </div>
            <div class="r">
                <label>Upload Course Image (Maximum 4 images)</label><br>
                <input type="file" name="file[]" id="file" multiple>
                <div class="err"><?php echo $file_err; ?></div>
            </div>


            <div class="err"><?php echo $err; ?></div>
            <div style="display: flex;justify-content: flex-end;">
                <input class="btn" type="submit" value="submit" name="submit" style="padding: 8px 96px ">
            </div>
        </div>
    </form>

</div>
</body>
</html>
