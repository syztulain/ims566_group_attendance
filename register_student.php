<?php
// Start the script
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "attendance") 
    or die("Connection failed: " . mysqli_connect_error());

// Get form data and sanitize input
$name = mysqli_real_escape_string($con, $_POST["name"]);
$class = mysqli_real_escape_string($con, $_POST["class"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$phone = mysqli_real_escape_string($con, $_POST["phone"]);
$username = mysqli_real_escape_string($con, $_POST["username"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);
$role = strtoupper(mysqli_real_escape_string($con, $_POST["role"]));

// Prepare the SQL query
$sql = "INSERT INTO student (name, class, email, phone, username, password, role)
        VALUES ('$name', '$class','$email', '$phone', '$username', '$password', '$role')";

// Execute the query and check for success
if (mysqli_query($con, $sql)) {
    echo "<script>
        alert('New student created successfully');
        window.location.href = 'login_student.php';
    </script>";
} else {
    echo "<script>
        alert('Error: " . mysqli_error($con) . "');
        window.location.href = 'login_student.php';
    </script>";
}

// Close the database connection
mysqli_close($con);
}
?>