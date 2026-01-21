<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
<body>

<?php
include("globals.php");

if (isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 2:
            echo $MSG_2;
            break;
        case 5:
            echo $MSG_5;
            break;
        case 10:
            echo $MSG_10;
            break;
        case 11:
            echo $MSG_11;
            break;
        case 14:
            echo $MSG_14;
            break;
        default:
            echo $MSG_1;
            break;
    }
}
?>

<h2> Login </h2>
<a href="register.php">Register Here <br></a>
<br>

<form action="loginConfig.php" method="POST">
    <label for="emailAddr">Email Address: </label> <br>
    <input type="email" id="emailAddr" placeholder="johnsmith@email.com" name="emailAddr"> <br>
    <label for="pass">Password: </label> <br>
    <input type="password" id="pass" placeholder="abcABC123!@#" name="pass"
        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$" > <br>
    <input type="submit" name="login">

</form>


</body>
</html>
