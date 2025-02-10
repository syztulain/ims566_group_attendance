<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lecturer Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="form-container">
    <h2>Lecturer Registration</h2>
    <form action="register_lecturer.php" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" required><br><br>
                <option value="Lecturer">Lecturer</option>
            </select><br><br>
        </div>
        <button type="submit">Register</button>
        <button type="reset">Reset</button> <!-- This will clear all fields -->
        <a href="logout.php" class="btn btn-danger">Back to Login</a>

    </form>
</div>
<script>
  document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevents the form from submitting the traditional way

    // Add your login/register logic here

    // After success, clear the form
    document.getElementById('loginForm').reset();  // This clears all the fields in the form
  });
</script>

</body>
</html>