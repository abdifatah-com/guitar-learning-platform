<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/db.php';
include 'includes/header.php';
?>

<div class="courses-container">
    <h1>📚 Available Courses</h1>
    <p>Explore our range of guitar courses designed for all skill levels.</p>

    <div class="course-list">
        <?php
        $sql = "SELECT * FROM courses";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($course = $result->fetch_assoc()) {
                ?>
                <div class="course-card">
                    <h3><?= htmlspecialchars($course['title']) ?></h3>
                    <p><?= htmlspecialchars($course['description']) ?></p>
                    <a href="lessons.php?course_id=<?= $course['id'] ?>" class="btn">View Lessons</a>
                </div>
                <?php
            }
            // ... (authorization, includes)

while ($course = $result->fetch_assoc()) {
    ?>
    <div class="course-card">
       <h3><?= htmlspecialchars($course['title']) ?></h3>
       <div class="video-thumb">
         <iframe width="100%" height="180"
           src="<?= htmlspecialchars($course['video_url']) ?>"
           frameborder="0" allowfullscreen></iframe>
       </div>
       <p><?= htmlspecialchars($course['description']) ?></p>
       <a href="lessons.php?course_id=<?= $course['id'] ?>" class="btn">Watch Full Lesson</a>
    </div>
    <?php
}

        } else {
            echo '<p>No courses available at the moment.</p>';
        }
        ?>
    </div>
</div>




<?php include 'includes/footer.php'; ?>
