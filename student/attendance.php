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
    <br>
    <h2>Subject</h2>
    <span>SDF 101<br>10:00 AM - 12:00 NN</span>
    <h2>TIME-IN</h2>
    <button type="submit">Present</button>
    <br>
    <h2>TIME-IN</h2>
    <button type="submit">Present</button>
    <p><b>Warning:</b> Students only have 10 minutes aloted time for the attendace.</p>
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