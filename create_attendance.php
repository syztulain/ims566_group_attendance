<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if student_id exists in the POST request
    if (!isset($_POST['student_id']) || empty($_POST['student_id'])) {
        die("<script>alert('Error: Student ID is required.'); window.history.back();</script>");
    }

    if (!isset($_POST['lecturer_id']) || empty($_POST['lecturer_id'])) {
        die("<script>alert('Error: Lecturer ID is required.'); window.history.back();</script>");
    }

    $student_id = $conn->real_escape_string($_POST['student_id']);
    $lecturer_id = $conn->real_escape_string($_POST['lecturer_id']);
    $date = $conn->real_escape_string($_POST['date']);
    $status = $conn->real_escape_string($_POST['status']);

    // Check if the student table exists
    $check_table = $conn->query("SHOW TABLES LIKE 'student'");
    if ($check_table->num_rows == 0) {
        die("<script>alert('Error: The student table does not exist.'); window.history.back();</script>");
    }

    // Check if student_id exists in the student table
    $check_student = "SELECT * FROM student WHERE student_id = '$student_id'";
    $result = $conn->query($check_student);

    if ($result->num_rows > 0) {
        // Insert attendance record
        $sql = "INSERT INTO `attendance` (student_id, lecturer_id, date, status) VALUES ('$student_id', '$lecturer_id', '$date', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Attendance submitted successfully.'); window.history.back();</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Error: Student ID not found.'); window.history.back();</script>";
    }

    $conn->close();
}
?>

