<?php
include("connection.php");

if (isset($_GET["userId"])) {
    $userId = $_GET["userId"];
    echo $userId;
}
else {
    $userId = $_POST["userId"];
    echo $userId;
}

if (isset($_POST["updateInfo"])) {
    $userId = $_POST["userId"];
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $emailAddr = $_POST["emailAddress"];
    echo $userId;
    
    $query = "UPDATE users SET firstName=?, lastName=?, emailAddress=? WHERE id=?";
    $query = $conn->prepare($query);

    $query->bind_param("sssi", $fName, $lName, $emailAddr, $userId);
    $query->execute();

    header("Location: updateInfo.php?msg=12&userId=$userId");
}
else {
    header("Location: index.php?msg=14");

}

?>