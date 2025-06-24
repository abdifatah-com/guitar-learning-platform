<?php include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $video = $_POST['video'];
    $desc = $_POST['desc'];
    $conn->query("INSERT INTO lessons (course_id, title, video_url, description) VALUES ('$course_id', '$title', '$video', '$desc')");
    echo "Lesson uploaded!";
}
?>

<form method="post">
    <input name="course_id" placeholder="Course ID"><br>
    <input name="title" placeholder="Lesson Title"><br>
    <input name="video" placeholder="YouTube Embed URL"><br>
    <textarea name="desc" placeholder="Lesson Description"></textarea><br>
    <button type="submit">Upload Lesson</button>
</form>
