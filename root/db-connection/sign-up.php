<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<?php

// session_start();
// echo "Testing Connection...";
$servername="localhost";
$username="root";
$password="";
$database="mercedes_db";

// establish a connection
$conn=mysqli_connect($servername,$username,$password,$database);

// check if connection is established
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}

// sign-up the user
if(isset($_POST['save'])) //on submission
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $usr_name = $_POST['username'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    // fetch data from the sign_up table
    $sql_query = "INSERT INTO sign_up(fname,lname,dob,gender,usr_name,email,passwd) VALUES ('$fname','$lname','$dob','$gender','$usr_name','$email','$passwd')";

   
    
    if(mysqli_query($conn, $sql_query))
    {
        // $_SESSION['username'] = $usr_name;
        // $_SESSION['success'] = "You are now logged in"
        echo "<h3>You've signed in successfully!</h3>";
    }
    else
    {
        echo "Error: " .$sql ."". mysqli_error($conn);
    }
    mysqli_close($conn);
}

// login the user
   if (isset($_POST['login_user']))
   {
    // extract users from the form
    $usr_name = $_POST['username'];
    $passwd = $_POST['passwd'];

    $sql_query = "SELECT * from sign_up where usr_name='$usr_name' and passwd='$passwd'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);   //store users in array
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // header("Location: ../index.html");
        echo "<h3>Logged in successfully</h3>";
    } else {
        echo "Invalid username or password.";
    }

    mysqli_close($conn);
   }
?>


<body>
    <!-- <h1>You've signed up successfully</h1> -->
    <button type="button" onclick="redirectUser()"> Back to Home page </button>

<script type="text/javascript">
    // return user back to the home page
    function redirectUser() {
        location.replace("../index.html");  
    }
</script>
   
</body>
</html>