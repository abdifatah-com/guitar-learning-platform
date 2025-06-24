<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Guitar Platform</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="dashboard">
    <h1>🎸 Welcome to Your Guitar Dashboard</h1>
    <p>Start your learning journey below:</p>
 

    <div class="dashboard-links">
       <a href="courses.php" class="dash-btn">Browse Courses</a>

        <a href="logout.php" class="dash-btn logout">🚪 Logout</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>