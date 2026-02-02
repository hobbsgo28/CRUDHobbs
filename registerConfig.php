<html>
<body>

<?php

include("connection.php");

$emailqry = "SELECT emailAddress FROM users WHERE EXISTS (SELECT emailAddress FROM users WHERE emailAddress=?)";
$emailqry = $conn->prepare($emailqry);

if(isset($_POST["register"])){
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $email = $_POST["emailAddr"];
    $pass = $_POST["pass"];

    
    $emailqry->bind_param("s", $email);
    $emailqry->execute();

    $emailqry->bind_result($emailexists);
    $emailqry->fetch();

    if(!$emailexists) {

        $query = "INSERT INTO users(firstName, lastName, emailAddress, userPassword) VALUES (?, ?, ?, ?)";
        $query = $conn->prepare($query);

        $hashPass = password_hash($pass, PASSWORD_BCRYPT);
        $query->bind_param("ssss", $fName, $lName, $email, $hashPass);

        $query -> execute();
        header("Location: login.php?msg=2");
    }
    else {
        header("Location: register.php?msg=3");

     }
}

else{
    header("Location: index.php?msg=14");
}

?>

</body>
</html>
