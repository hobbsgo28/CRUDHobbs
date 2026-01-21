<?php
include("connection.php");

if (isset($_GET['userId'])) {
    $userId = $_GET["userId"];
}
else {
    $userId = $_POST['userId'];
}

if(isset($_POST["removeAcct"])){ 
    $daqry = "DELETE FROM users WHERE id=?";
    $daqry = $conn->prepare($daqry);
    $daqry->bind_param("i", $userId);
    $daqry->execute();

    if ($daqry->execute()){
        header("Location: dashBoard.php?msg=6&userId=$userId");
    }
    else {
        header("Location: dashBoard.php?msg=7&userId=$userId");
    }
}
else {
    header("Location: index.php?msg=14");
}