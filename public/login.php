<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>

<head>
    <?php include_once "header2.php"; ?>

<body>
<div class="body">
  <div class="wrapper">
  <div id="includedHeader"></div>
    <section class="form login">
      <header>Login to your account</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="signup/index.php">Signup now</a></div>
      <div class="link"><a href="index.php">Back to Home page</a></div>
    </section>
  </div>
  
  <script src="script/pass-show-hide.js"></script>
  <script src="script/login.js"></script>
</div>
</body>
</html>
