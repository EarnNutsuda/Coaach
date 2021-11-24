<?php
$err = $name_err = $s_description_err = $l_description_err = $file_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $countFiles = count($_FILES['file']['name']);

    if ($countFiles > 4) {
        $file_err = " Choose at least 1 image but not more than 4 images";
        array_push($errors, $file_err);
    } else {
        // Looping all files
        for ($i = 0; $i < $countFiles; $i++) {
            $file = $_FILES['file'][$i];
            $fileName = $_FILES['file']['name'][$i];
            $fileSize = $_FILES['file']['size'][$i];
            $fileTempExt = explode('.', $fileName);
            $file_ext = strtolower(end($fileTempExt));
            $extensions = array("jpeg", "jpg", "png");
            if ($fileSize>2097152) {
                $file_err = "Please choose file less than 2 MB.";
                array_push($errors, $file_err);
            }
            if (in_array($file_ext, $extensions) === false) {
                $file_err = "Please choose a JPEG or PNG file.";
                array_push($errors, $file_err);
            }
        }

    }

    if (empty($_POST["course_name"])
        || empty($_POST["category_id"])
        || empty($_POST["short_description"])
        || empty($_POST["long_description"])) {
        $err = "Please fill in every field";
        array_push($errors, $err);
    }
    else {
        $err = "";
        if (strlen($_POST["course_name"]) > 250) {
            $name_err = "The name must be less than 250 characters";
            array_push($errors, $name_err);
        }
        if (strlen($_POST["short_description"]) > 200) {
            $s_description_err = "Short description must be less than 200 characters";
            array_push($errors, $s_description_err);
        }
        if (strlen($_POST["long_description"]) > 1000) {
            $l_description_err = "The course description must be less than 1000 characters";
            array_push($errors, $l_description_err);
        }
        if (empty($errors)) {
            $file_name_arr =array();
            $countFiles = count($_FILES['file']['name']);
            for ($i = 0; $i < $countFiles; $i++) {
                $file = $_FILES['file'][$i];
                $fileName = $_FILES['file']['name'][$i];
                $fileTempExt = explode('.', $fileName);
                $file_ext = strtolower(end($fileTempExt));
                $fileNameNew = md5(rand(1,1000000).uniqid(mt_rand(), true)) . "." . $file_ext;
                $destination = '../../../uploads/course_image/' . $fileNameNew;
                array_push($file_name_arr ,$fileNameNew);
                move_uploaded_file($_FILES['file']['tmp_name'][$i], $destination);
            }
            $_SESSION['course_name'] = $_POST['course_name'];
            $_SESSION['category_id'] = $_POST['category_id'];
            $_SESSION['course_short_description'] = $_POST['short_description'];
            $_SESSION['course_description'] = $_POST['long_description'];
            $_SESSION['image_video'] = $file_name_arr;
            header('location:course_price.php');
            exit();


        }

    }
}
?>