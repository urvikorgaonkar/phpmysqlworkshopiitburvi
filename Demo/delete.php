<?php
require('connect.php');
$student_id = $_GET['_id'];
$query = "DELETE FROM users WHERE id = $student_id";
$result1 = mysqli_query($conn,$query) or die ();
header("Location: adminhome.php");
?>
