<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'includes/db.php';

$course_id = $_GET['course_id'] ?? null;
if (!$course_id) {
    echo "Invalid course.";
    exit();
}

$course_sql = "SELECT * FROM courses WHERE id = ?";
$course_stmt = $conn->prepare($course_sql);
$course_stmt->bind_param("i", $course_id);
$course_stmt->execute();
$course = $course_stmt->get_result()->fetch_assoc();

$lessons_sql = "SELECT * FROM lessons WHERE course_id = ? ORDER BY id ASC";
$lessons_stmt = $conn->prepare($lessons_sql);
$lessons_stmt->bind_param("i", $course_id);
$lessons_stmt->execute();
$lessons = $lessons_stmt->get_result();
?>

<link rel="stylesheet" href="css/style.css">

<div class="lessons-container">
    <h1>📘 <?= htmlspecialchars($course['title']) ?> Lessons</h1>
    <p><?= htmlspecialchars($course['description']) ?></p>

    <div class="lesson-list">
        <?php while($lesson = $lessons->fetch_assoc()): ?>
            <div class="lesson-card">
                <h3><?= htmlspecialchars($lesson['title']) ?></h3>
                <p><?= htmlspecialchars($lesson['description']) ?></p>
                <a href="lesson.php?id=<?= $lesson['id'] ?>" class="btn">Watch Lesson</a>
            </div>
        <?php endwhile; ?>
    </div>
</div>

// ... (authorization, includes, course fetch)
?>
<div class="lesson-container">
  <h1><?= htmlspecialchars($course['title']) ?></h1>
  <div class="video-wrapper">
    <iframe width="100%" height="400"
      src="<?= htmlspecialchars($course['video_url']) ?>"
      frameborder="0" allowfullscreen></iframe>
  </div>
  <p><?= htmlspecialchars($course['description']) ?></p>
  <a href="courses.php" class="btn">⬅ Back</a>
</div>
<?php
// include footer...
