<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head><title>Lecturer Login</title></head>
    <body>
    Welcome to Lecturer Admin Homepage!<br><br>
    </body>
    <link rel="stylesheet" href="login.css">
</head>

<div class="form-container">
    <h2>Login</h2>
    <form action="process.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="role">Role:</label>
    <select name="role" required>
        <option value="student">Student</option>
        <option value="lecturer">Lecturer</option>
    </select>
        
        <button type="submit">Login</button>
        <button type="reset">Reset</button> <!-- This will clear all fields -->
    </form>
    <p>Don't have an account? <a href="registerlecturer.php">Register here</a></p>
    <p>Have an account as Student? <a href="login_student.php">Login here</a></p>
        <a href="index.html" class="btn btn-danger">Back to Home</a>
    


</div>
<script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent traditional form submission

            var role = document.getElementById('role').value;
            
            if (role === 'admin') {
                window.location.href = 'homepage_lecturer.html';
            } else {
                alert('Redirect to lecturer dashboard or implement logic.');
            }
        });
    </script>

</body>
</html>
