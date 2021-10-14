<?php
include "../dbConnection.php";
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
  <a href="attendance.php">Attendance</a><br>
  <a href="attendance.php">All</a>
  <a href="attendance.php?student">Student</a>
  <a href="attendance.php?professor">Professor</a>
  <?php if(isset($_GET['student'])){
  if($_GET['student'] == 'student'){
    header("Location:attendance.php");
    exit();
  } 
  $display_student_attendance = "SELECT users.user_id, users.last_name, users.given_name, users.middle_name, 
  subjects.names, attendance.time_in, attendance.time_out, attendance.present
  FROM attendance 
  LEFT JOIN users ON attendance.users_id = users.id
  LEFT JOIN subjects ON attendance.subjects_id = subjects.id
  LEFT JOIN user_types ON users.user_types_id = user_types.id
  WHERE user_types.id = 1 ORDER BY attendance.date_time_created ASC";
  $query_display = mysqli_query($con, $display_student_attendance);
  if(mysqli_num_rows($query_display) > 0){
  ?>
  <h2>Students Attendance</h2>
  <table>
  <thead>
  <tr>
  <th>User ID</th>
  <th>Last Name</th>
  <th>Given Name</th>
  <th>Middle Name</th>
  <th>Subject</th>
  <th>Time-in</th>
  <th>Time-out</th>
  <th>Present</th>
  </tr>
  </thead>

  <?php  while($rows = mysqli_fetch_array($query_display)){?>

  <tbody>
  <tr>
  <td><?php echo $rows['user_id']?></td>
  <td><?php echo $rows['last_name']?></td>
  <td><?php echo $rows['given_name']?></td>
  <td><?php echo $rows['middle_name']?></td>
  <td><?php echo $rows['names']?></td>
  <td><?php echo $rows['time_in']?></td>
  <td><?php echo $rows['time_out']?></td>
  <td><?php echo $rows['present']?></td>
  </tr>
  </tbody>
  <?php
  }
  ?>
  </table>
  <?php }else{?>
  <br>No DATA Yet
  <?php }?>

  <?php }else if(isset($_GET['professor'])){
  if($_GET['professor'] == 'professor'){
    header("Location:attendance.php");
    exit();
  } 
  $display_prof_attendance = "SELECT users.user_id, users.last_name, users.given_name, users.middle_name, 
  subjects.names, attendance.time_in, attendance.time_out, attendance.present
  FROM attendance 
  LEFT JOIN users ON attendance.users_id = users.id
  LEFT JOIN subjects ON attendance.subjects_id = subjects.id
  LEFT JOIN user_types ON users.user_types_id = user_types.id
  WHERE user_types.id = 2 ORDER BY attendance.date_time_created ASC";
  $query_display = mysqli_query($con, $display_prof_attendance);
  if(mysqli_num_rows($query_display) > 0){  
  ?>
  <h2>Professors Attendance</h2>
  <table>
  <thead>
  <tr>
  <th>User ID</th>
  <th>Last Name</th>
  <th>Given Name</th>
  <th>Middle Name</th>
  <th>Subject</th>
  <th>Time-in</th>
  <th>Time-out</th>
  <th>Present</th>
  </tr>
  </thead>

  <?php  while($rows = mysqli_fetch_array($query_display)){?>

  <tbody>
  <tr>
  <td><?php echo $rows['user_id']?></td>
  <td><?php echo $rows['last_name']?></td>
  <td><?php echo $rows['given_name']?></td>
  <td><?php echo $rows['middle_name']?></td>
  <td><?php echo $rows['names']?></td>
  <td><?php echo $rows['time_in']?></td>
  <td><?php echo $rows['time_out']?></td>
  <td><?php echo $rows['present']?></td>
  </tr>
  </tbody>
  <?php
  }
  ?>
  </table>
  <?php }else{?>
  <br>No DATA Yet
  <?php }?>

  <?php }else{
  $display_attendance = "SELECT users.user_id, users.last_name, users.given_name, users.middle_name, subjects.names,
  attendance.time_in, attendance.time_out, attendance.present
  FROM attendance 
  LEFT JOIN users ON attendance.users_id = users.id
  LEFT JOIN subjects ON attendance.subjects_id = subjects.id
  ORDER BY attendance.date_time_created ASC";
  $query_display = mysqli_query($con, $display_attendance);
  if(mysqli_num_rows($query_display) > 0){
  ?>
  <h2>Attendance Details</h2>
  <table>
  <thead>
  <tr>
  <th>User ID</th>
  <th>Last Name</th>
  <th>Given Name</th>
  <th>Middle Name</th>
  <th>Subject</th>
  <th>Time-in</th>
  <th>Time-out</th>
  <th>Present</th>
  </tr>
  </thead>

  <?php  while($rows = mysqli_fetch_array($query_display)){?>

  <tbody>
  <tr>
  <td><?php echo $rows['user_id']?></td>
  <td><?php echo $rows['last_name']?></td>
  <td><?php echo $rows['given_name']?></td>
  <td><?php echo $rows['middle_name']?></td>
  <td><?php echo $rows['names']?></td>
  <td><?php echo $rows['time_in']?></td>
  <td><?php echo $rows['time_out']?></td>
  <td><?php echo $rows['present']?></td>
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
  <?php }}?>
</body>
</html>