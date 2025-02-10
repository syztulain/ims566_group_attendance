<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if an ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("<script>alert('Error: No attendance ID provided.'); window.location.href = 'manage_attendance.php';</script>");
}

$attendance_id = $conn->real_escape_string($_GET['id']);

// Delete the record
$sql = "DELETE FROM attendance WHERE attendance_id = '$attendance_id'";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Attendance record deleted successfully.'); window.location.href = 'manage_attendance.php';</script>";
} else {
    echo "<script>alert('Error deleting record: " . $conn->error . "'); window.location.href = 'manage_attendance.php';</script>";
}

$conn->close();
?>
