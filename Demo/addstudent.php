<?php
require ("connect.php");
$success=null;
$error=null;
$name=(isset($_POST['name']) ? $_POST['name'] : null );
$username=(isset($_POST['username']) ? $_POST['username'] : null );
$password=(isset($_POST['password']) ? $_POST['password'] : null );
if(isset($_POST['submit']))
{

    if(!empty($name && $username && $password))
    {

        $compare = "SELECT * FROM users";//where email='$email'
        $result1 = mysqli_query($conn, $compare);
        if (mysqli_num_rows($result1) > 0)
        {
            // output data of each row
            while($row = mysqli_fetch_assoc($result1))
            {
                $stored_username =$row["username"];
                if($stored_username === $username){
                    die ("User already exists");
                    // mysqli_close($conn);
                }
                }
            }
          //  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $password=md5($password);

                    $sql="INSERT into users (name,username,password) VALUES('$name','$username','$password');";
                    $sql .= "INSERT INTO marks (student_id) SELECT MAX(id) FROM users";

                    if (mysqli_multi_query($conn, $sql)) {
                        do {
                            /* store first result1 set */
                            if ($result1 = mysqli_store_result($conn)) {
                                while ($row = mysqli_fetch_row($result1)) {

                                }
                                mysqli_free_result($result1);
                            }
                            /* print divider */
                            if (mysql_more_result($conn)) {
                                echo "<script type='text/javascript'>alert('New user Added');
                                window.location='adminhome.php';
                                </script>";
                            }
                        } while (mysqli_next_result($conn));
                    }
                    else {
                        echo "Error: " . $sql . ":-" . mysqli_error($conn);
                    }
                    mysqli_close($conn);

              //  }
              //  else $error="Please enter a valid email";
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
    <h1 style="text-align: center;">Registration New Student</h1>
        <form action="" method="post">
        Name <input type="text" name="name" value="<?php echo $name?>"required>
        <br>
        Username <input type="username" name="username" value="<?php echo $username ?>" required>
        <br>
        Password <input type="password" name="password" value="<?php echo $password ?>" required>
        <br>
        <input type="submit" name="submit" id="add">
        </form>
      <h3 style="text-align: center;"><?php echo $success; echo $error; ?></h3>

</body>
