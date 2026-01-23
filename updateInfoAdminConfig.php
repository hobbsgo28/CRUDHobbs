<?php
include("connection.php");

session_start();
if(isset($_POST["updateInfoAdmin"])) {
    $userKey = $_POST["userKey"];
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $emailAddr = $_POST["emailAddress"];

    $query = "UPDATE users SET accessKey=?, firstName=?, lastName=?, emailAddress=? WHERE id=?";
    $query = $conn->prepare($query);

    $query->bind_param("isssi", $userKey, $fName, $lName, $emailAddr, $_SESSION["userId"]);
    $query->execute();

    header("Location: updateInfo.php?msg=12");
}
else {
    header("Location: index.php?msg=14");
}

?>