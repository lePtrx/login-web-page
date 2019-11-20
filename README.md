# Login web page using PHP and MySQL

This is a simple login system that enables new users to register and registered users to login into the main page. In the main page, users can choose to change password or log out. All data from registrations or password changes will be stored and updated in MySQL database.

# Getting started :tada:

This section will guide you on how to get the project up and running in your local machine for testing purposes.

## Prerequisites :hammer::wrench:

- XAMPP installed in your system

## Installation :computer:

1. Download the files from Github.
2. Copy `loginwebpage` folder into the following directory:
   `...\XAMPP\htdocs`
3. Start up `Apache` and `MySQL`.
4. Import the MySQL database using the `login_system.sql` file in phpMyAdmin.
5. In `server.php` line 10, change the info accordingly:

```php
  $db = mysqli_connect('localhost', 'root', '123456','login_system');
```

6. On your browser, type in the following address:
   `http://localhost/loginwebpage/login.php`

# Testing the system :rocket:

- Kindly refer to `use-case-diagram.pdf`.
- New users will have to register an account through the registration page.
- Existing users can log into the main page from login page.
- In the main page, users can choose to change password or log out.

## Note

### Registration

- All fields are required to be filled in.
- New users cannot use already registered email.

### Log in

- All fields are required to be filled in.

### Password change

- Users must enter the correct current password in `Old password` field.
- Users cannot use the choose a new password that is the same as the existing password.

# Security handling :cop:

## Direct access

Direct access into important pages of the main site such as `index.php` and `change-password.php` through URL is restricted. This is possible through `$_SERVER['HTTP_REFERER']` superglobal variable. Eg of the code:

```php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: login.php');
  }
```

If the pages are not directed from a referer, it'll be redirected back to `http://localhost/loginwebpage/login.php`.

## Passwords

Passwords are encrypted using MD5 algorithm. This will take user typed passwords and then hashed before being stored into the database.

```php
$password = md5($password1);
$query = "INSERT INTO users (first_name, last_name, email, pass) VALUES ('$firstName', '$lastName', '$email', '$password')";
mysqli_query($db, $query);
```

The codes above hashes the input password using the md5 algorithm before being inserted into MySQL database.

# Error handling :exclamation:

## Empty fields :grey_question:

Users must enter all fields and any empty ones will prompt an alert back to users to fill them.

```php
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);

  if (empty($firstName)) {
    array_push($errors, 'First name is required!');
  }
```

These lines of codes in `server.php` creates the logic that will add the error message to an array, `$errors` found in `errors.php`. Then, the error message will be pushed out for the user to see.

## Used email :busts_in_silhouette:

During registration, emails that were once used to register will not be allowed to register again.

```php
  $email = mysqli_real_escape_string($db, $_POST['email']);

  $email_check = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $email_check);
  $user = mysqli_fetch_assoc($result);

  if ($user['email'] === $email) {
    array_push($errors, 'Email has already been used!');
  }
```

First, the email is obtain user input. Next, a query will be performed using the email that was provided by the user. If there is result (email already existed in database), an error message will be shown to the user using the same array method in `errors.php` to alert user.

## Confirmation of password :key::key:

It is important for users to confirm their newly registered password to make sure no errors were made during registration.

```php
  $password1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);

  if ($password1 != $password2) {
    array_push($errors, "Passwords not match!");
  }
```

User will have to enter their password (for the registration) and to confirm their password again in another field. These two inputs will then be compared. If both inputs are not the same, then an error message will be shown to the user to input the passwords correctly.

## Correct login credentials :warning:

During the login stage, users will have to enter their credentials (emails and passwords used during their registration) accurately.

```php
  $email = mysqli_real_escape_string($db, $_POST["emailIn"]);
  $password = mysqli_real_escape_string($db, $_POST["passwordIn"]);

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
```

Both email and password will be entered by user. The password will be then encrypted using the MD5 algorithm. A query to the database is made using the email and encrypted password. If the is a result (both email and encrypted password matches the database), then we allow user to log in into index.php. Else, they will be shown an error message.

## Password change :lock::key:

### Existing password authentication

If users would like to change their current password, they are to enter the correct old password for authentication purposes.

```php
  $oldPassword = mysqli_real_escape_string($db, $_POST['oldPassword']);

  $oldPassword = md5($oldPassword);
  $query = "SELECT * FROM users WHERE email='".$_SESSION['email']."' AND pass='$oldPassword'";
  $result = mysqli_query($db, $query);
  if (mysqli_num_rows($result) != 1) {
    array_push($errors, "Old password is wrong");
  }
```

The password (old password) inputted by the user will first be hashed using MD5 algorithm. Using the email used for the login (using session) and the hashed password, a query is made to the database. If the query returns no result (old password is not the same as the one in database), then error message will be shown to the user and user will have to enter the correct old password.

### Same password

Users are not allowed to use back the current password as their new password during the password changing phase.

```php
  $newPassword1 = mysqli_real_escape_string($db, $_POST['newPassword1']);

  $newPassword = md5($newPassword1);
    $query = mysqli_query($db, "SELECT pass FROM users WHERE email='".$_SESSION['email']."'");
    $result = mysqli_fetch_assoc($query);
    if ($newPassword == $result["pass"]) {
      array_push($errors, "New and old passwords are the same");
    }
```

After the user enters the new password, the password will be encryted using MD5 algorithm. A query will be made to the database using the email used during registration (through session). The result of the query (current password) will be compared to the encryted password entered by the user. If they are the same (new password is same as the old password), then an error message will be shown to the user.

# ERD

Kindly refer to `ERD.pdf`.

# Data Dictionary :floppy_disk:

Kindly refer to `Data dictionary.pdf`.

# Use Case Diagram :thought_balloon:

Kindly refer to `use-case-diagram.pdf`.
