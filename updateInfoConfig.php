<?php
include("connection.php");

if(isset($_POST["updateInfo"])) {
    $userId = $_POST["userId"];
    $userKey = $_POST["userKey"];
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $emailAddr = $_POST["emailAddress"];
    echo $userId;
    echo $userKey;
    echo $fName;
    echo $lName;
    echo $emailAddr;

    $query = "UPDATE users SET accessKey=?, firstName=?, lastName=?, emailAddress=? WHERE id=?";
    $query = $conn->prepare($query);

    $query->bind_param("isssi", $userKey, $fName, $lName, $emailAddr, $userId);
    $query->execute();

    header("Location: updateInfo.php?msg=12&userId=$userId");
}
else {
    header("Location: index.php?msg=14");
}

?>