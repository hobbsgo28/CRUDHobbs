<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
<body>

<?php
include("globals.php");

if (isset($_GET['msg'])) {
switch ($_GET['msg']) {
    case 7:
        echo $MSG_7;
        break;
    default:
        echo $MSG_1;
        break;
}
}
?>

<a href="dashBoard.php">Back to Dashboard<br></a>


    <h2> Delete Account</h2>

<form action="deleteAcctConfig.php" method="POST">
    Email Address: <input type="email" name="emailAddr" placeholder="johnsmith@email.com" id="emailAddr"> <br>
    Password: <input type="password" name="pass" placeholder="abcABC123!@#" id="pass"
    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$" > <br>
    <input type="submit" name="deleteAcct">
</form>


</body>
</html>
