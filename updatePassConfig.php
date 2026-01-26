<html>
<body>

<?php
session_start();
include("connection.php");

$query = "SELECT userPassword FROM users WHERE id=?";
$query = $conn->prepare($query);


if(isset($_POST["updatePass"])){
    $pass = $_POST["pass"];
    $newPass = $_POST["newPass"];

    $query->bind_param("i", $_SESSION["userId"]);
    $query->execute();

    $query->bind_result($storedHash);
    $query->fetch();

    if (password_verify($pass, $storedHash)) {
        $query->close();
        $cp = "UPDATE users SET userPassword = ? WHERE id=?";
        $cpqry = $conn->prepare($cp);

        $newHashPass = password_hash($newPass, PASSWORD_BCRYPT);

        $cpqry->bind_param("si", $newHashPass, $_SESSION["userId"]);
        $cpqry -> execute();

            header("Location: updateInfo.php?msg=8");
    }
else {
    header("Location: updatePass.php?msg=9");
    }
}
else {
    header("Location: index.php?msg=14");
}

?>

</body>
</html>