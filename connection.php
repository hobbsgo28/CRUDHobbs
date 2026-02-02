<html>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "CRUD2025Hobbs";

$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
</html>