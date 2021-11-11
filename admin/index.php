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
  <h2>Admin Login</h2>
  <form action="" method="POST">
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="login">Login</button>
  </form>
</body>
</html>

<?php
session_start();
  if(isset($_POST['login'])){
    $username = $_POST['user'];
    $password = $_POST['password'];
    
    
    if(empty($_POST['user']) && empty($_POST['password'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the required info",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="index.php";
         });</script>';
         exit();
    }
    else if(empty($_POST['user'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the username field",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="index.php";
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
        window.location.href="index.php";
         });</script>';
         exit();
    }else{
      $sql = "SELECT * FROM administrator WHERE username = '$username' AND password = '$password'";
      $query = mysqli_query($con, $sql);
      if(mysqli_num_rows($query) == 1){
        $rows = mysqli_fetch_array($query);
        $_SESSION['user_name'] = $rows['user_name'];
        $_SESSION['password'] = $rows['password'];
        header("Location:home.php");
        exit();
      }else{
        echo '<script>swal({
          title: "Oops Invalid!",
          text: "User Name and Password not Found!",
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