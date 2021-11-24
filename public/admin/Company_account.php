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
<?php include_once "header.php"; ?>

<section class="form table">
    <header>See Company Account</header>

    </div>
    <div class="content">

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Registration ID</th>
                <th scope="col">Total Income</th>
                <th scope="col">Vat</th>
                <th scope="col">After Vat</th>
                <th scope="col">Service Fee</th>
                <th scope="col">Give to Coach</th>
                <th scope="col">Expected Transaction Date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $q = "SELECT * FROM Company_account";
            $result=$mysqli->query($q);
            if(!$result){
                echo "Select failed. Error: ".$mysqli->error ;
                return false;
            }
            while($row=$result->fetch_array()){ ?>
                <tr>
                    <td><?=$row['registration_id']?></td>
                    <td><?=$row['total_in']?> Baht</td>
                    <td><?=$row['vat']?> Baht</td>
                    <td><?=$row['after_vat']?> Baht</td>
                    <td><?=$row['service_fee']?> Baht</td>
                    <td><?=$row['give_to_coach']?> Baht</td>
                    <td><?=$row['expected_transaction_date']?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</section>
</body>

</html>