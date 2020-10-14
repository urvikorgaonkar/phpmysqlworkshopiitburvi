<?php

    require ("connect.php");
    session_start();
    $success="";
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $select = "Select * FROM marks,users where users.id = marks.student_id AND users.username='$username'";
    $result1 = mysqli_query($conn, $select);
    if(isset($_POST['submit'])){
        $toemail=(isset($_POST['toemail']) ? $_POST['toemail'] : null );
        if (mysqli_num_rows($result1) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result1)) {
            $php = $row["php"];
            $mysql = $row["mysql"];
            $html = $row["html"];
            $totalobtained = $row['totalobtained'];
            $percentage = $row['percentage'];

            $to = $toemail;
            $subject = "Marksheet of $name";
            $headers="From: PCE";
            nl2br("New line will start from here\n in this string\r\n on the browser window");
            $body=" PHP : $php \n PHP : $mysql \n MYSQL : $html \n Total_Obtained : $totalobtained \n Percentage : $percentage %";
            mail($to,$subject,$body,$headers);
            echo "Marksheet successfully sent to parents' mail id!";
            }
        }
    }
    else echo "Please input all the fields!";

    ?>
