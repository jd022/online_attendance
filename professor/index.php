<?php
include("../dbConnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Document</title>
</head>
<body>
  <h2>Professor Login</h2>
  <form action="" method="POST">
    <input type="email" name="email_address" placeholder="E-mail">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="login">Login</button>
  </form>
</body>
</html>
<?php 
  if(isset($_POST['login'])){
    $email = $_POST['email_address'];
    $password = $_POST['password'];
    $password = md5($password);

    $user_types_id = 2;
    if(empty($_POST['email_address']) && empty($_POST['password'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the required info",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if(empty($_POST['email_address'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the E-mail field",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if(empty($_POST['password'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the password field",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else{
      $sql = "SELECT email_address, password, user_types_id FROM users
      WHERE email_address = '$email' AND password = '$password' AND user_types_id = '$user_types_id'";
      $query = mysqli_query($con, $sql);
      if(mysqli_num_rows($query) == 1){
        echo "tama";
      }
      else{
        echo '<script>swal({
          title: "Request Denied",
          text: "User Credentials not Found!",
          icon: "warning",
          }).then(function() {
          // Redirect the user
          window.location.href="index.php";
           });</script>';
           exit();
      }
    }
  }
?>