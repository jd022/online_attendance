<?php 
include("../dbConnection.php");
session_start();
if(empty($_SESSION['email']) && empty($_SESSION['student'])){
    header("Location:http://localhost/online_attendance/index.php");
    exit();
}else{
    $email = $_SESSION['email'];
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
    <h1>Student DashBoard</h1>
    <?php 
    $sql = "SELECT users.last_name, users.given_name, users.middle_name, courses.course_name, sets.set_name
    FROM users
    JOIN courses
    JOIN sets
    WHERE email_address = '$email'";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) == 1){
        $rows = mysqli_fetch_array($query);
    ?>
    <h2><?php echo $rows['last_name']?>, <?php echo $rows['given_name']?> <?php echo $rows['middle_name']?></h2>
    <p><?php echo $rows['course_name']?> <?php echo $rows['set_name']?></p>
    <?php
    }else{
        echo "STUDENT INFORMATION NOT FOUND";
        exit();
    }
    ?>
    <a href="http://localhost/online_attendance/student/attendance.php">Attendance</a>
    <a href="http://localhost/online_attendance/student/subject.php">Subject</a>
    <a href="http://localhost/online_attendance/student/profile.php">My Profile</a>
    <a href="http://localhost/online_attendance/student/attendance-history.php">Attendance History</a>
    <a href="home.php?st_signOut">Sign Out</a>
    <h1>My Profile</h1>
    <?php
    $get_info = "SELECT * FROM users WHERE email_address = '$email'";
    $query_info = mysqli_query($con, $get_info);
    if(mysqli_num_rows($query_info) == 1){
    $row = mysqli_fetch_array($query_info);
    ?>
    <b>Student ID:</b> <span><?php echo $row['user_id']?></span><br>
    <b>Last Name:</b> <span><?php echo $row['last_name']?></span><br>
    <b>Given Name:</b> <span><?php echo $row['given_name']?></span><br>
    <b>Middle Name:</b> <span><?php echo $row['middle_name']?></span><br>
    <b>E-mail:</b> <span><?php echo $row['email_address']?></span><br>
    <b>Contanct #:</b> <span><?php echo $row['contact_number']?></span><br>
    <a href="http://localhost/online_attendance/student/change-password.php">Change Password</a>
    <a href="http://localhost/online_attendance/student/edit-profile.php">Edit Profile</a>
    <?php
    }
    ?>
</body>
</html>
<?php
if(isset($_GET['st_signOut'])){
    session_unset();
    session_destroy();
    header("location:http://localhost/online_attendance/index.php");
    exit();
}
?>