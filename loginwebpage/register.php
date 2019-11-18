<?php include ('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- CSS -->
  <link rel="stylesheet" href="style.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
</head>
<body>
  <div class="register">
    <div class="title">
      <h1>Registration</h1>
    </div>
    <form method="post" action="register.php">
      <?php include ('errors.php'); ?>
      <div class="forms">
        <div class="input-group">
          <input type="text" name="firstName" class="form-control" placeholder="First name">
        </div>
        <div class="input-group">
          <input type="text" name="lastName" class="form-control" placeholder="Last name">
        </div>
        <div class="input-group">
          <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="input-group">
          <input type="password" name="password1" class="form-control" placeholder="Password">
        </div>
        <div class="input-group">
          <input type="password" name="password2" class="form-control" placeholder="Confirm password">
        </div>
        <p class="register-link">
          Already registered? <a href="login.php">Login now!</a>
        </p>
        <div class="submit-button">
          <button type="submit" class="btn btn-primary" name="reg_user">Register</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>