<?php

require("connect.php");
$date = date("y-m-d");

$write = mysqli_query($connect, "INSERT INTO people VALUES ('927','Vedant','Chavhan','$date','M')") or die(mysqli_error());


?>
