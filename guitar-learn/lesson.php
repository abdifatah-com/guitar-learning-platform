<?php
session_start();
include 'includes/db.php';

$lesson_id = $_GET['id'] ?? null;
if (!$lesson_id) {
    echo "Lesson not found.";
    exit();
}

$sql = "SELECT * FROM lessons WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $lesson_id);
$stmt->execute();
$lesson = $stmt->get_result()->fetch_assoc();
?>

<link rel="stylesheet" href="css/style.css">

<div class="lesson-detail">
    <h1><?= htmlspecialchars($lesson['title']) ?></h1>
    <div class="video-container">
        <iframe width="100%" height="400" src="<?= htmlspecialchars($lesson['video_url']) ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <p><?= nl2br(htmlspecialchars($lesson['description'])) ?></p>
    <a href="courses.php" class="btn">⬅ Back to Courses</a>
</div>
