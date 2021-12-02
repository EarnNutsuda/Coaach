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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styleSheet/income.css">
    <title>Furreal</title>
    <link rel="shortcut icon" href="../../media/logo.png">
</head>
<?php include_once('../header.php') ?>
<body>
<section class="form table">
    <header>Balance Check</header>
    <div class="content">
        <?php
        $result = TRUE;


        ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Course ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Transfer to account</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $q = "SELECT Date, course_id,amount,coach.*  FROM Outcome,users,coach WHERE coach.unique_id = users.unique_id AND Outcome.unique_id = users.unique_id AND Outcome.unique_id = {$_SESSION['unique_id']}";

            $result = $mysqli->query($q);
            if (!$result) {
                echo "Select failed. Error: " . $mysqli->error;
                return false;
            }
            while ($row = $result->fetch_array()) { ?>
                <tr>
                    <td><?= $row['Date'] ?></td>
                    <td><?= $row['course_id'] ?></td>
                    <td><?= $row['amount'] ?> Baht</td>
                    <td><?= $row['Bank_account'] ?>  <?= $row['Bankaccount_name'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
</section>
</body>
</html>