<html>
<body>


<?php

include("connection.php");

$query = "SELECT userPassword FROM users WHERE emailAddress=?";
$query = $conn->prepare($query);

if(isset($_POST["changePass"])){
    $email = $_POST["emailAddr"];
    $pass = $_POST["pass"];
    $newPass = $_POST["newPass"];

    $query->bind_param("s", $email);
    $query->execute();

    $query->bind_result($storedHash);
    $query->fetch();

    if (password_verify($pass, $storedHash)) {
        $query->close();
        $cp = "UPDATE users SET userPassword = ? WHERE emailAddress=?";
        $cpqry = $conn->prepare($cp);

        $newHashPass = password_hash($newPass, PASSWORD_BCRYPT);

        $cpqry->bind_param("ss", $newHashPass, $email);
        $cpqry -> execute();

    header("Location: dashboard.php?msg=8");
    }
else {
    header("Location: changePass.php?msg=9");
}}

else {
    header("Location: index.php?msg=14");

}
?>


</body>
</html>
