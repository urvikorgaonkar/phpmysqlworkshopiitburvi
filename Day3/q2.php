
<?php

require("connect1.php");

$ext = " SELECT * FROM class1 WHERE name='Rohan' ";
$extract=mysqli_query($connect1 , $ext);

   if($row = mysqli_fetch_assoc($extract))
  {
    $name = $row['name'];
    $e = $row['sub5'];
    $total_obt = $row['totalobtained'] ;
    $percent = $row['percent'];

    echo  "Marksheet before updating :<br> Subject 5 = ".$e."<br>Total Marks obtained : ".$total_obt."<br>Percentage Obtained : ".$percent." %<br>";

    $new_e = 99;
    $new_total_obt= $total_obt - $e + $new_e ;
    $new_percent=  $new_total_obt/5 ;

    $update = "UPDATE `class1` SET `sub5`=$new_e, `totalobtained`=$new_total_obt, `percent`=$new_percent WHERE name='Rohan'";

    if (mysqli_query($connect1, $update))
    {
      echo "<br>Update done sucessfully<br><br>";
      echo  $name." has updated marksheet:<br> Subject 5 = ".$new_e."<br>Total Marks obtained : ".$new_total_obt."<br>Percentage Obtained : ".$new_percent." %" ;
    }
    else
    {
      echo "error updating record :" .mysqli_error($connect1);
    }
 }


 mysqli_close($connect1);

?>
