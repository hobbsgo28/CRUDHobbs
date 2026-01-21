<html>
<body>

<?php
//TODO create a session
include("connection.php");

$query = "SELECT userPassword FROM users WHERE emailAddress=?";
$query = $conn->prepare($query);

if(isset($_POST["login"])){
    
    $email = $_POST["emailAddr"];
    $pass = $_POST["pass"];

    $query->bind_param("s", $email);
    $query->execute();

    $query->bind_result($storedHash);
    $query->fetch();

    if (password_verify($pass, $storedHash)) {

        header("Location: dashBoard.php?msg=4&emailAddr=$email");
    }
    else {
    header("Location: login.php?msg=5");
}}
else {
    header("Location: index.php?msg=14");

}

?>


</body>
</html>
