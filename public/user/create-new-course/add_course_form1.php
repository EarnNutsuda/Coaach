<?php require_once('../connect.php'); ?>
<?php
if(isset($_POST['submit'])) {
    $countFiles = count($_FILES['file']['name']);
    for ($i = 0; $i < $countFiles; $i++) {
        $file = $_FILES['file'][$i];
        $fileName = $_FILES['file']['name'][$i];
        $fileTempExt = explode('.', $fileName);
        $file_ext = strtolower(end($fileTmpExt));
        $fileNameNew = uniqid('', true) . "." . $file_ext;
        $destination = '../uploads/course_image/' . $fileNameNew;
        move_uploaded_file($_FILES['file']['tmp_name'][$i], $destination);
        echo '<script>console.log('.$fileNameNew.')</script>';


    }
    $_SESSION['course_name'] = $_POST['course_name'];
    $_SESSION['category_id'] = $_POST['category_id'];
    $_SESSION['short_description'] = $_POST['short_description'];
    $_SESSION['long_description'] = $_POST['long_description'];
    header("Location: add_course_form1.php");
    exit();
}
?>
