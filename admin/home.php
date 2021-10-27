<?php
session_start();
include("../dbConnection.php");
if(empty($_SESSION['user_name']) && empty($_SESSION['password'])){
  header("Location:index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a href="students.php">Students</a>
  <a href="professors.php">Professors</a>
  <a href="subjects.php">Subjects</a>
  <a href="attendance.php">Attendance</a>
  <a href="home.php?logout">Logout</a>
</body>
</html>
<?php 
  if(isset($_GET['logout'])){
  session_unset();
	session_destroy();
	header("location:index.php");
	exit();
  }
?>