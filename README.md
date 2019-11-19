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
5. On your browser, type in the following address:
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

Direct access into `index.php` or `change-password.php` through URL is restricted. This is possible through the
