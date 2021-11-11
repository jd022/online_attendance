<?php
include("dbConnection.php");
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
  <h2>Login</h2>
  <form action="" method="POST">
    <input type="email" name="email_address" placeholder="E-mail">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="login">Login</button>
    <p>Didn`t have account yet? Register <a href="http://localhost/online_attendance/register.php">here</a></p>
  </form>
</body>
</html>
<?php
session_start();
  if(isset($_POST['login'])){
    $email = $_POST['email_address'];
    $password = $_POST['password'];
    $password = md5($password);

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
      $sql = "SELECT * FROM users
      WHERE email_address = '$email' AND password = '$password'";
      $query = mysqli_query($con, $sql);
      if(mysqli_num_rows($query) == 1){
        $rows = mysqli_fetch_array($query);
        if($rows['user_types_id'] == 1 && $rows['verified'] == 1){
        $_SESSION['email'] = $rows['email_address'];
        $_SESSION['student'] = $rows['user_types_id'];
        echo "student";
        header("location:http://localhost/online_attendance/student/home.php");
        exit();
        }else if($rows['user_types_id'] == 2 && $rows['verified'] == 1){
        $_SESSION['email'] = $rows['email_address'];
        $_SESSION['professor'] = $rows['user_types_id'];
        echo "professor";
        header("location:http://localhost/online_attendance/professor/home.php");
        exit();
        }else{
          echo '<script>swal({
            title: "Request Denied",
            text: "Your account is not yet verified. please contact your administrator",
            icon: "warning",
            }).then(function() {
            // Redirect the user
            window.location.href="index.php";
             });</script>';
             exit();
        }
        }else{
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