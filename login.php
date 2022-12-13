<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];

   $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
      $_SESSION['name'] = $row['name'];
      header('location:/index.html');
   } else {
      $message[] = 'incorrect password or email!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <link rel="stylesheet" href="/css/bootstrap.min.css">
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
            <h3> Login</h3>
            <input type="email" name="email" required placeholder="E-mail " class="box">
            <input type="password" name="password" required placeholder="Password " class="box">
            <input type="submit" name="submit" class="btn" value="Login ">
            <p> Don't you have an account? <a href="register.php"> New account</a></p>
         </form>

   </div>
   </section>

   </div>


   <script src="Js/jquery-3.6.1.min.js"></script>
   <script src="Js/bootstrap.bundle.min.js"></script>
   <script src="/Js/index.js" type="module"></script>
  

</body>

</html>