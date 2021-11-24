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
    <link rel="stylesheet" href="../styleSheet/admin.css">
    <title>Admin Update</title>
</head>
<body>
<?php include_once('header.php') ?>
<section class="form update">
    <header>Admin Page</header>
    <div class="outcome">
        <div class="block">
            <a href="Outcome_AdUpdate.php">Outcome update page</a>
        </div>
    </div>
    <div class="income">
        <div class="block">
            <a href="income.php">See Income</a>
        </div>
    </div>
    <div class="income">
        <div class="block">
            <a href="outcome.php">See Outcome</a>
        </div>
    </div>
    <div class="income">
        <div class="block">
            <a href="company_account.php">See Company Account</a>
        </div>
    </div>
</section>
</body>
</html>