<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <header class="dashboard-header">
        <div class="dashboard-title">
            <h1>Welcome, [Student Name]!</h1>
            <p>Email: [Student Email]</p>
        </div>
        <div class="dashboard-logo">
            <img src="images/logo.jpg" alt="University Logo">
        </div>
    </header>
    
    <nav class="dashboard-navigation">
        <ul>
            <li><a href="courses.php">Course Catalog</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <main class="dashboard-main">
        <section class="enrolled-courses">
            <h2>Enrolled Courses</h2>
            <!-- List of enrolled courses here -->
        </section>
        
        <section class="upcoming-assignments">
            <h2>Upcoming Assignments</h2>
            <!-- List of upcoming assignments here -->
        </section>
        
        <section class="grades">
            <h2>Grades</h2>
            <!-- List of grades here -->
        </section>
        
        <section class="notifications">
            <h2>Notifications</h2>
            <!-- List of notifications here -->
        </section>
    </main>

    <footer class="dashboard-footer">
        <p>&copy; 2023 Run University</p>
    </footer>
</body>
</html>
