<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
<body>

<?php
include("globals.php");

if (isset($_GET['msg'])) {
switch ($_GET['msg']) {
    case 8:
        echo $MSG_8;
        break;
    case 9:
        echo $MSG_9;
        break;
    case 10:
        echo $MSG_10;
        break;
    default:
        echo $MSG_1;
        break;
}
}
?>

<a href="dashBoard.php">Back to Dashboard<br> </a>

    <h2>Change Password</h2>

<form action="changePassConfig.php" method="POST">
    Email Address: <input type="email" name="emailAddr" placeholder="johnsmith@email.com" id="emailAddr"> <br>
    Old Password: <input type="password" name="pass" placeholder="abcABC123!@#" id="pass"
    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$" > <br>
    New Password: <input type="password" name="newPass" placeholder="abcABC123!@#" id="newPass"
    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$" > <br>
    <input type="submit" name="changePass">
</form>


</body>
</html>
