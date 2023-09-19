<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve student and course IDs from the form
    $student_id = $_POST["student_id"];
    $course_id = $_POST["course_id"];

    // Check if the student is already enrolled in the course (you can modify this check as needed)
    $check_enrollment_sql = "SELECT * FROM enrollments WHERE student_id = $student_id AND course_id = $course_id";
    $check_result = mysqli_query($conn, $check_enrollment_sql);

    if (mysqli_num_rows($check_result) > 0) {
        echo "You are already enrolled in this course.";
    } else {
        // Insert the enrollment record into the database
        $enroll_sql = "INSERT INTO enrollments (student_id, course_id, enrollment_date) VALUES ($student_id, $course_id, NOW())";

        if (mysqli_query($conn, $enroll_sql)) {
            echo "Enrollment successful.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    // Handle cases where the form was not submitted via POST
    echo "Invalid request.";
}


?>
