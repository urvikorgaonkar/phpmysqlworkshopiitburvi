<?php
require ("connect.php");
$success=null;
$error=null;
$name = (isset($_POST['name']) ? $_POST['name'] : null );
$username = (isset($_POST['username']) ? $_POST['username'] : null );
$password  = (isset($_POST['password']) ? $_POST['password'] : null );
$repeatpassword = (isset($_POST['repeatpassword']) ? $_POST['repeatpassword'] : null );

if(isset($_POST['submit']))
{

    if(!empty($name && $password && $username && $repeatpassword)){

        $compare = "SELECT * FROM users where username ='$username'";//where email='$email'
        $result = mysqli_query($conn, $compare);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $stored_email = $row["username"];
                if($stored_email === $username){
                    die ("User already exists");
                    // mysqli_close($conn);
                }
                }
            }
                if($password === $repeatpassword)
                {
                    $password = md5($password);
                    $sql="INSERT into users (name,username,password) VALUES('$name','$username','$password');";
                    $sql .= "INSERT INTO marks (student_id) SELECT MAX(id) FROM users";

                    if (mysqli_multi_query($conn, $sql)) {
                        do {
                            /* store first result set */
                            if ($result = mysqli_store_result($conn)) {
                                while ($row = mysqli_fetch_row($result)) {

                                }
                                mysqli_free_result($result);
                            }
                            /* print divider */
                            if (mysqli_more_results($conn)) {
                                echo "<script type='text/javascript'>alert('New user Added');
                                window.location='login.php';
                                </script>";
                            }
                        } while (mysqli_next_result($conn));
                    }
                    else {
                        echo "Error: " . $sql . ":-" . mysqli_error($conn);
                    }
                    mysqli_close($conn);

                }
                    else $error="Passwords Don't match";

        }
        else  $error="Input Values";
        // mysqli_close($conn);
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <h1 style="text-align: center;">Registration Form</h1>
        <form action="" method="post">
        Name: <input type="text" name="name" value="<?php echo $name?>"required>
        <br>
        Username: <input type="username" name="username" value="<?php echo $username ?>" required>
        <br>
        Password: <input type="password" name="password" value="<?php echo $password ?>" required>
        <br>
        Confirm Password: <input type="password" name="repeatpassword" value="<?php echo $repeatpassword ?>" required>
        <br>
        <input type="submit" name="submit" id="register">
        </form>
      <h3 style="text-align: center;"><?php echo $success; echo $error; ?></h3>

</body>
</html>
