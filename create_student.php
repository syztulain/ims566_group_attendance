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
$student_name = $conn->real_escape_string($_POST['name']);
$student_class = $conn->real_escape_string($_POST['class']);
$student_email = $conn->real_escape_string($_POST['email']);
$student_phone = $conn->real_escape_string($_POST['phone']);

$sql = "INSERT INTO student (name, class, email, phone,) VALUES
('$student_name', '$student_class', '$student_email', '$student_phone',)";
if ($conn->query($sql) === TRUE) {
echo "<script>alert('New student created successfully');
window.location.href = 'manage_student.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_student.php';</script>";
}
$conn->close();
}
?>