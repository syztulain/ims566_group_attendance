<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Read Students</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="content">
        <h2>Attendance Record</h2>
        <?php
        $conn = new mysqli("localhost", "root", "", "attendance");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM attendance";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Date</th><th>Status</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["attendance_id"]."</td><td>".$row["date"]."</td><td>".$row["status"]."</td><td>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>