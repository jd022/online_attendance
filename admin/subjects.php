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
  <form action="" method="POST">
  <label for="">Subject</label>
  <input type="text" name="subject">
  <label for="">Date</label>
  <input type="text" name="date">
  <label for="">Start</label>
  <input type="time" name="start">
  <label for="">End</label>
  <input type="time" name="end">
  <button type="submit" name="insert">Submit</button>
  </form>
  <?php
  $display_subj = "SELECT * FROM subjects ORDER BY day ASC";
  $query_display = mysqli_query($con, $display_subj);
  if(mysqli_num_rows($query_display) > 0){
  ?>
  <h2>Subject Details</h2>
  <table>
  <thead>
  <tr>
  <th>Subjects</th>
  <th>Day</th>
  <th>Time</th>
  <th>Operation</th>
  </tr>
  </thead>

  <?php  while($rows = mysqli_fetch_array($query_display)){?>

  <tbody>
  <tr>
  <td><?php echo $rows['names']?></td>
  <td><?php echo $rows['day']?></td>
  <td><?php echo $rows['time']?></td>
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

<?php 
  if(isset($_POST['insert'])){
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $start = date('h:i A', strtotime($start));
    $end = date('h:i A', strtotime($end));

    $schedule = "".$start." - ".$end."";

    date_default_timezone_set('Asia/Manila');
    $added_on = date('Y-m-d H:i:s');

    if(empty($_POST['subject']) && empty($_POST['date']) && empty($_POST['start'])
    && empty($_POST['end'])){
      echo "FILL UP THE FIELDS";
      exit();
    }else if(empty($_POST['subject'])){
      echo "FILL UP THE SUBJECT FIELD";
      exit();
    }else if(empty($_POST['date'])){
      echo "FILL UP THE DAY FIELD";
      exit();
    }else if(empty($_POST['start'])){
      echo "FILL UP THE START TIME FIELD";
      exit();
    }else if(empty($_POST['end'])){
      echo "FILL UP THE END TIME FIELD";
      exit();
    }else{
    $sql = "INSERT INTO subjects (`names`, `day`, `time`, `date_time_created`)
    VALUES ('$subject', '$date', '$schedule', '$added_on')";
    $query = mysqli_query($con, $sql);
    if($query){
      echo "INSERTED";
      exit();
    }else{
      echo "NOT INSERTED" . $con->error;
      exit();
    }
  }
}
?>