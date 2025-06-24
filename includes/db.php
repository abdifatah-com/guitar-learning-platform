<?php
$conn = new mysqli("localhost", "root", "", "guitar_platform");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
