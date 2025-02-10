<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head><title>Student Registration</title></head>
    <body>
    Welcome to Student Homepage!
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
    <p>Don't have an account? <a href="registerstudent.php">Register here</a></p>
    <p>Have an account as Lecturer? <a href="login_lecturer.php">Login here</a></p>
        <a href="index.html" class="btn btn-danger">Back to Home</a>
    


</div>
<script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent traditional form submission

            var role = document.getElementById('role').value;
            
            if (role === 'student') {
                window.location.href = 'homepage_student.html';
            } else {
                alert('Redirect to Student dashboard or implement logic.');
            }
        });
    </script>

</body>
</html>
