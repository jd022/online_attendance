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
      echo "INPUT REQUIRED DATA";
      exit();
    }else if(empty($_POST['user_id'])){
      echo "INPUT USER ID";
      exit();
    }else if(empty($_POST['last_name'])){
      echo "INPUT LAST NAME";
      exit();
    }else if(empty($_POST['given_name'])){
      echo "INPUT GIVEN NAME";
      exit();
    }else if(empty($_POST['middle_name'])){
      echo "INPUT MIDDLE NAME";
      exit();
    }else if(empty($_POST['contact_number'])){
      echo "INPUT CONTACT NUMBER";
      exit();
    }else if(empty($_POST['email_address'])){
      echo "INPUT EMAIL ADDRESS";
      exit();
    }else if(empty($_POST['password'])){
      echo "INPUT PASSWORD";
      exit();
    }else if(empty($_POST['subject'])){
      echo "PLEASE SELECT SUBJECTS";
      exit();
    }else{
      $sql = "INSERT INTO users (`user_id`, `last_name`, `given_name`, `middle_name`,
      `contact_number`, `email_address`, `password`, `verified`, `user_types_id`, `date_time_created`)
      VALUES ('$user_id', '$last_name', '$given_name', '$middle_name', '$contact_number', '$email_address',
      '$password', '$verify', '$default_user_type', '$added_on')";
      $query = mysqli_query($con, $sql);
      if($query){
        $users_id = $con->insert_id;
        $insert_user_subject = "INSERT INTO users_subjects (`users_id`, `subjects_id`, `date_time_created`)
        VALUES ('$users_id', '$subject', '$added_on')";
        $query_request = mysqli_query($con, $insert_user_subject);
        if($query_request){
          echo "INSERTED";
          exit();
        }else{
          echo "NOT INSERTED" . $con->error;
        }
      }else{
        echo "SOMETHING WENT WRONG" . $con->error;
        exit();
      }
    }
  }
?>