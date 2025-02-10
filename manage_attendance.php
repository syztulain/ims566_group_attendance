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

$search_query = "";
if (isset($_POST['search'])) {
    $search_query = $conn->real_escape_string($_POST['search_query']);
}

$sql = "SELECT * FROM attendance";
if (!empty($search_query)) {
    $sql .= " WHERE student_id LIKE '%$search_query%' OR status LIKE '%$search_query%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Attendance</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<h2>Manage Attendance</h2>

<!-- Search Form -->
<form method="POST">
    <input type="text" name="search_query" placeholder="Search by Student ID or Status" value="<?php echo htmlspecialchars($search_query); ?>">
    <button type="submit" name="search">Search</button>
    <button type="reset" onclick="window.location.href='manage_attendance.php'">Reset</button>
</form> <br><br>

<!-- PDF Download Button -->
<a href="generate_pdf.php" class="btn btn-primary" target="_blank" style="margin-top: 10px; display: inline-block;">Download PDF</a>
<br><br>

<!-- Attendance Records Table -->
<table border="1" width="100%">
    <tr>
        <th>Attendance ID</th>
        <th>Student ID</th>
        <th>Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['attendance_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
            echo "<td>
                    <a href='update_attendance.php?id=" . $row['attendance_id'] . "'>Update</a> | 
                    <a href='delete_attendance.php?id=" . $row['attendance_id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No records found.</td></tr>";
    }
    ?>

</table>
<a href="login_lecturer.php" class="btn btn-danger">Back to Login</a>

</body>
</html>

<?php
$conn->close();
?>
