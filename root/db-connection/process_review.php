<?php
// Connect to your database (change the database details accordingly)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mercedes_db";

$conn=mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST['submit'])) 
{
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $evaluation = $_POST['rev'];
    // Validate form data (optional)

    // Prepare SQL statement to insert data into the database
    $sql_query = "INSERT INTO review (name,email,review) VALUES ('$name','$email','$evaluation')";

    if (mysqli_query($conn, $sql_query))
    {
        echo "<h3>Thank you for your review.</h3>";
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Signed_up</title> -->
</head>
<body>
    <!-- <h1>You've signed up successfully</h1> -->
    <button type="button" onclick="redirectUser()"> Back to Home page </button>

    <script>
        function redirectUser() {
            location.replace("../index.html");  // return user back to the home page
        }
    </script>
</body>
</html>
