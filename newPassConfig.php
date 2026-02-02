<html>
<body>

<?php

include("connection.php");

if (isset($_GET['userId'])) {
    $userId = $_GET["userId"];
}
else {
    $userId = $_POST['userId'];
}
if (isset($_GET['accessKey'])) {
    $accessKey = $_GET["accessKey"];
}

$newPass = $_POST["newPass"];
$cpqry = "UPDATE users SET userPassword = ? WHERE id=?";
$cpqry = $conn->prepare($cpqry);

$newHashPass = password_hash($newPass, PASSWORD_BCRYPT);

$cpqry->bind_param("si", $newHashPass, $userId);
$cpqry -> execute();

header("Location: updateInfo.php?msg=8&userId=$userId&accessKey=$accessKey");
