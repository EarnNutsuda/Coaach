<?php require_once('../connect.php'); ?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <link rel="stylesheet" href="../styleSheet/rootstyle.css">
    <link rel="stylesheet" href="../styleSheet/courseRegisStyle.css">

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
                echo '<li><a href="courses.php?category=' . $row["category_name"] . '">' . $row["category_name"] . '</a></li>';
            }
        } else {
            echo 'Query error: ' . $mysqli->error;
        }
        ?>
    </ul>
</div>

<?php
$selected_course_id = $_SESSION['selected_course_id'];
$totalHour = $_SESSION['totalHour'];
$total_price = $_SESSION['total_price'];

$q = 'Select * from course where course_id=' . $selected_course_id . ';';
if ($result = $mysqli->query($q)) {
    $course = $result->fetch_array();
} else {
    echo 'Query error: ' . $mysqli->error;
}

$q2 = 'Select * from coach where coach.unique_id=' . $course["unique_id"] . ';';
if ($result2 = $mysqli->query($q2)) {
    $coach = $result2->fetch_array();
} else {
    echo 'Query error: ' . $mysqli->error;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $err = "";
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTempExt = explode('.', $fileName);
    $file_ext = strtolower(end($fileTempExt));
    $extensions = array("jpeg", "jpg", "png");
    if ($fileSize ==0) {
        $err = "Choose slip payment.";
    }
    if ($fileSize > 2097152) {
        $err = "Please choose file less than 2 MB.";
    } else if (in_array($file_ext, $extensions) === false) {
        $err = "Please choose a JPEG or PNG file.";
    }

    if($err==""){
        $fileNameNew = md5(rand(1,1000000).uniqid(mt_rand(), true)) . "." . $file_ext;
        $destination = '../../uploads/slip/' . $fileNameNew;
        array_push($file_name_arr ,$fileNameNew);
        move_uploaded_file($_FILES['file']['tmp_name'], $destination);
        $hour = $_POST['hour'];

        include_once "course_regis_php.php";
    }
}
?>
<form method="post" enctype='multipart/form-data' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="content">
        <div class="course_sum c">
            <div class="left">
                <?php
                $img = explode(",", $course['image_video']);
                echo '<img src="../../uploads/course_image/' . $img[0] . '">';
                ?>
            </div>
            <div class="right">
                <div class="r">
                    <h2 style="margin:0;"><?php echo $course['course_name'] ?></h2>
                    <span class="light">By <?php echo $coach['name_surename'] ?></span>
                </div>
                <div class="r">
                    <div><span class="bold">Regular Course : </span><span
                                class="price"><?php echo $course['regular_price'] ?> Baht/ 1 Hour</span></div>
                    <div><span class="bold">Buffet Course : </span><span
                                class="price"><?php echo $course['buffet_price'] ?> Baht/ <?php echo $course['buffet_hour'] ?> Hours</span>
                    </div>
                </div>

                <div class="r f">
                    <span class="bold"> Book Lesson</span>
                    <div class="c">
                        <div>
                            <label for="hour">Hour</label>
                            <select name="hour" id="hour" style="width: auto;padding: 0;">
                                <?php
                                $max = $course['buffet_hour'];
                                $max = (int)$max;
                                for ($x = 1; $x <= $max; $x++) {
                                    if ($x == $totalHour) {
                                        echo '<option value="' . $x . '" " selected="selected">' . $x . '</option>';
                                    } else {
                                        echo '<option value="' . $x . '" >' . $x . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <hr>
        <!-- Payment section-->
        <div class="c">
            <div class=" subtotal box price_sum">
                <div><span class="bold r">course name</span></div>
                <div class="c r space-bt"><span class="light"
                                                id="regis_hour">Subtotal (<?php echo $totalHour; ?> Hour)</span> <span
                            class="light" id="course_price"><?php echo $total_price; ?> Baht</span>
                </div>
                <div class="c r space-bt"><span class="light">Service Fee</span> <span class="light"
                                                                                       id="service_fee"><?php echo $total_price * 0.15; ?> Baht</span>
                </div>
                <div class="c r space-bt"><span class="bold">Total</span><span class="bold"
                                                                               id="total_price"><?php echo $total_price * 0.15 + $total_price; ?> Baht</span>
                </div>
            </div>
            <div class="right payment">
                <div class="tab_header c">
                    <div class="tab_title active bold" id="banktransfer_head" onclick="tabopen(event,'banktransfer')">
                        <div class="button" >Bank Transfer</div>
                    </div>
                    <div class="tab_title bold" id="scan_head" onclick="tabopen(event,'scan')">
                        <div class="button" >Promptpay Scan</div>
                    </div>
                </div>

                <div class="tab_content active" id="banktransfer">
                    <ul>
                        <li class="c r space-bt">Bank: Kasikorn Bank</li>
                        <li class="c r space-bt">Account Name: Company Name</li>
                        <li class="c r space-bt">Account Number: 111-1111-111</li>
                    </ul>
                </div>
                <div class="tab_content" id="scan">
                    <img class="qr" src="../../media/company_qr.png">
                    <ul>
                        <li class="c space-bt">Account Name: Company Name</li>
                        <li class="c space-bt">Account Number: 111-1111-111</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="submit_area">
            <div class="err"><?php echo $err;?></div>
            <input type="file" name ="file" class="upload" value="Upload Image">
            <input type="submit" value="Confirm Payment">
        </div>
    </div>
</form>
<?php
echo '<script type="text/javascript">
    var hour = document.getElementById("hour");
    var subtotal = document.getElementById("course_price")
    var regis_hour = document.getElementById("regis_hour")
    var service_fee = document.getElementById("service_fee")
    var total = document.getElementById("total_price")
    var tempsubtotal,tempservice_fee,temptotal;

    hour.addEventListener("change",function(){
        var temp = parseInt(hour.value)
        regis_hour.innerText = "Subtotal (" + hour.value+" Hour)";
        if (temp <' . $max . '){
            tempsubtotal = temp*parseInt(' . $course['regular_price'] . ');
          
        }
        else{
            tempsubtotal =' . $course['buffet_price'] . '
        }   
        tempservice_fee = tempsubtotal*0.15
        temptotal = tempsubtotal+tempservice_fee;
        subtotal.innerText = tempsubtotal+" Baht" ;
        service_fee.innerText = tempservice_fee+" Baht" 
        total.innerText = temptotal +" Baht" 
    })
   
</script>';
?>
<script>
    function tabopen(event, method) {
        var i, tabcontent, tabtitle;
        tabcontent = document.getElementsByClassName("tab_content");
        tabtitle = document.getElementsByClassName("tab_title");
        for (i = 0; i < tabtitle.length; i++) {
            tabtitle[i].classList.remove('active');
            tabcontent[i].classList.remove('active')
        }
        document.getElementById(method + "_head").classList.add('active');
        document.getElementById(method).classList.add('active');

    }
</script>
</body>


</html>

