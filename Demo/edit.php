<?php
require("connect.php");
session_start();
$success=$error="";
$current_id=$_GET['_id'];
$username = $_SESSION['username'];
$select = "Select * FROM marks , users where marks.student_id='$current_id' AND users.id='$current_id'";
$result1 = mysqli_query($conn, $select);

  if (mysqli_num_rows($result1) > 0) {
      // output data of each row
      while($row = mysqli_fetch_array($result1)) {
           $name=$row['name'];
          $username=$row['username'];
          $php=$row["php"];
          $mysql=$row["mysql"];
          $html=$row["html"];
        //   $totalobtained=$subject1 + $subject2 + $subject3;
        //   $percentage=($totalobtained / 300 )*100;
      }
  }
  else echo "Error";


  if(isset($_POST['submit']))
  {
  $name = (isset($_POST['name']) ? $_POST['name'] : null);
  $username = (isset($_POST['username']) ? $_POST['username'] : null);
  $php = (isset($_POST['php']) ? $_POST['php'] : null);
  $mySQL = (isset($_POST['mysql']) ? $_POST['mysql'] : null);
  $html = (isset($_POST['html']) ? $_POST['html'] : null);

  if(!empty($name || $php || $mySQL || $html || $username))
  {
      if(is_numeric($php) && is_numeric($mySQL) && is_numeric($html) &&  $php<=100 && $mySQL<=100 && $html<=100)
      {
          $totalobtained = $php + $mySQL + $html;
          $percentage = ($totalobtained / 300) * 100 ;
          $sql = "UPDATE marks SET php = $php , mysql=$mySQL , html = $html ,totalobtained = $totalobtained, percentage = $percentage WHERE student_id='$current_id'";

          if (mysqli_query($conn, $sql)) {
              header("Location : edit.php");
          } else {
              echo "Error: " . $sql . ":-" . mysqli_error($conn);
          }
          mysqli_close($conn);
      }
      else{
          echo "Enter Numeric Values less than 100 for The Subject Marks";
      }
  }
  else
  {
      echo "Please Enter all the values";
  }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>form{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    input{
        margin: 5px;
        }
    #submit{
        margin: 0 auto;
    }
        </style>
</head>
<body>
    <h1 style="text-align: center;">Update Form</h1>
        <form action="" method="post">
        Name <input type="text" name="name" value="<?php echo $name?>"required>
        <br>
        Username <input type="username" name="username" value="<?php echo $username ?>" required>
        <br>
        PHP <input type="text" name="php" value="<?php echo $php ?>" required>
        <br>
        MySQL <input type="text" name="mysql" value="<?php echo $mySQL ?>" required>
        <br>
        HTML <input type="text" name="html" value="<?php echo $html ?>" required>
        <br>
        <input type="submit" name="submit" id="Edit">
        </form>
      <h3 style="text-align: center;"><?php echo $success; echo $error; ?></h3>

</body>
</html>
