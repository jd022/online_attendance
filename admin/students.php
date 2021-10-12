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
  <a href="attendance.php">Attendance</a>
  <?php
  $display_prof = "SELECT * FROM users WHERE user_types_id = 1 ORDER BY date_time_created ASC";
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
  <td><a href="">Verify</a>
  <td><a href="">Edit</a>
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