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


if(isset($_POST["updatePass"])){
    $pass = $_POST["pass"];
    $newPass = $_POST["newPass"];

    $cp = "UPDATE users SET userPassword = ? WHERE id=?";
    $cpqry = $conn->prepare($cp);

    $newHashPass = password_hash($newPass, PASSWORD_BCRYPT);

    $cpqry->bind_param("si", $newHashPass, $userId);
    $cpqry -> execute();

    header("Location: updateInfo.php?msg=8&userId=$userId");
    }

else {
    header("Location: index.php?msg=14");
}

?>

</body>
</html>