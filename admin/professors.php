<?php
session_start();
include "../dbConnection.php";
if(!isset($_SESSION['user_name']) && !isset($_SESSION['password'])){
  header("location:index.php");
  exit();
}
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
  <a href="students.php">Students</a>
  <a href="professors.php">Professors</a>
  <a href="subjects.php">Subjects</a>
  <a href="attendance.php">Attendance</a>
  <a href="home.php?logout">Logout</a>
  <form action="" method="POST">
    <label for="">User ID</label><br>
    <input type="number" name="user_id"><br>
    <label for="">Last Name</label><br>
    <input type="text" name="last_name"><br>
    <label for="">Given Name</label><br>
    <input type="text" name="given_name"><br>
    <label for="">Middle Name</label><br>
    <input type="text" name="middle_name"><br>
    <label for="">Contact Number</label><br>
    <input type="number" name="contact_number"><br>
    <label for="">Email Address</label><br>
    <input type="email" name="email_address"><br>
    <label for="">Password</label><br>
    <input type="password" name="password"><br>
    <label for="">Re-enter Password</label><br>
    <input type="password" name="c_password"><br>
    <select name="subject" id="">
      <option value="">-SELECT SUBJECT-</option>
      <option value="1">AL 101</option>
      <option value="2">NC 101</option>
      <option value="3">SDF 101</option>
      <option value="4">CS 15</option>
      <option value="5">AR 101</option>
      <option value="6">HCI 101</option>
    </select><br>
    <button type="submit" name="insert">Insert</button>
  </form>
  <?php
  $display_prof = "SELECT * FROM users WHERE user_types_id = 2 ORDER BY date_time_created ASC";
  $query_display = mysqli_query($con, $display_prof);
  if(mysqli_num_rows($query_display) > 0){
  ?>
  <h2>Professors Details</h2>
  <table>
  <thead>
  <tr>
  <th>User ID</th>
  <th>Last Name</th>
  <th>Given Name</th>
  <th>Middle Name</th>
  <th>Contact Number</th>
  <th>Email Address</th>
  <th>Operation</th>
  </tr>
  </thead>

  <?php  while($rows = mysqli_fetch_array($query_display)){?>

  <tbody>
  <tr>
  <td><?php echo $rows['user_id']?></td>
  <td><?php echo $rows['last_name']?></td>
  <td><?php echo $rows['given_name']?></td>
  <td><?php echo $rows['middle_name']?></td>
  <td><?php echo $rows['contact_number']?></td>
  <td><?php echo $rows['email_address']?></td>
  <td>
  <a href="">Edit</a>
  </td>
  </tr>
  </tbody>
  <?php
  }
  ?>
  </table>
  <?php
  }else{
  ?>
  <br>No DATA Yet
  <?php }?>
</body>
</html>

<?php
  if(isset($_POST['insert'])){
    $user_id = $_POST['user_id'];
    $last_name = ucwords($_POST['last_name']);
    $given_name = ucwords($_POST['given_name']);
    $middle_name = ucwords($_POST['middle_name']);
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $password = md5($_POST['password']);
    $subject = $_POST['subject'];

    $verify = 1;
    $default_user_type = 2;
    date_default_timezone_set('Asia/Manila');
    $added_on = date('Y-m-d H:i:s');

    if(empty($_POST['user_id']) && empty($_POST['last_name']) && empty($_POST['give_name'])
    && empty($_POST['middle_name']) && empty($_POST['contact_number']) && empty($_POST['email_address'])
    && empty($_POST['password']) && empty($_POST['subject'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the required info",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(empty($_POST['user_id'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please fill up the User ID Field",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(empty($_POST['last_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please put the Last Name",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(empty($_POST['given_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please put the Given Name",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(empty($_POST['middle_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please put the Middle Name",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(empty($_POST['contact_number'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please put the Contact Number",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(empty($_POST['email_address'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please put the E-Mail Address",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(empty($_POST['password'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please put the Password",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(empty($_POST['c_password'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please Re-enter your password",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(empty($_POST['subject'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Please put the Subject",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if($_POST['password'] != $_POST['c_password']){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Password & Confirm Password do not match",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['last_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Last Name field should be character only",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['given_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Given Name field should be character only",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['middle_name'])){
      echo '<script>swal({
        title: "Oops Invalid!",
        text: "Middle Name field should be character only",
        icon: "warning",
        }).then(function() {
        // Redirect the user
        window.location.href="professors.php";
         });</script>';
         exit();
    }else{
      $check_prof_info = "SELECT * FROM users WHERE last_name = '$last_name' 
      AND given_name = '$given_name' AND middle_name = '$middle_name' AND user_types_id = 2";
      $query_check_info = mysqli_query($con, $check_prof_info);
      if(mysqli_num_rows($query_check_info) == 1){
        echo '<script>swal({
          title: "Oops Invalid!",
          text: "User Already Created!",
          icon: "warning",
          }).then(function() {
          // Redirect the user
          window.location.href="professors.php";
           });</script>';
           exit();
      }else{
        $sql = "INSERT INTO users (`user_id`, `last_name`, `given_name`, `middle_name`,
        `contact_number`, `email_address`, `password`, `verified`, `user_types_id`, `date_time_created`)
        VALUES ('$user_id', '$last_name', '$given_name', '$middle_name', '$contact_number', '$email_address',
        '$password', '$verify', '$default_user_type', '$added_on')";
        $query = mysqli_query($con, $sql);
        if($query){
          $insert_user_subject = "INSERT INTO users_subjects (`users_id`, `subjects_id`, `date_time_created`)
          VALUES ('$user_id', '$subject', '$added_on')";
          $query_request = mysqli_query($con, $insert_user_subject);
          if($query_request){
            echo '<script>swal({
              title: "Success!",
              text: "New Professor info has been created",
              icon: "success",
              }).then(function() {
              // Redirect the user
              window.location.href="professors.php";
               });</script>';
               exit();
          }else{
            echo "NOT INSERTED" . $con->error;
            exit();
          }
        }else{
          echo "SOMETHING WENT WRONG" . $con->error;
          exit();
        }
      }
    }
  }
?>