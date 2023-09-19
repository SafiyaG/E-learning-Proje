<?php
require_once "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Available Courses</title>
</head>
<body>
    <h1>Available Courses</h1>
<?php
    // Fetch available courses
$sql = "SELECT * FROM courses";
$result = mysqli_query($conn2, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Available Courses</h2>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>{$row['course_name']} ({$row['course_code']}) - Instructor: {$row['instructor']}</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No courses available at the moment.</p>";
}

// Close the database connection
mysqli_close($conn2);
?>
    <!-- Form to enroll in a course -->
    <h2>Enroll in a Course</h2>
    <form action="enroll.php" method="POST">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" id="student_id" required><br>

        <label for="course_id">Course ID:</label>
        <input type="text" name="course_id" id="course_id" required><br>

        <input type="submit" value="Enroll">
    </form>
</body>
</html>

