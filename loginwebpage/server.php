<?php 
session_start();

// Initializing variables
$email = "";
$errors = array();

// Setting up connection to database

$db = mysqli_connect('localhost', 'root', '123456', 'login_system');

// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 

// User registration
if (isset($_POST['reg_user'])) {
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);

  // Form validation
  if (empty($firstName)) {
    array_push($errors, 'First name is required!');
  }
  if (empty($lastName)) {
    array_push($errors, 'Last name is required!');
  }
  if (empty($email)) {
    array_push($errors, 'Email is required!');
  }
  if (empty($password1)) {
    array_push($errors, 'Password is required!');
  }
  if ($password1 != $password2) {
    array_push($errors, "Passwords not match!");
  }



  // Checking if user has already registered with the email
  $email_check = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $email_check);
  $user = mysqli_fetch_assoc($result);

  if ($user['email'] === $email) {
    array_push($errors, 'Email has already been used!');
  }

  // If no error, proceed with registration
  if(count($errors) == 0) {
    $password = md5($password1);
    $query = "INSERT INTO users (first_name, last_name, email, pass) VALUES ('$firstName', '$lastName', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    $_SESSION['success'] = "Welcome!";
    header('location: index.php');
  }
}

// User login
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST["emailIn"]);
  $password = mysqli_real_escape_string($db, $_POST["passwordIn"]);

    if (empty($email)) {
      array_push($errors, "Email is required!");
    }
    if (empty($password)) {
      array_push($errors, "Password is required!");
    }

    // If no error, proceed with login
    if (count($errors) == 0) {
      $password = md5($password);
      $query = "SELECT * FROM users WHERE email='$email' AND pass='$password'";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) == 1 ) {
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Welcome!";
        header("location: index.php");
      } else {
        array_push($errors, "Wrong email or password!");
      }
    }
  }

// Password change
if (isset($_POST['change_password'])) {
  $oldPassword = mysqli_real_escape_string($db, $_POST['oldPassword']);
  $newPassword1 = mysqli_real_escape_string($db, $_POST['newPassword1']);
  $newPassword2 = mysqli_real_escape_string($db, $_POST['newPassword2']);

// Checking for empty fields
  if (empty($oldPassword)) {
    array_push($errors, "Please enter old password");
  } else {
    
    // Checking if the old pasword is correct
    $oldPassword = md5($oldPassword);
    $query = "SELECT * FROM users WHERE email='".$_SESSION['email']."' AND pass='$oldPassword'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) != 1) {
      array_push($errors, "Old password is wrong");
    }
  }
  if (empty($newPassword1)) {
    array_push($errors, "Please enter new password");
  } else {
    $newPassword = md5($newPassword1);
    $query = mysqli_query($db, "SELECT pass FROM users WHERE email='".$_SESSION['email']."'");
    $result = mysqli_fetch_assoc($query);
    if ($newPassword == $result["pass"]) {
      array_push($errors, "New and old passwords are the same");
    }
  }


  if (empty($newPassword2)) {
    array_push($errors, "Please confirm new password");
  }

// Checking if new passwords match


  if($newPassword1 != $newPassword2) {
    array_push($errors, "New passwords do not match");
  }

// If no error, proceed with password change
  if (count($errors) == 0) {
    $newPassword = md5($newPassword1);
    $query = "UPDATE users SET pass='$newPassword' WHERE email='".$_SESSION['email']."'";
    $result = mysqli_query($db, $query);
    header('location: index.php');
  }
}
?>
