<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendence Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <h2>Fill in your attendence</h2>
        <div class="tab">
            <button class="tablink" onclick="openTab(event, 'Create')">Attendance Form</button>
        </div>

        <div id="Create" class="tabcontent">
            <h3>Create Attendance</h3>
            <form action="create_attendance.php" method="post">

            <label for="student_id">Student ID:</label>
            <input type="number" id="student_id" name="student_id" required><br><br>

            <label for="lecturer_id">Lecturer ID:</label>
            <input type="number" id="lecturer_id" name="lecturer_id" required><br><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br><br>

            <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" required><br><br>
                <option value="Present">PRESENT</option>
                <option value="Present">ABSENT</option>
            </select><br><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
        <a href="logout.php" class="btn btn-danger">Back to Login</a>