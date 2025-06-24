<?php
$host = "sql306.epizy.com";        // Your DB host
$user = "epiz_12345678";           // Your DB username
$pass = "";        // Your DB password
$db   = "epiz_12345678_guitarlearn"; // Your DB name

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
