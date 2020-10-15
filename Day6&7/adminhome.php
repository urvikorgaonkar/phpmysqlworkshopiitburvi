<html>
<h1>Add new student record</h1>
<form action="adminhome.php" method="POST">
Name:<input type="text" name="name" ><br>
Marks obtained in PHP	<input type="number" name="phpMarks" ><br>
Marks obtained in MYSQL:	<input type="number" name="mysqlMarks"><br>
Marks obtained in HTML:	<input type="number" name="htmlMarks"><p>
	<input type="submit" name="submit" value="Enter"><p>
  </form>
</html>
<?php
@$name = $_POST['name'];
@$php = $_POST['phpMarks'];
@$mysql = $_POST['mysqlMarks'];
@$html = $_POST['htmlMarks'];

@$total = $php + $mysql + $html;
$tot=100;
$percentage = $total / 3 ;
//testing
//echo $total."<br>";
//echo $percent." %<br>";
//echo $rollNo;
if (isset($_POST['submit'])) {
	require('connect.php');
	if ($percentage < 100) {
		$getRollNo = "SELECT * FROM marks WHERE name = '$name'";

			$addStudent = "UPDATE `marks` SET `php`=$php , `mysql`=$mysql, `html`=$html ,`totalobtained`= $total ,`percentage`=$percentage WHERE `name` = '$name'";
			$addStudent_query = mysqli_query($conn,$addStudent);
			echo "Marklist updated for username : ".$name."<br>	Php : ".$php."<br>MySql : ".$mysql."<br>HTML : ".$html;
			echo "<p><a href = 'logout.php'>Logout</a><p>";


	}else
	echo "<p>Enter marks between 0 - 100 ";

}else
	echo "Please fill all  fields";
?>
