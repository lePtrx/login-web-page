<?php include ('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <!-- CSS -->
  <link rel="stylesheet" href="style.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
</head>
<body>
  <div class="login">
    <div class="title">
      <h1>Login</h1>
    </div>

    <form method="post" action="login.php">
      <?php include('errors.php'); ?>
      <div class="forms">
        <div class="input-group">
          <input type="email" name="emailIn" class="form-control" placeholder="Enter email">
        </div>
        <div class="input-group">
          <input type="password" name="passwordIn" class="form-control" placeholder="Enter password">
        </div>
        <p class="register-link">
          <a href="register.php">Register a new account!</a>
        </p>
        <div class="submit-button">
          <button type="submit" class="btn btn-primary" name="login_user">Login</button>
        </div>
      </div>
    
    </form>
  </div>
</body>
</html>