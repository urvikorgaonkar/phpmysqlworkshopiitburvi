<?php
  require ("connect.php");
  session_start();
  if(!isset($_SESSION))
	{
		header('location:adminlogin.php');
		exit;
	}
  $success="";
  $username = $_SESSION['username'];
  $select = "Select student_id,name,php,mysql,html,totalobtained,percentage FROM marks , users where users.id = marks.student_id";
  $result1 = mysqli_query($conn, $select);

  if (mysqli_num_rows($result1) > 0)
  {


  }
    else echo "Error";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>td,h1,div{
    text-align: center;
    }</style>
</head>
<body>
    <h1>Welcome Admin</h1>
    <table border="2" cellpadding="15"   style="width: 100%; border-collapse: collapse; margin:0 auto">
      <thead>
        <tr>
          <th>Name</th>
          <th>PHP</th>
          <th>MySQL</th>
          <th>HTML</th>
          <th>Total_Obtained</th>
          <th>Percentage</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
                while($row = mysqli_fetch_assoc($result1)){?>
                <tr>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['php']; ?></td>
                    <td><?php echo $row['mysql']?></td>
                    <td><?php echo $row['html']; ?></td>
                    <td><?php echo $row['totalobtained'];?></td>
                    <td><?php echo $row['percentage']; ?></td>
                    <td><?php $student_id = $row['student_id'] ?></td>
                    <td><a href="edit.php?_id=<?php echo $student_id ?>">Edit</a> | <a href="delete.php?_id=<?php echo $student_id ?>">Delete</a></td>";
                <tr>
                <?php } ?>
        </tr>
      </tbody>
    </table>
    <div style="padding: 100px;">
    <a href="addstudent.php"><button>Add new student</button></a>

    </div>
    <h1 ><?php echo $success ?></h1>
    <a style="position:absolute; top:1em ;right:1em;" href="logout.php"><button>Logout</button></a>
</body>
</html>
