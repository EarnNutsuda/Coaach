<?php
session_start();
require_once('../connect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/32597fd7ba.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styleSheet/income.css">
    <title>Coaach</title>
    <link rel="shortcut icon" href="../../media/logo.png">
</head>

<body>
<?php include_once "header.php"?>
<section class="form table">
    <header>Outcome History</header>

    </div>
    <div class="content">
        <?php
        $result = TRUE;
        $date = date('Y-m-d');
        $course_id = $_POST['registration_id'];
       $unique_id = $_POST['unique_id'];
        $amount = $_POST['amount'];

        $q = "INSERT INTO Outcome (Date,registration_id,unique_id,amount) VALUES
                      ('$date','$course_id','$unique_id','$amount')";
        $result = $mysqli->query($q);
        if(!$result){

        }
        ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Registration ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Slip</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $q = "SELECT * FROM Outcome";
            $result=$mysqli->query($q);
            if(!$result){
                echo "Select failed. Error: ".$mysqli->error ;
                return false;
            }
            while($row=$result->fetch_array()){ ?>
                <tr>
                    <td><?=$row['Date']?></td>
                    <td><?=$row['registration_id']?></td>
                    <td><?=$row['unique_id']?></td>
                    <td><?=$row['amount']?> Baht</td>
                    <td>
                        <a href="#"><i class="fas fa-file-invoice-dollar"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</section>
</body>


</html>