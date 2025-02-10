<?php
session_start(); // Start session for authentication

$con = mysqli_connect("localhost", "root", "", "attendance") or die(mysqli_connect_error());

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["role"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"]; // Get role from form submission

    // Determine which table to query
    if ($role === "student") {
        $query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
    } elseif ($role === "lecturer") {
        $query = "SELECT * FROM lecturer WHERE username='$username' AND password='$password'";
    } else {
        die("Invalid role selected.");
    }

    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $recordCount = mysqli_num_rows($result);

    if ($recordCount == 0) {
        echo "Wrong username or password";
    } else {
        $_SESSION["username"] = $username;
        $userData = mysqli_fetch_array($result);

        if ($role === "student") {
            header("Location: attendanceform.php"); // Redirect to student dashboard
            exit();
        } elseif ($role === "lecturer") {
            header("Location: manage_attendance.php"); // Redirect to lecturer dashboard
            exit();
        }
    }
}
?>
