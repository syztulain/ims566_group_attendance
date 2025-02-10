<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Students</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link your CSS -->
</head>
<body>

<div class="form-container">
    <h2>Search Students</h2>
    <form method="POST">
        <input type="text" name="search_query" placeholder="Enter name or email" required>
        <button type="submit" name="search">Search</button>
        <button type="reset">Reset</button>

    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $con = mysqli_connect("localhost", "root", "", "attendance") or die("Connection failed!");

    $search_query = mysqli_real_escape_string($con, $_POST['search_query']);

    // Query to search students by name or email
    $query = "SELECT * FROM register WHERE name LIKE '%$search_query%' OR email LIKE '%$search_query%'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='form-container'>";
        echo "<h3>Search Results:</h3>";
        echo "<table border='1' width='100%'>";
        echo "<tr><th>Name</th><th>Email</th><th>Username</th><th>Status</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='form-container'><p>No results found.</p></div>";
    }

    mysqli_close($con);
}
?>

</body>
</html>
