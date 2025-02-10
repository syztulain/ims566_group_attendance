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

// Check if the attendance ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("<script>alert('Error: No attendance ID provided.'); window.location.href = 'manage_attendance.php';</script>");
}

$attendance_id = $conn->real_escape_string($_GET['id']);

// Fetch the existing record
$sql = "SELECT * FROM attendance WHERE attendance_id = '$attendance_id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    die("<script>alert('Error: Attendance record not found.'); window.location.href = 'manage_attendance.php';</script>");
}

$row = $result->fetch_assoc();

// If form is submitted, update the record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $conn->real_escape_string($_POST['date']);
    $status = $conn->real_escape_string($_POST['status']);

    $update_sql = "UPDATE attendance SET date = '$date', status = '$status' WHERE attendance_id = '$attendance_id'";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Attendance updated successfully!'); window.location.href = 'manage_attendance.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Attendance</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h2>Update Attendance</h2>

<form method="POST">
    <label>Date:</label>
    <input type="date" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" required>
    
    <label>Status:</label>
    <select name="status">
        <option value="Present" <?php echo ($row['status'] == 'Present') ? 'selected' : ''; ?>>Present</option>
        <option value="Absent" <?php echo ($row['status'] == 'Absent') ? 'selected' : ''; ?>>Absent</option>
    </select>

    <button type="submit">Update</button>
    <a href="manage_attendance.php">Cancel</a>
</form>

</body>
</html>
