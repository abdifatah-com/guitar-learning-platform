<?php include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $level = $_POST['level'];
    $conn->query("INSERT INTO courses (title, description, level) VALUES ('$title', '$desc', '$level')");
    echo "Course added!";
}
?>

<form method="post">
    <input name="title" placeholder="Course Title" required><br>
    <textarea name="desc" placeholder="Description"></textarea><br>
    <select name="level">
        <option>Beginner</option>
        <option>Intermediate</option>
        <option>Advanced</option>
    </select><br>
    <button type="submit">Upload</button>
</form>
