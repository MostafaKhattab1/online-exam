<?php

include 'config.php';


if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass =  $_POST['password'];
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'user already exist!';
      header('location:login.php');
   } else {
      mysqli_query($conn, "INSERT INTO `users`(name, email , password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:/index.html');
   }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>


   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="/css/style.css">
   <link rel="stylesheet" href="/css/stylephp.css">
   
   <style>
      input {
         text-align: center;
      }
   </style>
</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
      }
   }
   ?>


   <div class="form-container">
      

      <form action="" method="post">
         <h3>Create a New Account</h3>
         <input type="text" name="name" required placeholder="Enter your Name" value="" class="box">
         <input type="email" name="email" required placeholder="Enter your E-mail" class="box">
         <input type="password" name="password" required placeholder="Enter Password" class="box">
         <input type="password" name="cpassword" required placeholder="Confirm Password" class="box">
         <button class="btn "><input type="submit" name="submit" class="m" value="Register"></button>
         <p>Do you have an account?  <a href="login.php">Login</a></p>
      </form>

   </div>

   <script src="Js/jquery-3.6.1.min.js"></script>
   <script src="Js/bootstrap.bundle.min.js"></script>
   <script src="/Js/index.js" type="module"></script>
</body>

</html>