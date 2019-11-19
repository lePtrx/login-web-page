<?php include('server.php') ?>

<?php
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
  <title>Change password</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- CSS -->
  <link rel="stylesheet" href="style.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
</head>
<body>
  <div class="change-password">
    <div class="title">
      <h1>Change password</h1>
    </div>
      <form method="post" action="change-password.php">
        <?php include ('errors.php'); ?>
        <div class="forms">
          <div class="input-group">
            <input type="password" name="oldPassword" class="form-control" placeholder="Old password">
          </div>
          <div class="input-group">
            <input type="password" name="newPassword1" class="form-control" placeholder="New password">
          </div>
          <div class="input-group">
            <input type="password" name="newPassword2" class="form-control" placeholder="Confirm new password">
          </div>
          <div class="submit-button">
            <button type="submit" class="btn btn-primary change-btn" name="change_password">Change password</button>
          </div>
        </div>
      </form>
  </div>
</body>
</html>