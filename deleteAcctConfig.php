<html>
<body>

<?php

include("connection.php");

$query = "SELECT userPassword FROM users WHERE emailAddress=?";
$query = $conn->prepare($query);

if(isset($_POST["deleteAcct"])){
    $email = $_POST["emailAddr"];
    $pass = $_POST["pass"];
    $newPass = $_POST["newPass"];

    $query->bind_param("s", $email);
    $query->execute();

    $query->bind_result($storedHash);
    $query->fetch();

    if (password_verify($pass, $storedHash)) {
    $query->close();

    $da = "DELETE FROM users WHERE emailAddress=?";
    $daqry = $conn->prepare($da);
    $daqry->bind_param("s", $email);

    $daqry->execute();


    header("Location: index.php?msg=6");
}
    else {
        header("Location: deleteAcct.php?msg=7");
    }
}
else {
    header("Location: index.php?msg=14");
}
?>


</body>
</html>
