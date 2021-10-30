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
  <h2>Student Registration</h2>
  <form action="" method="POST">
    <input type="number" name="id_number" placeholder="Student ID No."><br>
    <input type="text" name="last_name" placeholder="Last Name"><br>
    <input type="text" name="given_name" placeholder="Given Name"><br>
    <input type="text" name="middle_name" placeholder="Middle Name"><br>
    <input type="number" name="contact_number" placeholder="Contact No."><br>
    <input type="email" name="email" placeholder="E-mail Address"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="password" name="c_password" placeholder="Re-Enter Password"><br>
    <a href="index.php">Login</a>
    <button type="submit" name="register">Sign Up</button>
  </form>
</body>
</html>
<?php 
  if(isset($_POST['register'])){
    $id_number = $_POST['id_number'];
    $last_name = ucwords($_POST['last_name']);
    $given_name = ucwords($_POST['given_name']);
    $middle_name = ucwords($_POST['middle_name']);
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $password = md5($password);

    $default_verification = 0;
    $default_user_type = 1;
    date_default_timezone_set('Asia/Manila');
    $added_on = date('Y-m-d H:i:s');

    if(empty($_POST['id_number']) && empty($_POST['last_name']) && empty($_POST['given_name'])
    && empty($_POST['middle_name']) && empty($_POST['contact_number']) && empty($_POST['email'])
    && empty($_POST['password'])){
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
    else if(empty($_POST['id_number'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the ID No. field",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if(empty($_POST['last_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the Last Name field",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if(empty($_POST['given_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the Given Name field",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if(empty($_POST['middle_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the Middle Name field",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if(empty($_POST['contact_number'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the Contact Number field",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if(empty($_POST['email'])){
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
        text: "Please fill up the Password field",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if($_POST['password'] != $_POST['c_password']){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Password & Confirm Password do not match",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['last_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Last Name field should be character only",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['given_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Given Name field should be character only",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['middle_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Middle Name field should be character only",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="register.php";
         });</script>';
         exit();
    }
    else{
      $check_student = "SELECT * FROM users
      WHERE `user_id` = '$id_number' AND email_address = '$email'";
      $query_student = mysqli_query($con, $check_student);
      if(mysqli_num_rows($query_student) > 0){
        echo '<script>swal({
          title: "Oops Invalid!",
          text: "Student information already registered please wait to verify your registration form",
          icon: "warning",
          }).then(function() {
          // Redirect the user
          window.location.href="register.php";
           });</script>';
           exit();
      }else{
        $insert_student = "INSERT INTO users (`user_id`, `last_name`, `given_name`, `middle_name`,
        `contact_number`, `email_address`, `password`, `verified`, `user_types_id`, `date_time_created`)
        VALUES ('$id_number', '$last_name', '$given_name', '$middle_name', '$contact_number', '$email',
        '$password', '$default_verification', '$default_user_type', '$added_on')";
        $query_insert = mysqli_query($con, $insert_student);
        if($query_insert){
          echo '<script>swal({
            title: "Registration Success!",
            text: "We will send you an email once the administrator verified your student form.",
            icon: "success",
            }).then(function() {
            // Redirect the user
            window.location.href="register.php";
        });</script>';
        }else{
          echo '<script>swal({
            title: "Error!",
            text: "Something went wrong!",
            icon: "warning",
            }).then(function() {
            // Redirect the user
            window.location.href="register.php";
        });</script>';
        }
      }
    }
  }
?>