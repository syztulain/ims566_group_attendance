<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the script
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connect to the database
    $con = mysqli_connect("localhost", "root", "", "attendance") 
        or die("Connection failed: " . mysqli_connect_error());

    // Get form data and sanitize input
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $status = strtoupper(mysqli_real_escape_string($con, $_POST["status"]));

    // Hash password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query
    $sql = "INSERT INTO lecturer (name, email, username, password, status)
            VALUES ('$name', '$email', '$username', '$hashedPassword', '$status')";

    // Execute the query and check for success
    if (mysqli_query($con, $sql)) {
        header("Location: login_lecturer.php");
exit();


    // Close the database connection
    mysqli_close($con);
}
}
?>
