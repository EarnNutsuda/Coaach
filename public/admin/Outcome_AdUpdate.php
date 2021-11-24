<?php
session_start();
require_once('../connect.php');
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/32597fd7ba.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../styleSheet/AdUpdate.css">
    <title>Coaach</title>
    <link rel="shortcut icon" href="../../media/logo.png">
</head>

<body>
<?php include_once ("header.php")?>
<section class="form update">
    <header>Admin Update For Outcome</header>
    <form action="outcome.php" method="post">
        <div class="field input">
            <a href="income.php">See Income</a>
            <label>Registration ID</label>
            <input type="text" name='registration_id'>
        </div>
        <div class="field input">
            <label>User ID</label>
            <input type="text" name='unique_id'>
        </div>
        <div class="field input">
            <label>Amount</label>
            <input type="text" name="amount">
        </div>
        <div class="field button">
            <input type="submit" name="submit" value="Update">
        </div>
    </form>
</section>
</body>

</html>
