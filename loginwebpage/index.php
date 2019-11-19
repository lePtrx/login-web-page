<?php 
  session_start();

// To redirect user back to login.php if not logged in
  if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Main Page!</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <!-- CSS -->
  <link rel="stylesheet" href="style.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="change-password.php">Change password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href = "logout.php">Log Out</a>
      </li> 
    </ul>
  </nav>
  <div class="home">
    <div class="welcome">
      <h1><?php echo $_SESSION['success']; ?><h1>
      <p>You have logged in with the email <?php echo $_SESSION['email']; ?></p>
    </div>
  </div>
</body>
</html>

