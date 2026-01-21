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

$query = "SELECT userPassword FROM users WHERE id=?";
$query = $conn->prepare($query);


if(isset($_POST["updatePass"])){
    $pass = $_POST["pass"];
    $newPass = $_POST["newPass"];

    $query->bind_param("i", $userId);
    $query->execute();

    $query->bind_result($storedHash);
    $query->fetch();

    if (password_verify($pass, $storedHash)) {
        $query->close();
        $cp = "UPDATE users SET userPassword = ? WHERE id=?";
        $cpqry = $conn->prepare($cp);

        $newHashPass = password_hash($newPass, PASSWORD_BCRYPT);

        $cpqry->bind_param("si", $newHashPass, $userId);
        $cpqry -> execute();

            header("Location: updateInfo.php?msg=8&userId=$userId&accessKey=$accessKey");
    }
else {
    header("Location: updatePass.php?msg=9&userId=$userId&accessKey=$accessKey");
    }
}
else {
    header("Location: index.php?msg=14");
}

?>

</body>
</html>