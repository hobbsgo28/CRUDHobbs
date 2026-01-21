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

if (isset($_GET['emailAddr'])) {
    $emailAddr = $_GET["emailAddr"];
}
else {
    $emailAddr = $_POST['emailAddr'];
}

if(isset($_POST["updateInfoAdmin"])) {
    $userKey = $_POST["userKey"];
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $emailAddr = $_POST["emailAddress"];

    $query = "UPDATE users SET accessKey=?, firstName=?, lastName=?, emailAddress=? WHERE id=?";
    $query = $conn->prepare($query);

    $query->bind_param("isssi", $userKey, $fName, $lName, $emailAddr, $userId);
    $query->execute();

    header("Location: updateInfo.php?msg=12&userId=$userId&accessKey=$accessKey&emailAddr=$emailAddr");
}
else {
    header("Location: index.php?msg=14");
}

?>